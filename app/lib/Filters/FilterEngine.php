<?php
namespace App\lib\Filters;

use App\DietaryIngredients;
use App\DietaryNutrients;
use App\InVitroData;
use App\PerformanceData;
use App\StudyDescriptor;
use App\Subject;

class FilterEngine
{

    public static function filterStudyDescriptors($request)
    {
        $stdys = StudyDescriptor::where(function ($q) use ($request){
            if($request->dataset != null) {
                $q->where('DataSet', $request->dataset);
            }
            if ($request->pubid != null) {
                $q->where('PubID', $request->pubid);
            }
            if($request->dataset_all != null) {
                $q->where('DataSet', $request->dataset_all);
            }
            if ($request->pubid_all != null) {
                $q->where('PubID', $request->pubid_all);
            }
        })->get();

        return $stdys;

    }

    public static function filterDietaryIngredients($request)
    {

        $ingredients = DietaryIngredients::where(function ($q) use ($request){
            if($request->dataset_ingredient != null) {
                $q->where('DataSet', $request->dataset_ingredient);
            }
            if ($request->pubid_ingredient != null) {
                $q->where('PubID', $request->pubid_ingredient);
            }
            if($request->dataset_all != null) {
                $q->where('DataSet', $request->dataset_all);
            }
            if ($request->pubid_all != null) {
                $q->where('PubID', $request->pubid_all);
            }
        })->get();

        return $ingredients;
    }

    public static function filterDietaryNutrients($request)
    {
        $nutrients = DietaryNutrients::where(function ($q) use ($request){
            if($request->dataset_nutrient != null) {
                $q->where('DataSet', $request->dataset_nutrient);
            }
            if ($request->pubid_nutrient != null) {
                $q->where('PubID', $request->pubid_nutrient);
            }
            if($request->dataset_all != null) {
                $q->where('DataSet', $request->dataset_all);
            }
            if ($request->pubid_all != null) {
                $q->where('PubID', $request->pubid_all);
            }
        })->get();

        return $nutrients;
    }

    public static function filterSubjects($request)
    {
        $subjects = Subject::where(function ($q) use ($request){
            if($request->dataset_subject != null) {
                $q->where('DataSet', $request->dataset_subject);
            }
            if ($request->pubid_subject != null) {
                $q->where('PubID', $request->pubid_subject);
            }
            if($request->dataset_all != null) {
                $q->where('DataSet', $request->dataset_all);
            }
            if ($request->pubid_all != null) {
                $q->where('PubID', $request->pubid_all);
            }
        })->get();

        return $subjects;
    }

    public static function filterPerformances($request)
    {
        $performances = PerformanceData::where(function ($q) use ($request){
            if($request->dataset_performance != null) {
                $q->where('DataSet', $request->dataset_performance);
            }
            if ($request->pubid_performance != null) {
                $q->where('PubID', $request->pubid_performance);
            }
            if($request->dataset_all != null) {
                $q->where('DataSet', $request->dataset_all);
            }
            if ($request->pubid_all != null) {
                $q->where('PubID', $request->pubid_all);
            }
        })->get();

        return $performances;
    }

    public static function filterInvitros($request)
    {
        $invitros = InVitroData::where(function ($q) use ($request){
            if($request->dataset_invitro != null) {
                $q->where('DataSet', $request->dataset_invitro);
            }
            if ($request->pubid_invitro != null) {
                $q->where('PubID', $request->pubid_invitro);
            }
            if($request->dataset_all != null) {
                $q->where('DataSet', $request->dataset_all);
            }
            if ($request->pubid_all != null) {
                $q->where('PubID', $request->pubid_all);
            }
        })->get();

        return $invitros;
    }

    public static function filterPerformancesByVarName($request)
    {
        $performances = PerformanceData::where(function ($q) use ($request){
            if($request->dataset_performance != null) {
                $q->where('DataSet', $request->dataset_performance);
            }
            if ($request->pubid_performance != null) {
                $q->where('PubID', $request->pubid_performance);
            }
            if($request->dataset_all != null) {
                $q->where('DataSet', $request->dataset_all);
            }
            if ($request->pubid_all != null) {
                $q->where('PubID', $request->pubid_all);
            }
            if ($request->variable_name != null) {
                $q->where('VarName', $request->variable_name);
                $q->where('VarValue', '!=', '');
            }
        })->get();

        return $performances;
    }

