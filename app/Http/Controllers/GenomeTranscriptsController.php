<?php

namespace App\Http\Controllers;

use App\GenomeTranscript;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class GenomeTranscriptsController extends Controller
{
    public function create()
    {
        return view('genomes.create');
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
            return Redirect::to('/administrators-dashboard/genomes/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $refID = Input::get('DataSet') . Input::get('PubID') . Input::get('TrialID');
            // store
            $genomes = new GenomeTranscript();
            $genomes->ref = $refID;
            $genomes->DataSet = Input::get('DataSet');
            $genomes->PubID = Input::get('PubID');
            $genomes->TrialID = Input::get('TrialID');
            $genomes->TrtID = Input::get('TrtID');
            $genomes->SubjectID = Input::get('SubjectID');
            $genomes->PlateID = Input::get('PlateID');
            $genomes->WellID = Input::get('WellID');
            $genomes->SubTrtID = Input::get('SubTrtID');
            $genomes->Site_sample = Input::get('Site_sample');
            $genomes->Cell_Type = Input::get('Cell_Type');
            $genomes->Day_Sample = Input::get('Day_Sample');
            $genomes->Day_Sample2 = Input::get('Day_Sample2');
            $genomes->VarName = Input::get('VarName');
            $genomes->VarValue = Input::get('VarValue');
            $genomes->VarUnits = Input::get('VarUnits');
            $genomes->N = Input::get('N');
            $genomes->SE = Input::get('SE');
            $genomes->SD = Input::get('SD');
            $genomes->VarType = Input::get('VarType');
            $genomes->save();

            return Redirect::to('/administrators-dashboard/genome-transcripts')->with('alerts', 'Successfully created Infusion');
        }
    }

    public function edit($id)
    {
        $genome = GenomeTranscript::where('id', $id)->first();

        return view('genomes.edit', compact('genome'));
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
            return Redirect::to('administrators-dashboard/genomes/edit/' . $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            GenomeTranscript::where('id', $id)->update($request->except(['_token']));

            return Redirect::to('/administrators-dashboard/genome-transcripts')->with('alerts', 'Successfully Updated Genome Transcript!');

        }
    }

    public function destroy($id)
    {
        $genomes = GenomeTranscript::where('id', $id)->get();

        foreach($genomes as $genome)
        {
            if($genomes) {
                $genome->delete();
            }
        }

        return Redirect::to('/administrators-dashboard/genome-transcripts')->with('alerts', 'Successfully Removed Genome Transcript');

    }
}
