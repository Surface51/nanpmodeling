<?php

namespace App\Http\Controllers;

use App\DietaryIngredients;
use App\lib\imports\ImportEngine;
use App\StudyDescriptor;
use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;


class AdministratorsController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function filemanager()
    {
        return view('admin.filemanager');
    }

    public function studies()
    {
        $stdys = StudyDescriptor::all();

        return view('admin.studies', compact('stdys'));
    }

    public function ingredients()
    {
        $ingredients = DietaryIngredients::all();

        return view('admin.ingredients', compact('ingredients'));
    }


    public function importFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:1024',
        ]);

        $name = $request->file('file')->getClientOriginalName();
        $fileName = $name;

        $request->file('file')->move(public_path("/uploads/files"), $fileName);

        $import = ImportEngine::importData();
//        $import = ImportEngine::importFiles();

        if($import == false){
            Alert::error(trans('No File Present for Import'))->flash();
            return redirect('/administrators-dashboard/file-manager')->with('alerts', 'Import Failed');
        }

        Alert::success(trans('Successful Import'))->flash();
        return redirect('/administrators-dashboard/file-manager')->with('alerts', 'Successful Import!');
    }

}
