<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;
use App\lib\imports\ImportEngine;

class ImportController extends Controller
{
    public function importStudyDescriptors()
    {
        $bodyweight = ImportEngine::importData();
        if($bodyweight == 'Failed'){
            Alert::error(trans('No File Present for Import'))->flash();
            return redirect('/filters')->with('alerts', Alert::all());
        }

        Alert::success(trans('Successful Import'))->flash();
        return redirect('/filters')->with('alerts', Alert::all());
    }
}
