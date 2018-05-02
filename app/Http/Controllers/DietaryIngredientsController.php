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
            $ack = new DietaryIngredients();
            $ack->ref = $refID;
            $ack->DataSet = Input::get('DataSet');
            $ack->PubID = Input::get('PubID');
            $ack->TrialID = Input::get('TrialID');
            $ack->VarName = 'Acknowledgement';
            $ack->VarValue = Input::get('Acknowledgement');
            $ack->VarUnits = '-';
            $ack->save();

            $ref = new DietaryIngredients();
            $ref->ref = $refID;
            $ref->DataSet = Input::get('DataSet');
            $ref->PubID = Input::get('PubID');
            $ref->TrialID = Input::get('TrialID');
            $ref->VarName = 'Reference';
            $ref->VarValue = Input::get('Reference');
            $ref->VarUnits = '-';
            $ref->save();

            $year = new DietaryIngredients();
            $year->ref = $refID;
            $year->DataSet = Input::get('DataSet');
            $year->PubID = Input::get('PubID');
            $year->TrialID = Input::get('TrialID');
            $year->VarName = 'Year';
            $year->VarValue = Input::get('Year');
            $year->VarUnits = 'year';
            $year->save();

            $loc = new DietaryIngredients();
            $loc->ref = $refID;
            $loc->DataSet = Input::get('DataSet');
            $loc->PubID = Input::get('PubID');
            $loc->TrialID = Input::get('TrialID');
            $loc->VarName = 'Location';
            $loc->VarValue = Input::get('Location');
            $loc->VarUnits = '-';
            $loc->save();

            return Redirect::to('/administrators-dashboard/dietary-ingredients')->with('alerts', 'Successfully created Dietary Ingredient');
        }
    }

    public function edit($ref)
    {
        $DI = DietaryIngredients::where('ref', $ref)->get();
        $DataSet = DietaryIngredients::where('ref', $ref)->pluck('DataSet')->first();
        $PubID = DietaryIngredients::where('ref', $ref)->pluck('PubID')->first();
        $TrialID = DietaryIngredients::where('ref', $ref)->pluck('TrialID')->first();
        $TrtID = DietaryIngredients::where('ref', $ref)->pluck('TrtID')->first();
        $Dietary_inclusion = DietaryIngredients::where('ref', $ref)->where('VarName', 'Dietary_inclusion')->pluck('VarValue')->first();
        $IngredientName = DietaryIngredients::where('ref', $ref)->where('VarName', 'Dietary_inclusion')->pluck('VarValue')->first();
        $DM = DietaryIngredients::where('ref', $ref)->where('VarName', 'DM')->pluck('VarValue')->first();
        $OM = DietaryIngredients::where('ref', $ref)->where('VarName', 'OM')->pluck('VarValue')->first();
        $CP = DietaryIngredients::where('ref', $ref)->where('VarName', 'CP')->pluck('VarValue')->first();
        $RUP = DietaryIngredients::where('ref', $ref)->where('VarName', 'RUP')->pluck('VarValue')->first();
        $RDP = DietaryIngredients::where('ref', $ref)->where('VarName', 'RDP')->pluck('VarValue')->first();
        $SolN = DietaryIngredients::where('ref', $ref)->where('VarName', 'SolN')->pluck('VarValue')->first();
        $N = DietaryIngredients::where('ref', $ref)->where('VarName', 'N')->pluck('VarValue')->first();
        $C = DietaryIngredients::where('ref', $ref)->where('VarName', 'C')->pluck('VarValue')->first();
        $EE = DietaryIngredients::where('ref', $ref)->where('VarName', 'EE')->pluck('VarValue')->first();
        $FA = DietaryIngredients::where('ref', $ref)->where('VarName', 'FA')->pluck('VarValue')->first();
        $CFiber = DietaryIngredients::where('ref', $ref)->where('VarName', 'CFiber')->pluck('VarValue')->first();
        $NDF = DietaryIngredients::where('ref', $ref)->where('VarName', 'NDF')->pluck('VarValue')->first();
        $ADF = DietaryIngredients::where('ref', $ref)->where('VarName', 'ADF')->pluck('VarValue')->first();
        $HC = DietaryIngredients::where('ref', $ref)->where('VarName', 'HC')->pluck('VarValue')->first();
        $Cel = DietaryIngredients::where('ref', $ref)->where('VarName', 'Cel')->pluck('VarValue')->first();
        $Lignin = DietaryIngredients::where('ref', $ref)->where('VarName', 'Lignin')->pluck('VarValue')->first();
        $Starch = DietaryIngredients::where('ref', $ref)->where('VarName', 'Starch')->pluck('VarValue')->first();
        $NFC = DietaryIngredients::where('ref', $ref)->where('VarName', 'NFC')->pluck('VarValue')->first();
        $SolRes = DietaryIngredients::where('ref', $ref)->where('VarName', 'SolRes')->pluck('VarValue')->first();
        $NFE = DietaryIngredients::where('ref', $ref)->where('VarName', 'NFE')->pluck('VarValue')->first();
        $NDSA = DietaryIngredients::where('ref', $ref)->where('VarName', 'NDSA')->pluck('VarValue')->first();
        $GE = DietaryIngredients::where('ref', $ref)->where('VarName', 'GE')->pluck('VarValue')->first();
        $TDN = DietaryIngredients::where('ref', $ref)->where('VarName', 'TDE')->pluck('VarValue')->first();
        $DE = DietaryIngredients::where('ref', $ref)->where('VarName', 'DE')->pluck('VarValue')->first();
        $ME = DietaryIngredients::where('ref', $ref)->where('VarName', 'ME')->pluck('VarValue')->first();
        $NEm = DietaryIngredients::where('ref', $ref)->where('VarName', 'NEm')->pluck('VarValue')->first();
        $NEg = DietaryIngredients::where('ref', $ref)->where('VarName', 'NEg')->pluck('VarValue')->first();
        $NEl = DietaryIngredients::where('ref', $ref)->where('VarName', 'NEl')->pluck('VarValue')->first();
        $Ash = DietaryIngredients::where('ref', $ref)->where('VarName', 'Ash')->pluck('VarValue')->first();
        $Ca = DietaryIngredients::where('ref', $ref)->where('VarName', 'Ca')->pluck('VarValue')->first();
        $P = DietaryIngredients::where('ref', $ref)->where('VarName', 'P')->pluck('VarValue')->first();
        $Mg = DietaryIngredients::where('ref', $ref)->where('VarName', 'Mg')->pluck('VarValue')->first();
        $K = DietaryIngredients::where('ref', $ref)->where('VarName', 'K')->pluck('VarValue')->first();
        $Na = DietaryIngredients::where('ref', $ref)->where('VarName', 'Na')->pluck('VarValue')->first();
        $Cl = DietaryIngredients::where('ref', $ref)->where('VarName', 'Cl')->pluck('VarValue')->first();
        $S = DietaryIngredients::where('ref', $ref)->where('VarName', 'S')->pluck('VarValue')->first();
        $Lys = DietaryIngredients::where('ref', $ref)->where('VarName', 'Lys')->pluck('VarValue')->first();
        $Arg = DietaryIngredients::where('ref', $ref)->where('VarName', 'Arg')->pluck('VarValue')->first();
        $His = DietaryIngredients::where('ref', $ref)->where('VarName', 'His')->pluck('VarValue')->first();
        $Ile = DietaryIngredients::where('ref', $ref)->where('VarName', 'Ile')->pluck('VarValue')->first();
        $Leu = DietaryIngredients::where('ref', $ref)->where('VarName', 'Leu')->pluck('VarValue')->first();
        $Met = DietaryIngredients::where('ref', $ref)->where('VarName', 'Met')->pluck('VarValue')->first();
        $CyS = DietaryIngredients::where('ref', $ref)->where('VarName', 'CyS')->pluck('VarValue')->first();
        $Phe = DietaryIngredients::where('ref', $ref)->where('VarName', 'Phe')->pluck('VarValue')->first();
        $Tyr = DietaryIngredients::where('ref', $ref)->where('VarName', 'Tyr')->pluck('VarValue')->first();
        $Thr = DietaryIngredients::where('ref', $ref)->where('VarName', 'Thr')->pluck('VarValue')->first();
        $Trp = DietaryIngredients::where('ref', $ref)->where('VarName', 'Trp')->pluck('VarValue')->first();
        $Val = DietaryIngredients::where('ref', $ref)->where('VarName', 'Val')->pluck('VarValue')->first();
        $C120 = DietaryIngredients::where('ref', $ref)->where('VarName', 'C12:0')->pluck('VarValue')->first();
        $C140 = DietaryIngredients::where('ref', $ref)->where('VarName', 'C14:0')->pluck('VarValue')->first();
        $C160 = DietaryIngredients::where('ref', $ref)->where('VarName', 'C16:0')->pluck('VarValue')->first();
        $C161 = DietaryIngredients::where('ref', $ref)->where('VarName', 'C16:1')->pluck('VarValue')->first();
        $C180 = DietaryIngredients::where('ref', $ref)->where('VarName', 'C18:0')->pluck('VarValue')->first();
        $C18ltrans = DietaryIngredients::where('ref', $ref)->where('VarName', 'C18:ltrans')->pluck('VarValue')->first();
        $C18lcis = DietaryIngredients::where('ref', $ref)->where('VarName', 'C18:lcis')->pluck('VarValue')->first();
        $C182c = DietaryIngredients::where('ref', $ref)->where('VarName', 'C18:2c')->pluck('VarValue')->first();
        $C183 = DietaryIngredients::where('ref', $ref)->where('VarName', 'C18:3')->pluck('VarValue')->first();
        $C200 = DietaryIngredients::where('ref', $ref)->where('VarName', 'C20:0')->pluck('VarValue')->first();
        $OthersFA = DietaryIngredients::where('ref', $ref)->where('VarName', 'OthersFA')->pluck('VarValue')->first();


        return view('ingredients.edit',
            compact('DI', 'DataSet', 'PubID', 'TrialID', 'TrtID', 'IFN',
                'Dietary_inclusion', 'IngredientName', 'DM', 'OM', 'CP', 'RUP', 'RDP', 'SolN', 'N', 'C', 'EE',
                'FA', 'CFiber', 'NDF', 'ADF', 'HC', 'Cel', 'Lignin', 'Starch', 'NFC',
                'SolRes', 'NFE', 'NDSA', 'GE', 'TDN', 'DE', 'ME', 'NEm', 'NEg',
                'NEl', 'Ash', 'Ca', 'P', 'Mg', 'K', 'Na', 'Cl', 'S',
                'Lys', 'Arg', 'His', 'Ile', 'Leu', 'Met', 'CyS', 'Phe', 'Tyr', 'Thr',
                'Trp', 'Val', 'C120', 'C140', 'C160', 'C161', 'C180', 'C18ltrans',
                'C18lcis', 'C182c', 'C183', 'C200', 'OthersFA', 'ref'
                ));

    }

    public function update($ref)
    {
        // validate
        $rules = array(
            'DataSet'       => 'required',
            'PubID'      => 'required',
            'TrialID' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('administrators-dashboard/dietary-ingredients/edit/' . $ref)
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $dietary_inclusion = DietaryIngredients::where('ref', $ref)->where('VarName', 'Dietary_inclusion');
            if($dietary_inclusion){
                $dietary_inclusion->update([
                   'Varvalue' => Input::get('Dietary_inclusion')
                ]);
            }

            $IngredientName = DietaryIngredients::where('ref', $ref)->where('VarName', 'IngredientName');
            if($IngredientName){
                $IngredientName->update([
                    'Varvalue' => Input::get('IngredientName')
                ]);
            }

            $DM = DietaryIngredients::where('ref', $ref)->where('VarName', 'DM');
            if($DM){
                $DM->update([
                    'Varvalue' => Input::get('DM')
                ]);
            }

            $OM = DietaryIngredients::where('ref', $ref)->where('VarName', 'OM');
            if($OM){
                $OM->update([
                    'Varvalue' => Input::get('OM')
                ]);
            }

            $CP = DietaryIngredients::where('ref', $ref)->where('VarName', 'CP');
            if($CP){
                $CP->update([
                    'Varvalue' => Input::get('CP')
                ]);
            }

            $RUP = DietaryIngredients::where('ref', $ref)->where('VarName', 'RUP');
            if($RUP){
                $RUP->update([
                    'Varvalue' => Input::get('RUP')
                ]);
            }

            $RDP = DietaryIngredients::where('ref', $ref)->where('VarName', 'RDP');
            if($RDP){
                $RDP->update([
                    'Varvalue' => Input::get('RDP')
                ]);
            }

            $SolN = DietaryIngredients::where('ref', $ref)->where('VarName', 'SolN');
            if($SolN){
                $SolN->update([
                    'Varvalue' => Input::get('SolN')
                ]);
            }

            $N = DietaryIngredients::where('ref', $ref)->where('VarName', 'N');
            if($N){
                $N->update([
                    'Varvalue' => Input::get('N')
                ]);
            }

            $C = DietaryIngredients::where('ref', $ref)->where('VarName', 'C');
            if($C){
                $C->update([
                    'Varvalue' => Input::get('C')
                ]);
            }

            $EE = DietaryIngredients::where('ref', $ref)->where('VarName', 'EE');
            if($EE){
                $EE->update([
                    'Varvalue' => Input::get('EE')
                ]);
            }

            $FA = DietaryIngredients::where('ref', $ref)->where('VarName', 'FA');
            if($FA){
                $FA->update([
                    'Varvalue' => Input::get('FA')
                ]);
            }

            $CFiber = DietaryIngredients::where('ref', $ref)->where('VarName', 'CFiber');
            if($CFiber){
                $CFiber->update([
                    'Varvalue' => Input::get('CFiber')
                ]);
            }

            $NDF = DietaryIngredients::where('ref', $ref)->where('VarName', 'NDF');
            if($NDF){
                $NDF->update([
                    'Varvalue' => Input::get('NDF')
                ]);
            }

            $ADF = DietaryIngredients::where('ref', $ref)->where('VarName', 'ADF');
            if($ADF){
                $ADF->update([
                    'Varvalue' => Input::get('ADF')
                ]);
            }

            $HC = DietaryIngredients::where('ref', $ref)->where('VarName', 'HC');
            if($HC){
                $HC->update([
                    'Varvalue' => Input::get('HC')
                ]);
            }

            $Cel = DietaryIngredients::where('ref', $ref)->where('VarName', 'Cel');
            if($Cel){
                $Cel->update([
                    'Varvalue' => Input::get('ADF')
                ]);
            }

            $Lignin = DietaryIngredients::where('ref', $ref)->where('VarName', 'Lignin');
            if($Lignin){
                $Lignin->update([
                    'Varvalue' => Input::get('Lignin')
                ]);
            }

            $Starch = DietaryIngredients::where('ref', $ref)->where('VarName', 'Starch');
            if($Starch){
                $Starch->update([
                    'Varvalue' => Input::get('Starch')
                ]);
            }

            $NFC = DietaryIngredients::where('ref', $ref)->where('VarName', 'NFC');
            if($NFC){
                $NFC->update([
                    'Varvalue' => Input::get('NFC')
                ]);
            }

            $SolRes = DietaryIngredients::where('ref', $ref)->where('VarName', 'SolRes');
            if($SolRes){
                $SolRes->update([
                    'Varvalue' => Input::get('SolRes')
                ]);
            }

            $NFE = DietaryIngredients::where('ref', $ref)->where('VarName', 'NFE');
            if($NFE){
                $NFE->update([
                    'Varvalue' => Input::get('NFE')
                ]);
            }

            $NDSA = DietaryIngredients::where('ref', $ref)->where('VarName', 'NDSA');
            if($NDSA){
                $NDSA->update([
                    'Varvalue' => Input::get('NDSA')
                ]);
            }

            $GE = DietaryIngredients::where('ref', $ref)->where('VarName', 'GE');
            if($GE){
                $GE->update([
                    'Varvalue' => Input::get('GE')
                ]);
            }

            $TDN = DietaryIngredients::where('ref', $ref)->where('VarName', 'TDN');
            if($TDN){
                $TDN->update([
                    'Varvalue' => Input::get('TDN')
                ]);
            }

            $DE = DietaryIngredients::where('ref', $ref)->where('VarName', 'DE');
            if($DE){
                $DE->update([
                    'Varvalue' => Input::get('DE')
                ]);
            }

            $NEm = DietaryIngredients::where('ref', $ref)->where('VarName', 'NEm');
            if($NEm){
                $NEm->update([
                    'Varvalue' => Input::get('NEm')
                ]);
            }

            $NEg = DietaryIngredients::where('ref', $ref)->where('VarName', 'NEg');
            if($NEg){
                $NEg->update([
                    'Varvalue' => Input::get('NEg')
                ]);
            }

            $NEl = DietaryIngredients::where('ref', $ref)->where('VarName', 'NEl');
            if($NEl){
                $NEl->update([
                    'Varvalue' => Input::get('NEl')
                ]);
            }

            $ADF = DietaryIngredients::where('ref', $ref)->where('VarName', 'ADF');
            if($ADF){
                $ADF->update([
                    'Varvalue' => Input::get('ADF')
                ]);
            }

            $Ash = DietaryIngredients::where('ref', $ref)->where('VarName', 'Ash');
            if($Ash){
                $Ash->update([
                    'Varvalue' => Input::get('Ash')
                ]);
            }

            $Ca = DietaryIngredients::where('ref', $ref)->where('VarName', 'Ca');
            if($Ca){
                $Ca->update([
                    'Varvalue' => Input::get('Ca')
                ]);
            }

            $P = DietaryIngredients::where('ref', $ref)->where('VarName', 'P');
            if($P){
                $P->update([
                    'Varvalue' => Input::get('P')
                ]);
            }

            $Mg = DietaryIngredients::where('ref', $ref)->where('VarName', 'Mg');
            if($Mg){
                $Mg->update([
                    'Varvalue' => Input::get('Mg')
                ]);
            }

            $K = DietaryIngredients::where('ref', $ref)->where('VarName', 'K');
            if($K){
                $K->update([
                    'Varvalue' => Input::get('K')
                ]);
            }

            $Na = DietaryIngredients::where('ref', $ref)->where('VarName', 'Na');
            if($Na){
                $Na->update([
                    'Varvalue' => Input::get('Na')
                ]);
            }

            $Cl = DietaryIngredients::where('ref', $ref)->where('VarName', 'Cl');
            if($Cl){
                $Cl->update([
                    'Varvalue' => Input::get('Cl')
                ]);
            }

            $S = DietaryIngredients::where('ref', $ref)->where('VarName', 'S');
            if($S){
                $S->update([
                    'Varvalue' => Input::get('S')
                ]);
            }

            $Lys = DietaryIngredients::where('ref', $ref)->where('VarName', 'Lys');
            if($Lys){
                $Lys->update([
                    'Varvalue' => Input::get('Lys')
                ]);
            }

            $Lys = DietaryIngredients::where('ref', $ref)->where('VarName', 'Lys');
            if($Lys){
                $Lys->update([
                    'Varvalue' => Input::get('Lys')
                ]);
            }

            $Arg = DietaryIngredients::where('ref', $ref)->where('VarName', 'Arg');
            if($Arg){
                $Arg->update([
                    'Varvalue' => Input::get('Arg')
                ]);
            }

            $His = DietaryIngredients::where('ref', $ref)->where('VarName', 'His');
            if($His){
                $His->update([
                    'Varvalue' => Input::get('His')
                ]);
            }

            $Ile = DietaryIngredients::where('ref', $ref)->where('VarName', 'Ile');
            if($Ile){
                $Ile->update([
                    'Varvalue' => Input::get('Ile')
                ]);
            }

            $Leu = DietaryIngredients::where('ref', $ref)->where('VarName', 'Leu');
            if($Leu){
                $Leu->update([
                    'Varvalue' => Input::get('Leu')
                ]);
            }

            $Met = DietaryIngredients::where('ref', $ref)->where('VarName', 'Met');
            if($Met){
                $Met->update([
                    'Varvalue' => Input::get('Met')
                ]);
            }

            $CyS = DietaryIngredients::where('ref', $ref)->where('VarName', 'CyS');
            if($CyS){
                $CyS->update([
                    'Varvalue' => Input::get('CyS')
                ]);
            }

            $Phe = DietaryIngredients::where('ref', $ref)->where('VarName', 'Phe');
            if($Phe){
                $Phe->update([
                    'Varvalue' => Input::get('Phe')
                ]);
            }

            $Tyr = DietaryIngredients::where('ref', $ref)->where('VarName', 'Tyr');
            if($Tyr){
                $Tyr->update([
                    'Varvalue' => Input::get('Tyr')
                ]);
            }

            $Thr = DietaryIngredients::where('ref', $ref)->where('VarName', 'Thr');
            if($Thr){
                $Thr->update([
                    'Varvalue' => Input::get('Thr')
                ]);
            }

            $Trp = DietaryIngredients::where('ref', $ref)->where('VarName', 'Trp');
            if($Trp){
                $Trp->update([
                    'Varvalue' => Input::get('Trp')
                ]);
            }

            $Val = DietaryIngredients::where('ref', $ref)->where('VarName', 'Val');
            if($Val){
                $Val->update([
                    'Varvalue' => Input::get('Val')
                ]);
            }

            $C120 = DietaryIngredients::where('ref', $ref)->where('VarName', 'C12:0');
            if($C120){
                $C120->update([
                    'Varvalue' => Input::get('C12:0')
                ]);
            }

            $C140 = DietaryIngredients::where('ref', $ref)->where('VarName', 'C14:0');
            if($C140){
                $C140->update([
                    'Varvalue' => Input::get('C14:0')
                ]);
            }

            $C160 = DietaryIngredients::where('ref', $ref)->where('VarName', 'C16:0');
            if($C160){
                $C160->update([
                    'Varvalue' => Input::get('C16:0')
                ]);
            }

            $C161 = DietaryIngredients::where('ref', $ref)->where('VarName', 'C16:1');
            if($C161){
                $C161->update([
                    'Varvalue' => Input::get('C16:1')
                ]);
            }

            $C180 = DietaryIngredients::where('ref', $ref)->where('VarName', 'C18:0');
            if($C180){
                $C180->update([
                    'Varvalue' => Input::get('C18:0')
                ]);
            }

            $C18ltrans = DietaryIngredients::where('ref', $ref)->where('VarName', 'C18:ltrans');
            if($C18ltrans){
                $C18ltrans->update([
                    'Varvalue' => Input::get('C18:ltrans')
                ]);
            }

            $C18lcis = DietaryIngredients::where('ref', $ref)->where('VarName', 'C18:lcis');
            if($C18lcis){
                $C18lcis->update([
                    'Varvalue' => Input::get('C18:lcis')
                ]);
            }

            $C182c = DietaryIngredients::where('ref', $ref)->where('VarName', 'C18:2c');
            if($C182c){
                $C182c->update([
                    'Varvalue' => Input::get('C18:2c')
                ]);
            }

            $C183 = DietaryIngredients::where('ref', $ref)->where('VarName', 'C183');
            if($C183){
                $C183->update([
                    'Varvalue' => Input::get('C183')
                ]);
            }

            $C200 = DietaryIngredients::where('ref', $ref)->where('VarName', 'C20:0');
            if($C200){
                $C200->update([
                    'Varvalue' => Input::get('C20:0')
                ]);
            }

            $OthersFA = DietaryIngredients::where('ref', $ref)->where('VarName', 'OthersFA');
            if($OthersFA){
                $OthersFA->update([
                    'Varvalue' => Input::get('OthersFA')
                ]);
            }
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
