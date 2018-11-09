<?php

namespace App\Http\Controllers;

use App\Infusion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class InfusionsController extends Controller
{
    public function create()
    {
        return view('infusions.create');
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
            return Redirect::to('/administrators-dashboard/infusions/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $refID = Input::get('DataSet') . Input::get('PubID') . Input::get('TrialID');
            // store
            $infusion = new Infusion();
            $infusion->ref = $refID;
            $infusion->DataSet = Input::get('DataSet');
            $infusion->PubID = Input::get('PubID');
            $infusion->TrialID = Input::get('TrialID');
            $infusion->TrtID = Input::get('TrtID');
            $infusion->SubjectID = Input::get('SubjectID');
            $infusion->InfusionLocation = Input::get('InfusionLocation');
            $infusion->VarName = Input::get('VarName');
            $infusion->VarValue = Input::get('VarValue');
            $infusion->VarUnits = Input::get('VarUnits');
            $infusion->DayofPeriodStart = Input::get('DayofPeriodStart');
            $infusion->DayofPeriodStop = Input::get('DayofPeriodStop');
            $infusion->TimeofDayStart = Input::get('TimeofDayStart');
            $infusion->TimeofDayStop = Input::get('TimeofDayStop');
            $infusion->save();

            return Redirect::to('/administrators-dashboard/infusions')->with('alerts', 'Successfully created Infusion');
        }
    }

    public function edit($id)
    {
        $infusion = Infusion::where('id', $id)->first();

        return view('infusions.edit', compact('infusion'));
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
            return Redirect::to('administrators-dashboard/infusions/edit/' . $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            Infusion::where('id', $id)->update($request->except(['_token']));

            return Redirect::to('/administrators-dashboard/infusions')->with('alerts', 'Successfully Updated Infusion!');

        }
    }

    public function destroy($id)
    {
        $infusions = Infusion::where('id', $id)->get();

        foreach($infusions as $infusion)
        {
            if($infusions) {
                $infusion->delete();
            }
        }

        return Redirect::to('/administrators-dashboard/infusions')->with('alerts', 'Successfully Removed Infusion');

    }
}
