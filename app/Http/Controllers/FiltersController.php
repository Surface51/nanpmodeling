<?php

namespace App\Http\Controllers;

use App\Abbreviation;
use App\DietaryIngredients;
use App\DietaryNutrients;
use App\GenomeTranscript;
use App\Infusion;
use App\InVitroData;
use App\lib\Filters\FilterEngine;
use App\PerformanceData;
use App\StudyDescriptor;
use App\Subject;
use Illuminate\Http\Request;

class FiltersController extends Controller
{
    public function filterAll(Request $request)
    {
        $abbreviations = Abbreviation::all();
        $stdys = StudyDescriptor::all()->take(25);
        $ingredients = DietaryIngredients::all()->take(25);
        $nutrients = DietaryNutrients::all()->take(25);
        $subjects = Subject::all()->take(25);
        $performances = PerformanceData::limit(25)->get();
        $infusions = Infusion::all()->take(25);
        $invitros = InVitroData::all()->take(25);
        $genomes = GenomeTranscript::all()->take(25);

        $datasets_all = FilterEngine::returnDataSets($request);
        $pubids_all = FilterEngine::returnPubIds($request);
        $performance_pubids_all = FilterEngine::returnPubIds($request);
        $variable_names = Abbreviation::distinct()->pluck('abbreviation')->toArray();


        $dataset_all = '';
        if($request->dataset_all){
            $dataset_all = $request->dataset_all;
        }
        $pubid_all = '';
        if($request->pubid_all){
            $pubid_all = StudyDescriptor::where('PubID', $request->pubid_all)->where('VarName', 'Reference')->distinct()->pluck('VarValue');
            $pubid_all = $pubid_all[0];
        }
        $start_date = '';
        if($request->start_date){
            $start_date = $request->start_date;
        }
        $end_date = '';
        if($request->end_date){
            $end_date = $request->end_date;
        }
        $variable_name = '';
        if($request->variable_name){
            $variable_name = $request->variable_name;
        }

        if($start_date != '' || $end_date != '') {
            $datasets_all = FilterEngine::returnDataSets($request);
            $pubids_all = FilterEngine::returnPubIds($request);;

        }

        $stdys = FilterEngine::filterStudyDescriptorsByDateRange($pubids_all, $request);

        if($start_date != '' || $end_date != '' && $pubid_all == '' && $dataset_all == '') {
            $stdys = StudyDescriptor::whereIn('PubID', $pubids_all)->limit(25)->get();
            $ingredients = DietaryNutrients::whereIn('PubID', $pubids_all)->limit(25)->get();
            $nutrients = DietaryNutrients::whereIn('PubID', $pubids_all)->limit(25)->get();
            $subjects = Subject::whereIn('PubID', $pubids_all)->limit(25)->get();
            $performances = PerformanceData::whereIn('PubID', $pubids_all)->limit(25)->get();
            $infusions = Infusion::whereIn('PubID', $pubids_all)->limit(25)->get();
            $invitros = InVitroData::whereIn('PubID', $pubids_all)->limit(25)->get();
            $genomes = GenomeTranscript::whereIn('PubID', $pubids_all)->limit(25)->get();

        }

        if($dataset_all != '' || $pubid_all != ''){
            $stdys = FilterEngine::filterStudyDescriptors($request);
            $ingredients = FilterEngine::filterDietaryIngredients($request);
            $nutrients = FilterEngine::filterDietaryNutrients($request);
            $subjects = FilterEngine::filterSubjects($request);
            $performances = FilterEngine::filterPerformances($request);
            $infusions = FilterEngine::filterInfusions($request);
            $invitros = FilterEngine::filterInvitros($request);
            $genomes = FilterEngine::filterGenomes($request);
        }

        if($variable_name != '')
        {
            $performances = $this->filterVariablesAll($request);
            $infusions = $this->filterVariablesAll($request);
            $invitros = FilterEngine::filterInvitros($request);
            $genomes = FilterEngine::filterGenomes($request);
        }

        return view('pages.search', compact(
            'stdys', 'ingredients',
            'nutrients',
            'subjects',
            'performances',
            'infusions',
            'invitros',
            'genomes',
            'dataset',
            'pubid',
            'datasets_all',
            'pubids_all',
            'dataset_all',
            'pubid_all',
            'start_date',
            'end_date',
            'variable_name',
            'variable_names',
            'performance_pubids_all',
            'abbreviations'
        ));
    }

