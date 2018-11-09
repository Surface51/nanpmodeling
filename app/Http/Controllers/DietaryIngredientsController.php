<?php

namespace App\Http\Controllers;

use App\DietaryIngredients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DietaryIngredientsController extends Controller
{
    public function create()
    {
        return view('ingredients.create');
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
            return Redirect::to('/administrators-dashboard/dietary-ingredients/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $refID = Input::get('DataSet') . Input::get('PubID') . Input::get('TrialID');
            // store
            $ingredient = new DietaryIngredients();
            $ingredient->ref = $refID;
            $ingredient->DataSet = Input::get('DataSet');
            $ingredient->PubID = Input::get('PubID');
            $ingredient->TrialID = Input::get('TrialID');
            $ingredient->TrtID = Input::get('TrtID');
            $ingredient->IFN = Input::get('IFN');
            $ingredient->VarName = Input::get('VarName');
            $ingredient->Varvalue = Input::get('Varvalue');
            $ingredient->VarUnits = Input::get('VarUnits');
            $ingredient->N = Input::get('N');
            $ingredient->SE = Input::get('SE');
            $ingredient->SD = Input::get('SD');
            $ingredient->IngrNum = Input::get('IngrNum');
            $ingredient->save();

            return Redirect::to('/administrators-dashboard/dietary-ingredients')->with('alerts', 'Successfully created Dietary Ingredient');
        }
    }

    public function edit($id)
    {
        $ingredient = DietaryIngredients::where('id', $id)->first();

        return view('ingredients.edit', compact('ingredient'));
    }

    public function update(Request $request, $id)
    {
        // validate
        $rules = array(
            'DataSet'       => 'required',
            'PubID'      => 'required',
            'TrialID' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('administrators-dashboard/dietary-ingredients/edit/' . $id)
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            DietaryIngredients::where('id', $id)->update($request->except(['_token']));

            return Redirect::to('/administrators-dashboard/dietary-ingredients')->with('alerts', 'Successfully Updated Dietary Ingredient!');

        }
    }

    public function destroy($ref)
    {
        $studies = DietaryIngredients::where('ref', $ref)->get();

        foreach($studies as $study)
        {
            if($study) {
                $study->delete();
            }
        }

        return Redirect::to('/administrators-dashboard/dietary-ingredients')->with('alerts', 'Successfully Removed Dietary Ingredient');

    }
}
