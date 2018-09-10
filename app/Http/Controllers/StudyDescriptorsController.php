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
            $ack = new StudyDescriptor();
            $ack->ref = $refID;
            $ack->DataSet = Input::get('DataSet');
            $ack->PubID = Input::get('PubID');
            $ack->TrialID = Input::get('TrialID');
            $ack->VarName = 'Availability';
            $ack->VarValue = Input::get('Availability');
            $ack->VarUnits = '-';
            $ack->save();

            $ref = new StudyDescriptor();
            $ref->ref = $refID;
            $ref->DataSet = Input::get('DataSet');
            $ref->PubID = Input::get('PubID');
            $ref->TrialID = Input::get('TrialID');
            $ref->VarName = 'Reference';
            $ref->VarValue = Input::get('Reference');
            $ref->VarUnits = '-';
            $ref->save();

            $year = new StudyDescriptor();
            $year->ref = $refID;
            $year->DataSet = Input::get('DataSet');
            $year->PubID = Input::get('PubID');
            $year->TrialID = Input::get('TrialID');
            $year->VarName = 'Year';
            $year->VarValue = Input::get('Year');
            $year->VarUnits = 'year';
            $year->save();

            $year = new StudyDescriptor();
            $year->ref = $refID;
            $year->DataSet = Input::get('DataSet');
            $year->PubID = Input::get('PubID');
            $year->TrialID = Input::get('TrialID');
            $year->VarName = 'DataType';
            $year->VarValue = Input::get('DataType');
            $year->VarUnits = '-';
            $year->save();

            $loc = new StudyDescriptor();
            $loc->ref = $refID;
            $loc->DataSet = Input::get('DataSet');
            $loc->PubID = Input::get('PubID');
            $loc->TrialID = Input::get('TrialID');
            $loc->VarName = 'Location';
            $loc->VarValue = Input::get('Location');
            $loc->VarUnits = '-';
            $loc->save();

            return Redirect::to('/administrators-dashboard/study-descriptors')->with('alerts', 'Successfully created Study Descriptor');
        }
    }

    public function edit($ref)
    {
        $study = StudyDescriptor::where('ref', $ref)->get();
        $DataSet = StudyDescriptor::where('ref', $ref)->pluck('DataSet')->first();
        $PubID = StudyDescriptor::where('ref', $ref)->pluck('PubID')->first();
        $TrialID = StudyDescriptor::where('ref', $ref)->pluck('TrialID')->first();
        $Availability = StudyDescriptor::where('ref', $ref)->where('VarName', 'Availability')->pluck('VarValue')->first();
        $Reference = StudyDescriptor::where('ref', $ref)->where('VarName', 'Reference')->pluck('VarValue')->first();
        $Year = StudyDescriptor::where('ref', $ref)->where('VarName', 'Year')->pluck('VarValue')->first();
        $DataType = StudyDescriptor::where('ref', $ref)->where('VarName', 'DataType')->pluck('VarValue')->first();
        $Location = StudyDescriptor::where('ref', $ref)->where('VarName', 'Location')->pluck('VarValue')->first();

        return view('study.edit',
            compact('study', 'DataSet', 'PubID', 'TrialID', 'Availability', 'Reference', 'Year', 'DataType', 'Location', 'ref'));

    }

    public function update($ref)
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
            return Redirect::to('administrators-dashboard/study-descriptors/edit/' . $ref)
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $availability = StudyDescriptor::where('ref', $ref)->where('VarName', 'Availability');
            $availability->update([
                'VarValue' => Input::get('Availability')
            ]);

            $reference = StudyDescriptor::where('ref', $ref)->where('VarName', 'Reference');
            $reference->update([
                'VarValue' => Input::get('Reference')
            ]);

            $year = StudyDescriptor::where('ref', $ref)->where('VarName', 'Year');
            $year->update([
                'VarValue' => Input::get('Year')
            ]);

            $datatype = StudyDescriptor::where('ref', $ref)->where('VarName', 'DataType');
            $datatype->update([
                'VarValue' => Input::get('DataType')
            ]);

            $location = StudyDescriptor::where('ref', $ref)->where('VarName', 'Location');
            $location->update([
                'VarValue' => Input::get('Location')
            ]);

            return Redirect::to('/administrators-dashboard/study-descriptors')->with('alerts', 'Successfully Updated Study!');

        }
    }

    public function destroy($ref)
    {
        $studies = StudyDescriptor::where('ref', $ref)->get();

        foreach($studies as $study)
        {
            if($study) {
                $study->delete();
            }
        }

        return Redirect::to('/administrators-dashboard/study-descriptors')->with('alerts', 'Successfully Removed Study');

    }
}
