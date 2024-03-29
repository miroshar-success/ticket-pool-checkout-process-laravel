<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use Svg\Tag\Rect;

class TaxController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tax_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $taxes = Tax::orderBy('id', 'DESC')->get();
        return view('admin.tax.index', compact('taxes'));
    }

    public function create(Request $request)
    {
        abort_if(Gate::denies('tax_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.tax.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required',
            'price' => 'bail|required',
            'amount_type' => 'required|in:price,percentage',
        ],);
        $data = $request->all();
        if (!isset($request->allow_all_bill)) {
            $data['allow_all_bill'] = 0;
        }
        $Tax = Tax::create($data);
        return redirect()->route('tax.index')->withStatus(__('Tax has added successfully.'));
    }

    public function show(Tax $tax)
    {
    }

    public function edit(Tax $tax)
    {
        abort_if(Gate::denies('tax_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.tax.edit', compact('tax'));
    }

    public function update(Request $request, Tax $tax)
    {

        $request->validate([
            'name' => 'bail|required',
            'price' => 'bail|required',
            'amount_type' => 'required|in:price,percentage',
        ]);
        $data = $request->all();

        if (!isset($request->allow_all_bill)) {
            $data['allow_all_bill'] = 0;
        }
        $Tax = Tax::find($tax->id)->update($data);
        return redirect()->route('tax.index')->withStatus(__('Tax has updated successfully.'));
    }

    public function destroy(Tax $tax)
    {
    }
}
