<?php

namespace App\Http\Controllers;

use App\DietaryIngredients;
use App\DietaryNutrients;
use App\InVitroData;
use App\lib\Filters\FilterEngine;
use App\PerformanceData;
use App\StudyDescriptor;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use PHPUnit\Util\Filter;
use Spatie\DbDumper\Databases\MySql;

class PagesController extends Controller
{
    public function filters(Request $request)
    {
        $stdys = StudyDescriptor::all();
        $ingredients = DietaryIngredients::all();
        $nutrients = DietaryNutrients::all();
        $subjects = Subject::all();
        $performances = PerformanceData::all();

        $datasets_study = StudyDescriptor::distinct()->pluck('DataSet')->toArray();
        $pubids_study = StudyDescriptor::distinct()->pluck('PubID')->toArray();
        $trialids_study = StudyDescriptor::distinct()->pluck('TrialID')->toArray();

        $datasets_ingredients = DietaryIngredients::distinct()->pluck('DataSet')->toArray();
        $pubids_ingredients = DietaryIngredients::distinct()->pluck('PubID')->toArray();
        $trialids_ingredients = DietaryIngredients::distinct()->pluck('TrialID')->toArray();
        $trtids_ingredients = DietaryIngredients::distinct()->pluck('TrtID')->toArray();
        $ifn_ingredients = DietaryIngredients::distinct()->pluck('IFN')->toArray();

        $datasets_nutrients = DietaryNutrients::distinct()->pluck('DataSet')->toArray();
        $pubids_nutrients = DietaryNutrients::distinct()->pluck('PubID')->toArray();
        $trialids_nutrients = DietaryNutrients::distinct()->pluck('TrialID')->toArray();
        $trtids_nutrients = DietaryNutrients::distinct()->pluck('TrtID')->toArray();
        $subjectid_nutrients = DietaryNutrients::distinct()->pluck('SubjectID')->toArray();

        $datasets_subjects = Subject::distinct()->pluck('DataSet')->toArray();
        $pubids_subjects = Subject::distinct()->pluck('PubID')->toArray();
        $trialids_subjects = Subject::distinct()->pluck('TrialID')->toArray();
        $trtids_subjects = Subject::distinct()->pluck('TrtID')->toArray();
        $subjectid_subjects = Subject::distinct()->pluck('SubjectID')->toArray();

        $datasets_performances = PerformanceData::distinct()->pluck('DataSet')->toArray();
        $pubids_performances = PerformanceData::distinct()->pluck('PubID')->toArray();
        $trialids_performances = PerformanceData::distinct()->pluck('TrialID')->toArray();
        $trtids_performances = PerformanceData::distinct()->pluck('TrtID')->toArray();
        $subjectid_performances = PerformanceData::distinct()->pluck('SubjectID')->toArray();

        $datasets_all = array_unique(array_merge($datasets_study, $datasets_ingredients, $datasets_nutrients));
        $pubids_all = array_unique(array_merge($pubids_study, $pubids_ingredients, $pubids_nutrients));
        $trialids_all = array_unique(array_merge($trialids_study, $trialids_ingredients, $trialids_nutrients));


        $dataset_all = '';
        if($request->dataset_all){
            $dataset_all = $request->dataset_all;
        }
        $pubid_all = '';
        if($request->pubid_all){
            $pubid_all = $request->pubid_all;
        }
        $trialid_all = '';
        if($request->trialid_all){
            $trialid_all = $request->trialid_all;
        }

        $dataset = '';
        if($request->dataset){
           $dataset = $request->dataset;
        }
        $pubid = '';
        if($request->pubid){
            $pubid = $request->pubid;
        }
        $trialid = '';
        if($request->trialid){
            $trialid = $request->trialid;
        }

        $dataset_ingredient = '';
        if($request->dataset_ingredient){
            $dataset_ingredient = $request->dataset_ingredient;
        }
        $pubid_ingredient = '';
        if($request->pubid_ingredient){
            $pubid_ingredient = $request->pubid_ingredient;
        }
        $trialid_ingredient = '';
        if($request->trialid_ingredient){
            $trialid_ingredient = $request->trialid_ingredient;
        }
        $trtid_ingredient = '';
        if($request->trtid_ingredient){
            $trtid_ingredient = $request->trtid_ingredient;
        }
        $ifn_ingredient = '';
        if($request->ifn_ingredient){
            $ifn_ingredient = $request->ifn_ingredient;
        }

        $dataset_nutrient = '';
        if($request->dataset_nutrient){
            $dataset_nutrient = $request->dataset_nutrient;
        }
        $pubid_nutrient = '';
        if($request->pubid_nutrient){
            $pubid_nutrient = $request->pubid_nutrient;
        }
        $trialid_nutrient = '';
        if($request->trialid_nutrient){
            $trialid_nutrient = $request->trialid_nutrient;
        }
        $trtid_nutrient = '';
        if($request->trtid_nutrient){
            $trtid_nutrient = $request->trtid_nutrient;
        }
        $subjectid_nutrient = '';
        if($request->subjectid_nutrient){
            $subjectid_nutrient = $request->subjectid_nutrient;
        }

        $dataset_subject = '';
        if($request->dataset_subject){
            $dataset_subject = $request->dataset_subject;
        }
        $pubid_subject = '';
        if($request->pubid_subject){
            $pubid_subject = $request->pubid_subject;
        }
        $trialid_subject = '';
        if($request->trialid_subject){
            $trialid_subject = $request->trialid_subject;
        }
        $trtid_subject = '';
        if($request->trtid_subject){
            $trtid_subject = $request->trtid_subject;
        }
        $subjectid_subject = '';
        if($request->subjectid_subject){
            $subjectid_subject = $request->subjectid_subject;
        }

        $dataset_performance = '';
        if($request->dataset_performance){
            $dataset_performance = $request->dataset_performance;
        }
        $pubid_performance = '';
        if($request->pubid_performance){
            $pubid_performance = $request->pubid_performance;
        }
        $trialid_performance = '';
        if($request->trialid_performance){
            $trialid_performance = $request->trialid_performance;
        }
        $trtid_performance = '';
        if($request->trtid_performance){
            $trtid_performance = $request->trtid_performance;
        }
        $subjectid_performance = '';
        if($request->subjectid_performance){
            $subjectid_performance = $request->subjectid_performance;
        }

        if($dataset != '' || $pubid != '' || $trialid != '') {
            $stdys = FilterEngine::filterStudyDescriptors($request);
        }

        if($dataset_ingredient != '' || $pubid_ingredient != '' || $trialid_ingredient != '' || $trtid_ingredient != '' || $ifn_ingredient != ''){
            $ingredients = FilterEngine::filterDietaryIngredients($request);
        }

        if($dataset_nutrient != '' || $pubid_nutrient != '' || $trialid_nutrient != '' || $trtid_nutrient != '' || $subjectid_nutrient != ''){
            $nutrients = FilterEngine::filterDietaryNutrients($request);
        }

        if($dataset_subject != '' || $pubid_subject != '' || $trialid_subject != '' || $trtid_subject != '' || $subjectid_subject != ''){
            $subjects = FilterEngine::filterSubjects($request);
        }

        if($dataset_performance != '' || $pubid_performance != '' || $trialid_performance != '' || $trtid_performance != '' || $subjectid_performance != ''){
            $performances = FilterEngine::filterPerformances($request);
        }

        if($dataset_all != '' || $pubid_all != '' || $trialid_all != ''){
            $stdys = FilterEngine::filterStudyDescriptors($request);
            $ingredients = FilterEngine::filterDietaryIngredients($request);
            $nutrients = FilterEngine::filterDietaryNutrients($request);
            $subjects = FilterEngine::filterSubjects($request);
            $performances = FilterEngine::filterPerformances($request);
        }

        return view('pages.filters', compact(
            'stdys', 'ingredients',
            'nutrients',
            'subjects',
            'performances',
            'datasets_study',
            'pubids_study',
            'trialids_study',
            'dataset',
            'pubid',
            'trialid',
            'datasets_all',
            'pubids_all',
            'trialids_all',
            'dataset_all',
            'pubid_all',
            'trialid_all',
            'dataset_ingredient',
            'pubid_ingredient',
            'trialid_ingredient',
            'trtid_ingredient',
            'ifn_ingredient',
            'dataset_nutrient',
            'pubid_nutrient',
            'trialid_nutrient',
            'trtid_ingredient',
            'subjectid_nutrient',
            'dataset_subject',
            'pubid_subject',
            'trialid_subject',
            'trtid_subject',
            'subjectid_subject',
            'dataset_performance',
            'pubid_performance',
            'trialid_performance',
            'trtid_performance',
            'subjectid_performance',
            'datasets_ingredients',
            'pubids_ingredients',
            'trialids_ingredients',
            'trtids_ingredients',
            'ifn_ingredients',
            'datasets_nutrients',
            'pubids_nutrients',
            'trialids_nutrients',
            'trtids_nutrients',
            'subjectid_nutrients',
            'datasets_subjects',
            'pubids_subjects',
            'trialids_subjects',
            'trtids_subjects',
            'subjectid_subjects',
            'datasets_performances',
            'pubids_performances',
            'trialids_performances',
            'trtids_performances',
            'subjectid_performances'
        ));
    }

