<?php

namespace App\Http\Controllers;

use App\DietaryNutrients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class DietaryNutrientsController extends Controller
{
    public function create()
    {
        return view('nutrients.create');
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
            return Redirect::to('/administrators-dashboard/dietary-nutrients/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $refID = Input::get('DataSet') . Input::get('PubID') . Input::get('TrialID');
            // store
            $nutrient = new DietaryNutrients();
            $nutrient->ref = $refID;
            $nutrient->DataSet = Input::get('DataSet');
            $nutrient->PubID = Input::get('PubID');
            $nutrient->TrialID = Input::get('TrialID');
            $nutrient->TrtID = Input::get('TrtID');
            $nutrient->SubjectID = Input::get('SubjectID');
            $nutrient->VarName = Input::get('VarName');
            $nutrient->VarValue = Input::get('VarValue');
            $nutrient->VarUnits = Input::get('VarUnits');
            $nutrient->N = Input::get('N');
            $nutrient->SE = Input::get('SE');
            $nutrient->SD = Input::get('SD');
            $nutrient->save();

            return Redirect::to('/administrators-dashboard/dietary-nutrients')->with('alerts', 'Successfully created Dietary Nutrient');
        }
    }

    public function edit($id)
    {
        $nutrient = DietaryNutrients::where('id', $id)->first();

        return view('nutrients.edit', compact('nutrient'));
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
            return Redirect::to('administrators-dashboard/dietary-nutrients/edit/' . $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            DietaryNutrients::where('id', $id)->update($request->except(['_token']));

            return Redirect::to('/administrators-dashboard/dietary-nutrients')->with('alerts', 'Successfully Updated Study!');

        }
    }
}