    public static function returnDataSets($request)
    {
        if(!empty($request->all())) {
            $start_date = '';
            if ($request->start_date) {
                $start_date = $request->start_date;
            }
            $end_date = '';
            if ($request->end_date) {
                $end_date = $request->end_date;
            }

            $pubids_study = StudyDescriptor::whereBetween('VarValue', [$start_date, $end_date])->distinct()->pluck('PubID')->toArray();
            $datasets_study = StudyDescriptor::whereIn('PubID', $pubids_study)->distinct()->pluck('DataSet')->toArray();
            $datasets_ingredients = DietaryIngredients::whereIn('PubID', $pubids_study)->distinct()->pluck('DataSet')->toArray();
            $datasets_nutrients = DietaryNutrients::whereIn('PubID', $pubids_study)->distinct()->pluck('DataSet')->toArray();
            $datasets_subjects = Subject::whereIn('PubID', $pubids_study)->distinct()->pluck('DataSet')->toArray();
            $datasets_performances = PerformanceData::whereIn('PubID', $pubids_study)->distinct()->pluck('DataSet')->toArray();
            $datasets_invitros = InVitroData::whereIn('PubID', $pubids_study)->distinct()->pluck('DataSet')->toArray();

            $datasets_all = array_unique(array_merge($datasets_study, $datasets_ingredients, $datasets_nutrients, $datasets_subjects, $datasets_performances, $datasets_invitros));
            return $datasets_all;

        }

        $datasets_study = StudyDescriptor::distinct()->pluck('DataSet')->toArray();
        $datasets_ingredients = DietaryIngredients::distinct()->pluck('DataSet')->toArray();
        $datasets_nutrients = DietaryNutrients::distinct()->pluck('DataSet')->toArray();
        $datasets_subjects = Subject::distinct()->pluck('DataSet')->toArray();
        $datasets_performances = PerformanceData::distinct()->pluck('DataSet')->toArray();
        $datasets_invitros = InVitroData::distinct()->pluck('DataSet')->toArray();

        $datasets_all = array_unique(array_merge($datasets_study, $datasets_ingredients, $datasets_nutrients, $datasets_subjects, $datasets_performances, $datasets_invitros));

        return $datasets_all;

    }

    public static function returnPubIds($request)
    {
        if(!empty($request->all())) {
            $start_date = '';
            if ($request->start_date) {
                $start_date = $request->start_date;
            }
            $end_date = '';
            if ($request->end_date) {
                $end_date = $request->end_date;
            }

            if($start_date != '' && $end_date != ''){
                $pubids_study = StudyDescriptor::whereBetween('VarValue', [$start_date, $end_date])->distinct()->pluck('PubID')->toArray();
            } else {
                $pubids_study = StudyDescriptor::distinct()->pluck('PubID')->toArray();

            }
            $pubids_studies = StudyDescriptor::whereIn('PubID', $pubids_study)->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
            $pubids_ingredients = DietaryIngredients::whereIn('PubID', $pubids_study)->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
            $pubids_nutrients = DietaryNutrients::whereIn('PubID', $pubids_study)->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
            $pubids_subjects = Subject::whereIn('PubID', $pubids_study)->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
            $pubids_performances = PerformanceData::whereIn('PubID', $pubids_study)->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
            $pubids_invitros = InVitroData::whereIn('PubID', $pubids_study)->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();

            $pubids_all = array_unique(array_merge($pubids_studies, $pubids_ingredients, $pubids_nutrients, $pubids_subjects, $pubids_performances, $pubids_invitros));
            return $pubids_all;
        }

        $pubids_study = StudyDescriptor::distinct()->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
        $pubids_ingredients = DietaryIngredients::distinct()->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
        $pubids_nutrients = DietaryNutrients::distinct()->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
        $pubids_subjects = Subject::distinct()->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
        $pubids_performances = PerformanceData::distinct()->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
        $pubids_invitros = InVitroData::distinct()->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();

        $pubids_all = array_unique(array_merge($pubids_study, $pubids_ingredients, $pubids_nutrients, $pubids_subjects, $pubids_performances, $pubids_invitros));

        return $pubids_all;

    }

    public static function filterPerformancesByAdvanced($request)
    {
        $performances = PerformanceData::where(function ($q) use ($request){
            if($request->variable_name != null) {
                $q->where('VarName', $request->variable_name)->where('VarValue', $request->operator, (int)$request->compare_value);
            }
            if($request->variable_name_2 != null) {
                $q->orWhere('VarName', $request->variable_name_2)->where('VarValue', $request->operator_2, (int)$request->compare_value_2);
            }
            if($request->variable_name_3 != null) {
                $q->orWhere('VarName', $request->variable_name_3)->where('VarValue', $request->operator_3, (int)$request->compare_value_3);
            }
        })->get();


        return $performances;
    }

    public static function filterPerformancesByAdvancedPubIDs($request)
    {
        $performance_pubids_all = PerformanceData::where(function ($q) use ($request){
            if($request->variable_name != null) {
                $q->where('VarName', $request->variable_name)->where('VarValue', $request->operator, (int)$request->compare_value);
            }
            if($request->variable_name_2 != null) {
                $q->orWhere('VarName', $request->variable_name_2)->where('VarValue', $request->operator_2, (int)$request->compare_value_2);
            }
            if($request->variable_name_3 != null) {
                $q->orWhere('VarName', $request->variable_name_3)->where('VarValue', $request->operator_3, (int)$request->compare_value_3);
            }
        })->distinct()->pluck('PubID')->toArray();
        return $performance_pubids_all;
    }
}