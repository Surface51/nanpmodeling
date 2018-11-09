<?php

namespace App\Http\Controllers;

use App\PerformanceData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PerformanceDataController extends Controller
{
    public function create()
    {
        return view('performance.create');
    }

    public function store()
    {
        // validate
        $rules = array(
            'DataSet' => 'required',
            'PubID' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('/administrators-dashboard/performance-data/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $refID = Input::get('DataSet') . Input::get('PubID') . Input::get('TrialID');
            // store
            $performance = new PerformanceData();
            $performance->ref = $refID;
            $performance->DataSet = Input::get('DataSet');
            $performance->PubID = Input::get('PubID');
            $performance->TrialID = Input::get('TrialID');
            $performance->TrtID = Input::get('TrtID');
            $performance->SubjectID = Input::get('SubjectID');
            $performance->Site_Sample = Input::get('Site_Sample');
            $performance->Day_Sample = Input::get('Day_Sample');
            $performance->Time_Sample = Input::get('Time_Sample');
            $performance->VarName = Input::get('VarName');
            $performance->VarValue = Input::get('VarValue');
            $performance->VarUnits = Input::get('VarUnits');
            $performance->N = Input::get('N');
            $performance->SEM = Input::get('SEM');
            $performance->SED = Input::get('SED');
            $performance->VarType = Input::get('VarType');
            $performance->save();

            return Redirect::to('/administrators-dashboard/performance-data')->with('alerts', 'Successfully created Performance Data');
        }
    }

    public function edit($id)
    {
        $performance = PerformanceData::where('id', $id)->first();

        return view('performance.edit', compact('performance'));
    }


    public function update(Request $request, $id)
    {
        // validate
        $rules = array(
            'DataSet' => 'required',
            'PubID' => 'required',
            'TrialID' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('administrators-dashboard/performance-data/edit/' . $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            PerformanceData::where('id', $id)->update($request->except(['_token']));

            return Redirect::to('/administrators-dashboard/performance-data')->with('alerts', 'Successfully Updated Performance Data!');

        }
    }

    public function destroy($id)
    {
        $performances = PerformanceData::where('id', $id)->get();

        foreach($performances as $performance)
        {
            if($performance) {
                $performance->delete();
            }
        }

        return Redirect::to('/administrators-dashboard/performance-data')->with('alerts', 'Successfully Removed Data');

    }
}
