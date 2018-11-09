<?php

namespace App\Http\Controllers;

use App\StudyDescriptor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Prologue\Alerts\Facades\Alert;

class StudyDescriptorsController extends Controller
{
    public function create()
    {
        return view('study.create');
    }

    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'DataSet' => 'required',
            'PubID' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('/administrators-dashboard/study-descriptors/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $refID = Input::get('DataSet') . Input::get('PubID') . Input::get('TrialID');
            // store
            $study = new StudyDescriptor();
            $study->ref = $refID;
            $study->DataSet = Input::get('DataSet');
            $study->PubID = Input::get('PubID');
            $study->TrialID = Input::get('TrialID');
            $study->VarName = Input::get('VarName');
            $study->VarValue = Input::get('VarValue');
            $study->VarUnits = Input::get('VarUnits');
            $study->save();

            return Redirect::to('/administrators-dashboard/study-descriptors')->with('alerts', 'Successfully created Study Descriptor');
        }
    }

    public function edit($id)
    {
        $study = StudyDescriptor::where('id', $id)->first();

        return view('study.edit', compact('study'));
    }

    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'DataSet' => 'required',
            'PubID' => 'required',
            'TrialID' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('administrators-dashboard/study-descriptors/edit/' . $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            StudyDescriptor::where('id', $id)->update($request->except(['_token']));

            return Redirect::to('/administrators-dashboard/study-descriptors')->with('alerts', 'Successfully Updated Study!');

        }
    }

    public function destroy($id)
    {
        $studies = StudyDescriptor::where('id', $id)->get();

        foreach($studies as $study)
        {
            if($study) {
                $study->delete();
            }
        }

        return Redirect::to('/administrators-dashboard/study-descriptors')->with('alerts', 'Successfully Removed Study');

    }
}
