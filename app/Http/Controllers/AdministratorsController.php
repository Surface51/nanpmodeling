<?php

namespace App\Http\Controllers;

use App\DietaryIngredients;
use App\lib\imports\ImportEngine;
use App\StudyDescriptor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
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
            'file' => 'required|file',
        ]);

        $name = $request->file('file')->getClientOriginalName();
        $fileName = $name;

        $request->file('file')->move(public_path("/uploads/files"), $fileName);

//        $import = ImportEngine::importData();

//        if($import == false){
//            Alert::error(trans('No File Present for Import'))->flash();
//            return redirect('/administrators-dashboard/file-manager')->with('alerts', 'Import Failed');
//        }

        Alert::success(trans('Successful Import'))->flash();
        return redirect('/administrators-dashboard/file-manager')->with('alerts', 'Successful Import!');
    }

    public function importWorkbook(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        $name = $request->file('file')->getClientOriginalName();
        $fileName = $name;

        $request->file('file')->move(public_path("/uploads/workbooks"), $fileName);


        Alert::success(trans('Successful Upload'))->flash();
        return redirect('/administrators-dashboard/file-manager')->with('alerts', 'Successfully Uploaded Workbook!');
    }

//    public function countSheets()
//    {
//        $directory = public_path('/uploads/workbooks/');
//        $handle = opendir($directory);
//        while (false !== ($entry = readdir($handle))) {
//            if ($entry != "." && $entry != "..") {
//                $files = scandir($directory);
//                if (count($files) == 3) {
//                    $firstfile = $directory . $files[2];
//                    $file = $firstfile;
//                    if (File::exists($file)) {
//                        $counter = 0;
//                        Excel::load($file, function ($reader) use (&$counter) {
//                            $reader->get()->toArray();
//                            $reader->noHeading();
//                            $reader->ignoreEmpty();
//                            // Loop through all sheets
//                            $reader->each(function ($sheet) {
//                                // Loop through all rows
//                                $title = $sheet->getTitle();
//                                switch($title) {
//                                    case ($title == 'dietary_ingredients'):
//                                        $sheet->each(function ($row) {
//                                            echo 'start dietary ingredients';
//                                            foreach ($row as $value) {
//                                                echo $value;
//                                            }
//                                        });
//                                        break;
//                                    case ($title == 'subjects'):
//                                        $sheet->each(function ($row) {
//                                            foreach ($row as $value) {
//                                                echo $value;
//                                            }
//                                        });
//                                        break;
//                                    default:
//                                        print "nope";
//                                }
//
//                            });
//                        });
//                    }
//                }
//            }
//        }
//    }
}
