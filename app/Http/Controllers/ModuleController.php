<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use App\Models\Module;
use App\Models\Setting;
use Illuminate\Support\Facades\Artisan;
use ZipArchive;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();
        $admin = Setting::first();
        return view('admin.module.index', compact('modules', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('module_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'upload_file' => 'bail|required',
        ]);
        $is_valid = $this->checkZip($request->file('upload_file'));
        if ($is_valid) {
            $zip = $request->file('upload_file');
            $moduleNameFromDatabase = Module::where('id', $request->module_id)->value('module');
            $zipFileName = $zip->getClientOriginalName();
            if (strpos($zipFileName, $moduleNameFromDatabase) === false) {
                return redirect()->back()->withErrors(['error' => __('ZIP file name does not match the module name')]);
            }
            $tempFilePath = $zip->store('', 'temp');
            $zipPath = Storage::disk('temp')->path($tempFilePath);
            $extractPath = base_path('/Modules' . '/');
            $zipArchive = new ZipArchive();
            try {
                if ($zipArchive->open($zipPath) === TRUE) {
                    $seatmapExists = $zipArchive->locateName('Seatmap.php', ZipArchive::FL_NODIR) !== false;
                    if ($seatmapExists) {
                        if (file_exists($extractPath . 'Seatmap')) {
                            return redirect()->back()->withErrors(['error' => __('Already exists')]);
                        }
                        Module::where('id', $request->module_id)->update(['is_enable' => 1, 'is_install' => 1]);
                        $zipArchive->extractTo($extractPath);
                        $destinationPath = public_path('modules/');
                        $zip->move($destinationPath, $zip->getClientOriginalName(), $zip->getClientOriginalExtension());
                        $zipArchive->close();
                        Storage::disk('temp')->delete($tempFilePath);
                    } else {
                        return redirect()->back()->withErrors(['error' => __('Seatmap.php not found in ZIP archive')]);
                    }
                } else {
                    return redirect()->back()->withErrors(['error' => __('Failed to open ZIP archive')]);
                }
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => __($e)]);
            }
            Artisan::call('module:migrate', ['module' => pathinfo($zipFileName, PATHINFO_FILENAME)]);
            return redirect()->route('module.index')->withStatus(__('Module has been added successfully.'), 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = Module::find($id);
        return view('admin.module.install', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        abort_if(Gate::denies(['module_enable', 'module_disable']), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $module = Module::find($id);
        if ($module) {
            $currentIsEnable = $module->is_enable;
            $module->update(['is_enable' => !$currentIsEnable]);
            if (!$currentIsEnable) {
                Session::flash('status', 'Module enabled successfully');
                return response()->json(['success' => true]);
            } else {
                Session::flash('status', 'Module disabled successfully');
                return response()->json(['success' => true]);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Module not found']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('module_remove'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $module = Module::findOrFail($id);
            $module_name = $module->module;
            $extractedDirectory =  base_path('/Modules' . '/' . $module_name);
            $filePath = public_path('modules/' . $module_name . '.zip');
            if (File::isDirectory($extractedDirectory)) {
                Artisan::call('module:migrate-rollback', ['module' => $module_name]);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
                File::deleteDirectory($extractedDirectory);
                Module::where('id', $id)->update(['is_install' => 0, 'is_enable' => 0]);
            } else {
                return response()->json(['success' => false, 'message' => 'File not found']);
            }
            Session::flash('status', 'Module removed successfully');
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Not found']);
        }
    }

    private function checkZip($zipFile)
    {
        $zip = new ZipArchive;
        $zipFilePath = $zipFile->getPathname();
        if ($zip->open($zipFilePath) === TRUE) {
            $zip->close();
            return true;
        } else {
            return false;
        }
    }
}
