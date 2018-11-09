<?php

namespace App\Http\Controllers;

use App\InVitroData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class InVitroDataController extends Controller
{
    public function create()
    {
        return view('invitros.create');
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
            return Redirect::to('/administrators-dashboard/invitros/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $refID = Input::get('DataSet') . Input::get('PubID') . Input::get('TrialID');
            // store
            $invitro = new InVitroData();
            $invitro->ref = $refID;
            $invitro->DataSet = Input::get('DataSet');
            $invitro->PubID = Input::get('PubID');
            $invitro->TrialID = Input::get('TrialID');
            $invitro->TrtID = Input::get('TrtID');
            $invitro->SubjectID = Input::get('SubjectID');
            $invitro->PlateID = Input::get('PlateID');
            $invitro->WellID = Input::get('WellID');
            $invitro->SubTrtID = Input::get('SubTrtID');
            $invitro->Site_sample = Input::get('Site_sample');
            $invitro->Cell_Type = Input::get('Cell_Type');
            $invitro->Day_Sample = Input::get('Day_Sample');
            $invitro->Day_Sample2 = Input::get('Day_Sample2');
            $invitro->Time_Sample = Input::get('Time_Sample');
            $invitro->VarName = Input::get('VarName');
            $invitro->VarValue = Input::get('VarValue');
            $invitro->VarUnits = Input::get('VarUnits');
            $invitro->N = Input::get('N');
            $invitro->SE = Input::get('SE');
            $invitro->SD = Input::get('SD');
            $invitro->VarType = Input::get('VarType');
            $invitro->save();

            return Redirect::to('/administrators-dashboard/invitros')->with('alerts', 'Successfully created In Vitro Data');
        }
    }

    public function edit($id)
    {
        $invitro = InVitroData::where('id', $id)->first();

        return view('invitros.edit', compact('invitro'));
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
            return Redirect::to('administrators-dashboard/invitros/edit/' . $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            InVitroData::where('id', $id)->update($request->except(['_token']));

            return Redirect::to('/administrators-dashboard/invitros')->with('alerts', 'Successfully Updated Invitro Data!');

        }
    }

    public function destroy($id)
    {
        $invitros = InVitroData::where('id', $id)->get();

        foreach($invitros as $invitro)
        {
            if($invitros) {
                $invitro->delete();
            }
        }

        return Redirect::to('/administrators-dashboard/invitros')->with('alerts', 'Successfully Removed Data');

    }
}
