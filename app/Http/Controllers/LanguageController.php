<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class LanguageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('language_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $languages = Language::get();
        return view('admin.language.index', compact('languages'));
    }

    public function create()
    {
        abort_if(Gate::denies('language_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.language.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'direction' => 'required',
            'json_file' => 'required'
        ]);
        if ($file = $request->hasfile('image')) {
            $file = $request->file('image');
            $fileName = $request->name;
            $path = public_path('/images/upload/');
            $file->move($path, $fileName . ".png");
            $data['image'] = $fileName . ".png";
        }
        if ($file = $request->hasfile('json_file')) {
            $file = $request->file('json_file');
            $fileName = $request->name;
            $path = resource_path('/lang');
            $file->move($path, $fileName . '.json');
            $data['json_file'] = $fileName . ".json";
        }
        Language::create($data);
        return redirect('/language');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('language_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $language = Language::find($id);
        return view('admin.language.edit', compact('language'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $language = Language::find($id);
        $request->validate([
            'name' => 'required',
            'direction' => 'required',
        ]);
        $data['direction']= 'ltr';
        if ($file = $request->hasfile('image')) {
            (new AppHelper)->deleteFile($language->image);
            $file = $request->file('image');
            $fileName = $request->name;
            $path = public_path('/images/upload/');
            $file->move($path, $fileName . ".png");
            $data['image'] = $fileName . ".png";
        }
        if ($file = $request->hasfile('json_file')) {
            $file = $request->file('json_file');
            $fileName = $request->name;
            $path = resource_path('/lang');
            $file->move($path, $fileName . '.json');
            $data['json_file'] = $fileName . ".json";;
        }
        $language->update($data);
        return redirect('/language');
    }

    public function download_sample_file()
    {
        $pathToFile = resource_path() . '/lang/English.json';
        $name = 'English.json';
        $headers = array('Content-Type: application/json',);
        return response()->download($pathToFile, $name, $headers);
    }
}
