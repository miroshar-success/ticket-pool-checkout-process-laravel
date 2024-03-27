<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Throwable;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class FeedbackController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('feedback_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if(Auth::user()->hasRole('Organizer')){
            $feedback = Feedback::where('user_id',Auth::user()->id)->with(['user'])->orderBy('id','DESC')->get();
        }
        elseif(Auth::user()->hasRole('admin')){
            $feedback = Feedback::with(['user'])->orderBy('id','DESC')->get();
        }

        return view('admin.feedback.index', compact('feedback'));
    }

    public function create()
    {
        abort_if(Gate::denies('feedback_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.feedback.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'bail|required',
            'message' => 'bail|required',
            'rate' => 'bail|required',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $feedback = Feedback::create($data);
        return redirect()->route('feedback.index')->withStatus(__('Feedback has added successfully.'));
    }

    public function show(Feedback $feedback)
    {

    }

    public function edit(Feedback $feedback)
    {
        abort_if(Gate::denies('feedback_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.feedback.edit', compact( 'feedback'));
    }

    public function update(Request $request, Feedback $feedback)
    {

        $request->validate([
            'user_id' => 'bail|required',
            'email' => 'bail|required',
            'message' => 'bail|required',
            'rate' => 'bail|required',
        ]);

        $feedback = Feedback::find($feedback->id)->update($request->all());
        return redirect()->route('feedback.index')->withStatus(__('Feedback has updated successfully.'));
    }

    public function destroy(Feedback $feedback)
    {
        try{
            $feedback->delete();
            return true;
        }catch(Throwable $th){
            return response('Data is Connected with other Data', 400);
        }
    }
}
