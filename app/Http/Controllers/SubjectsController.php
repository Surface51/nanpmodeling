<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SubjectsController extends Controller
{
    public function create()
    {
        return view('subjects.create');
    }

    public function store()
    {
        // validate
        $rules = array(
            'DataSet'       => 'required',
            'PubID'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('/administrators-dashboard/subjects/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $refID = Input::get('DataSet') . Input::get('PubID') . Input::get('TrialID');
            // store
            $subject = new Subject();
            $subject->ref = $refID;
            $subject->DataSet = Input::get('DataSet');
            $subject->PubID = Input::get('PubID');
            $subject->TrialID = Input::get('TrialID');
            $subject->TrtID = Input::get('TrtID');
            $subject->SubjectID = Input::get('SubjectID');
            $subject->VarName = Input::get('VarName');
            $subject->VarValue = Input::get('VarValue');
            $subject->VarUnits = Input::get('VarUnits');
            $subject->N = Input::get('N');
            $subject->SE = Input::get('SE');
            $subject->SD = Input::get('SD');
            $subject->save();

            return Redirect::to('/administrators-dashboard/subjects')->with('alerts', 'Successfully created Subject');
        }
    }

    public function edit($id)
    {
        $subject = Subject::where('id', $id)->first();

        return view('subjects.edit', compact('subject'));
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
            return Redirect::to('administrators-dashboard/subjects/edit/' . $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            Subject::where('id', $id)->update($request->except(['_token']));

            return Redirect::to('/administrators-dashboard/subjects')->with('alerts', 'Successfully Updated Subject!');

        }
    }

    public function destroy($id)
    {
        $subjects = Subject::where('id', $id)->get();

        foreach($subjects as $subject)
        {
            if($subject) {
                $subject->delete();
            }
        }

        return Redirect::to('/administrators-dashboard/subjects')->with('alerts', 'Successfully Removed Subject');

    }
}