    public function filterVariablesAll(Request $request)
    {
        $abbreviations = Abbreviation::all();
        $stdys = StudyDescriptor::all()->take(25);
        $ingredients = DietaryIngredients::all()->take(25);
        $nutrients = DietaryNutrients::all()->take(25);
        $subjects = Subject::all()->take(25);
        $performances = PerformanceData::limit(25)->get();
        $infusions  = Infusion::all()->take(25);
        $invitros = InVitroData::all()->take(25);
        $genomes = GenomeTranscript::all()->take(25);

        $datasets_all = FilterEngine::returnDataSets($request);
        $pubids_all = FilterEngine::returnPubIds($request);
        $variable_names = Abbreviation::distinct()->pluck('abbreviation')->toArray();

        $dataset_all = '';
        if($request->dataset_all){
            $dataset_all = $request->dataset_all;
        }

        if($request->pubid_all != ''){
            $pubid_all_returned = FilterEngine::returnPubIds($request);
            reset($pubid_all_returned);
            $pubid_all = key($pubid_all_returned);
        } else {
            $pubid_all = '';
        }

        $start_date = '';
        if($request->start_date){
            $start_date = $request->start_date;
        }
        $end_date = '';
        if($request->end_date){
            $end_date = $request->end_date;
        }
        $variable_name = '';
        if($request->variable_name){
            $variable_name = $request->variable_name;
        }
        $variable = '';
        if($request->variable_name) {
            $variable = $request->variable_name;
        }
        $variable_name_2 = '';
        if($request->variable_name_2) {
            $variable_name_2 = $request->variable_name_2;
        }
        $variable_name_3 = '';
        if($request->variable_name_3) {
            $variable_name_3 = $request->variable_name_3;
        }
        $operator = '';
        if($request->operator) {
            $operator = $request->operator;
        }
        $operator_2 = '';
        if($request->operator_2) {
            $operator_2 = $request->operator_2;
        }
        $operator_3 = '';
        if($request->operator_3) {
            $operator_3 = $request->operator_3;
        }
        $compare_value = '';
        if($request->compare_value) {
            $compare_value = $request->compare_value;
        }
        $compare_value_2 = '';
        if($request->compare_value_2) {
            $compare_value_2 = $request->compare_value_2;
        }
        $compare_value_3 = '';
        if($request->compare_value_3) {
            $compare_value_3 = $request->compare_value_3;
        }
        $performance_pubid_all = '';
        if($request->performance_pubid_all){
            $performance_pubid_all = $request->performance_pubid_all;
        }

        if($start_date != '' || $end_date != '') {
            $datasets_all = FilterEngine::returnDataSets($request);
            $pubids_all = FilterEngine::returnPubIds($request);
        }

        $stdys = FilterEngine::filterStudyDescriptorsByDateRange($pubids_all, $request);

        if($start_date != '' || $end_date != '' && $pubid_all == '' && $dataset_all == '') {
//            $stdys = FilterEngine::filterStudyDescriptors($request);
            $stdys = FilterEngine::filterStudyDescriptorsByDateRange($pubids_all, $request);
            $ingredients = DietaryNutrients::whereIn('PubID', $pubids_all)->get();
            $nutrients = DietaryNutrients::whereIn('PubID', $pubids_all)->get();
            $subjects = Subject::whereIn('PubID', $pubids_all)->get();
            $invitros = InVitroData::whereIn('PubID', $pubids_all)->get();
            $infusions = Infusion::whereIn('PubID', $pubids_all)->limit(10)->get();
            $genomes = GenomeTranscript::whereIn('PubID', $pubids_all)->get();
        }


        if($dataset_all != '' || $pubid_all != ''){
            $stdys = FilterEngine::filterStudyDescriptors($request);
            $ingredients = FilterEngine::filterDietaryIngredients($request);
            $nutrients = FilterEngine::filterDietaryNutrients($request);
            $subjects = FilterEngine::filterSubjects($request);
            $invitros = FilterEngine::filterInvitros($request);
            $infusions = FilterEngine::filterInfusions($request);
            $performances = FilterEngine::filterPerformances($request);
            $genomes = FilterEngine::filterGenomes($request);
        }

        $performance_pubids_all = FilterEngine::returnPubIds($request);
        if($request->variable_name != null || $request->variable_name_2 != null || $request->variable_name_3) {
            $performances = FilterEngine::filterPerformancesByAdvanced($request);
            $performance_pubids_all = FilterEngine::filterPerformancesByAdvancedPubIDs($request);
            $stdys = FilterEngine::filterStudyDescriptors($request);
            $ingredients = FilterEngine::filterIngredientsByAdvanced($request);
            $nutrients = FilterEngine::filterNutrientsByAdvanced($request);
            $genomes = FilterEngine::filterGenomesByAdvanced($request);
            $invitros = FilterEngine::filterInvitroByAdvanced($request);
            $infusions = FilterEngine::filterInfusionsByAdvanced($request);
            $subjects = FilterEngine::filterSubjectsByAdvanced($request);
        }


        return view('pages.search', compact(
            'stdys', 'ingredients',
            'nutrients',
            'subjects',
            'performances',
            'infusions',
            'invitros',
            'genomes',
            'dataset',
            'pubid',
            'datasets_all',
            'pubids_all',
            'dataset_all',
            'pubid_all',
            'start_date',
            'end_date',
            'variable_name',
            'operator',
            'compare_value',
            'variable_name_2',
            'operator_2',
            'compare_value_2',
            'variable_name_3',
            'operator_3',
            'compare_value_3',
            'variable_names',
            'performance_pubids_all',
            'performance_pubid_all',
            'abbreviations'
        ));
    }
}
