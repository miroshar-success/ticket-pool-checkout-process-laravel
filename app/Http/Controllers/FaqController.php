<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Faq;
use Throwable;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class FaqController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('faq_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faq = Faq::orderBy('id','DESC')->get();
        return view('admin.faq.index', compact('faq'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'bail|required',
            'answer' => 'bail|required',
        ]);
        $faq = Faq::create($request->all());
        return redirect()->route('faq.index')->withStatus(__('Faq has added successfully.'));
    }

    public function show(Faq $faq)
    {
        $faq = Faq::orderBy('id','DESC')->get();
        return view('frontend.faq', compact('faq'));
    }

    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'bail|required',
            'answer' => 'bail|required',
        ]);
        $faq = Faq::find($faq->id)->update($request->all());
        return redirect()->route('faq.index')->withStatus(__('Faq has updated successfully.'));
    }

    public function destroy(Faq $faq)
    {
        try{
            $faq->delete();
            return true;
        }catch(Throwable $th){
            return response('Data is Connected with other Data', 400);
        }
    }
}