    public function downloadStudys()
    {
        $table = StudyDescriptor::all();
        $filename = "studydescriptors.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'VarName', 'VarValue', 'VarUnits'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['VarName'],
                $row['VarValue'], $row['VarUnits']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename);
    }

    public function downloadFilteredStudies(Request $request)
    {
        $table = FilterEngine::filterStudyDescriptors($request);
        $filename = "studydescriptors.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'VarName', 'VarValue', 'VarUnits'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['VarName'],
                $row['VarValue'], $row['VarUnits']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename);
    }

    public function downloadIngredients()
    {
        $table = DietaryIngredients::all();
        $filename = "dietaryingredients.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'IFN', 'VarName', 'Varvalue', 'VarUnits', 'N', 'SE', 'SD'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['IFN'], $row['VarName'], $row['Varvalue'], $row['VarUnits'],
                $row['N'], $row['SE'], $row['SD']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename);
    }

    public function downloadFilteredIngredients(Request $request)
    {
        $table = FilterEngine::filterDietaryIngredients($request);
        $filename = "dietaryingredients.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'IFN', 'VarName', 'Varvalue', 'VarUnits', 'N', 'SE', 'SD'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['IFN'], $row['VarName'], $row['Varvalue'], $row['VarUnits'],
                $row['N'], $row['SE'], $row['SD']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename);
    }


    public function downloadNutrients()
    {
        $table = DietaryNutrients::all();
        $filename = "dietarynutrients.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'VarName', 'Varvalue', 'VarUnits', 'N', 'SE', 'SD'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['VarName'], $row['Varvalue'], $row['VarUnits'],
                $row['N'], $row['SE'], $row['SD']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename);
    }

    public function downloadFilteredNutrients(Request $request)
    {
        $table = FilterEngine::filterDietaryNutrients($request);
        $filename = "dietarynutrients.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'VarName', 'Varvalue', 'VarUnits', 'N', 'SE', 'SD'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['VarName'], $row['Varvalue'], $row['VarUnits'],
                $row['N'], $row['SE'], $row['SD']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename);
    }

    public function downloadSubjects()
    {
        $table = Subject::all();
        $filename = "subjects.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'VarName', 'Varvalue', 'VarUnits', 'N', 'SE', 'SD'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['VarName'], $row['Varvalue'], $row['VarUnits'],
                $row['N'], $row['SE'], $row['SD']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename);
    }

    public function downloadFilteredSubjects(Request $request)
    {
        $table = FilterEngine::filterSubjects($request);
        $filename = "subjects.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'VarName', 'Varvalue', 'VarUnits', 'N', 'SE', 'SD'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['VarName'], $row['Varvalue'], $row['VarUnits'],
                $row['N'], $row['SE'], $row['SD']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename);
    }

    public function downloadPerformances()
    {
        $table = PerformanceData::all();
        $filename = "performances.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'VarName', 'Varvalue', 'VarUnits', 'N', 'SE', 'SD'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['VarName'], $row['Varvalue'], $row['VarUnits'],
                $row['N'], $row['SE'], $row['SD']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename);
    }

    public function downloadFilteredPerformances(Request $request)
    {
        $table = FilterEngine::filterPerformances($request);
        $filename = "performances.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'VarName', 'Varvalue', 'VarUnits', 'N', 'SE', 'SD'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['VarName'], $row['Varvalue'], $row['VarUnits'],
                $row['N'], $row['SE'], $row['SD']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename);
    }

    public function downloadInvitro()
    {
        $table = InVitroData::all();
        $filename = "invitrodata.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'PlateID', 'WellID', 'SubTrtID',
            'Site_sample', 'Cell_Type', 'Day_Sample', 'Time_Sample', 'VarName', 'VarValue', 'VarUnits', 'N', 'SE', 'SD', 'VarType'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['PlateID'], $row['WellID'], $row['SubTrtID'],
                $row['Site_sample'], $row['Cell_Type'], $row['Day_Sample'], $row['Time_Sample'],
                $row['VarName'], $row['VarValue'], $row['VarUnits'],
                $row['N'], $row['SE'], $row['SD'], $row['VarType']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename);
    }

    public function downloadFilteredInvitro(Request $request)
    {
        $table = FilterEngine::filterInvitros($request);
        $filename = "invitrodata.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'PlateID', 'WellID', 'SubTrtID',
            'Site_sample', 'Cell_Type', 'Day_Sample', 'Time_Sample', 'VarName', 'VarValue', 'VarUnits', 'N', 'SE', 'SD', 'VarType'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['PlateID'], $row['WellID'], $row['SubTrtID'],
                $row['Site_sample'], $row['Cell_Type'], $row['Day_Sample'], $row['Time_Sample'],
                $row['VarName'], $row['VarValue'], $row['VarUnits'],
                $row['N'], $row['SE'], $row['SD'], $row['VarType']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename);
    }

    public function downloadDatabase()
    {

        $filename = 'fulldownload' . '_' . date("Y-m-d") . '.sql';
        MySql::create()
            ->setDbName('ModelingTemplate')
            ->setUserName('homestead')
            ->setPassword('secret')
            ->dumpToFile($filename);

        return Response::download($filename);
    }

    public function testJoin(Request $request)
    {

        $table = Subject::all();        $filename = "test.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'VarName', 'Varvalue', 'VarUnits', 'N', 'SE', 'SD'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['VarName'], $row['Varvalue'], $row['VarUnits'],
                $row['N'], $row['SE'], $row['SD']
            ));
        }

        $second_table = DietaryIngredients::all();
        foreach($second_table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['VarName'], $row['Varvalue'], $row['VarUnits'],
                $row['N'], $row['SE'], $row['SD']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename);
    }
}
