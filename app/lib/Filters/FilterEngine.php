<?php
namespace App\lib\Filters;

use App\DietaryIngredients;
use App\DietaryNutrients;
use App\GenomeTranscript;
use App\Infusion;
use App\InVitroData;
use App\PerformanceData;
use App\StudyDescriptor;
use App\Subject;

class FilterEngine
{

    /**
     * @param $request
     * @return mixed
     * Filter Study Descriptors - Limit results to display only 10
     */
//    public static function filterStudyDescriptors($request)
//    {
//        $stdys = StudyDescriptor::where(function ($q) use ($request){
//            if($request->dataset != null) {
//                $q->where('DataSet', $request->dataset);
//            }
//            if ($request->pubid != null) {
//                $q->where('PubID', $request->pubid);
//            }
//            if($request->dataset_all != null) {
//                $q->where('DataSet', $request->dataset_all);
//            }
//            if ($request->pubid_all != null) {
//                $q->where('PubID', $request->pubid_all);
//            }
//        })->limit(10)->get();
//
//        return $stdys;
//
//    }

    public static function filterStudyDescriptors($request) {
        $stdys = StudyDescriptor::where(function ($q) use ($request) {
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

    /**
     * @param $request
     * @return mixed
     * Filtered Study Descriptors for download as CSV return all Results that meet the filtered criteria
     */
    public static function filterToDownloadStudyDescriptors($request)
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

    /**
     * @param $request
     * @return mixed
     * Filtering Dietary Ingredients Table - limit only 10 results to display
     */
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
        })->limit(20)->get();

        return $ingredients;
    }

    /**
     * @param $request
     * @return mixed
     * Filter Dietary Ingredients to Download return all results that meet filter criteria
     */
    public static function filterToDownloadDietaryIngredients($request)
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

    /**
     * @param $request
     * @return mixed
     * Filter Dietary Nutrients - limit results to 10 for display
     */
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
        })->limit(20)->get();

        return $nutrients;
    }

    /**
     * @param $request
     * @return mixed
     * Filter Dietary Nutrients for download - return all results that meet criteria
     */
    public static function filterToDownloadDietaryNutrients($request)
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

    /**
     * @param $request
     * @return mixed
     * Filter Subjects - limit results to 10 for display
     */
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
        })->limit(20)->get();

        return $subjects;
    }

    /**
     * @param $request
     * @return mixed
     * Filter Subjects for Download return all results that meet filter criteria
     */
    public static function filterToDownloadSubjects($request)
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

    /**
     * @param $request
     * @return mixed
     * Filter Performances - limit to 10 for display
     */
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
        })->limit(20)->get();

        return $performances;
    }

    /**
     * @param $request
     * @return mixed
     * Filter Performances to download - return all results that meet filter criteria
     */
    public static function filterToDownloadPerformances($request)
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

    /**
     * @param $request
     * @return mixed
     * Filter Infusions - Limit results to display only 10
     */
    public static function filterInfusions($request)
    {
        $infusions = Infusion::where(function ($q) use ($request){
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
        })->limit(20)->get();

        return $infusions;

    }

    /**
     * @param $request
     * @return mixed
     * Filtered Infusions for download as CSV return all Results that meet the filtered criteria
     */
    public static function filterToDownloadInfusions($request)
    {
        $infusions = Infusion::where(function ($q) use ($request){
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

        return $infusions;

    }

    /**
     * @param $request
     * @return mixed
     * Filter Invitro data - limit results to 10 for display
     */
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
        })->limit(20)->get();

        return $invitros;
    }

    /**
     * @param $request
     * @return mixed
     * Filter Invitro data for download - return all results that fit filter criteria
     */
    public static function filterToDownloadInvitros($request)
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

    /**
     * @param $request
     * @return mixed
     * Filter Genome Transcripts - limit results to 10 for display
     */
    public static function filterGenomes($request)
    {
        $genomes = GenomeTranscript::where(function ($q) use ($request){
            if($request->dataset_genome != null) {
                $q->where('DataSet', $request->dataset_genome);
            }
            if ($request->pubid_genome != null) {
                $q->where('PubID', $request->pubid_genome);
            }
            if($request->dataset_all != null) {
                $q->where('DataSet', $request->dataset_all);
            }
            if ($request->pubid_all != null) {
                $q->where('PubID', $request->pubid_all);
            }
        })->limit(20)->get();

        return $genomes;
    }

    /**
     * @param $request
     * @return mixed
     * Filter Genome Transcripts for download return all results that meet criteria
     */
    public static function filterToDownloadGenomes($request)
    {
        $genomes = GenomeTranscript::where(function ($q) use ($request){
            if($request->dataset_genome != null) {
                $q->where('DataSet', $request->dataset_genome);
            }
            if ($request->pubid_genome != null) {
                $q->where('PubID', $request->pubid_genome);
            }
            if($request->dataset_all != null) {
                $q->where('DataSet', $request->dataset_all);
            }
            if ($request->pubid_all != null) {
                $q->where('PubID', $request->pubid_all);
            }
        })->limit(20)->get();

        return $genomes;
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
        })->limit(20)->get();

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
            $datasets_infusions = Infusion::whereIn('PubID', $pubids_study)->distinct()->pluck('DataSet')->toArray();
            $datasets_invitros = InVitroData::whereIn('PubID', $pubids_study)->distinct()->pluck('DataSet')->toArray();
            $datasets_genomes = GenomeTranscript::whereIn('PubID', $pubids_study)->distinct()->pluck('DataSet')->toArray();

            $datasets_all = array_unique(array_merge($datasets_study, $datasets_ingredients, $datasets_nutrients, $datasets_subjects, $datasets_performances, $datasets_infusions, $datasets_invitros, $datasets_genomes));
            return $datasets_all;

        }

        $datasets_study = StudyDescriptor::distinct()->pluck('DataSet')->toArray();
        $datasets_ingredients = DietaryIngredients::distinct()->pluck('DataSet')->toArray();
        $datasets_nutrients = DietaryNutrients::distinct()->pluck('DataSet')->toArray();
        $datasets_subjects = Subject::distinct()->pluck('DataSet')->toArray();
        $datasets_performances = PerformanceData::distinct()->pluck('DataSet')->toArray();
        $datasets_infusions = Infusion::distinct()->pluck('DataSet')->toArray();
        $datasets_invitros = InVitroData::distinct()->pluck('DataSet')->toArray();
        $datasets_genomes = GenomeTranscript::distinct()->pluck('DataSet')->toArray();

        $datasets_all = array_unique(array_merge($datasets_study, $datasets_ingredients, $datasets_nutrients, $datasets_subjects, $datasets_performances, $datasets_infusions, $datasets_invitros, $datasets_genomes));

        return $datasets_all;

    }

//    public static function returnPubIds($request)
//    {
//        if(!empty($request->all())) {
//            $start_date = '';
//            if ($request->start_date) {
//                $start_date = $request->start_date;
//            }
//            $end_date = '';
//            if ($request->end_date) {
//                $end_date = $request->end_date;
//            }
//
//            if($start_date != '' && $end_date != ''){
//                $pubids_study = StudyDescriptor::whereBetween('VarValue', [$start_date, $end_date])->distinct()->pluck('PubID')->toArray();
//            } elseif ($request->dataset_all != null) {
//                $pubids_study = StudyDescriptor::where('DataSet', $request->dataset_all)->distinct()->pluck('PubID')->toArray();
//            } else {
//                $pubids_study = StudyDescriptor::distinct()->pluck('PubID')->toArray();
//            }
//            $pubids_studies = StudyDescriptor::whereIn('PubID', $pubids_study)->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
//            $pubids_ingredients = DietaryIngredients::whereIn('PubID', $pubids_study)->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
//            $pubids_nutrients = DietaryNutrients::whereIn('PubID', $pubids_study)->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
//            $pubids_subjects = Subject::whereIn('PubID', $pubids_study)->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
//            $pubids_performances = PerformanceData::whereIn('PubID', $pubids_study)->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
//            $pubids_infusions = Infusion::whereIn('PubID', $pubids_study)->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
//            $pubids_invitros = InVitroData::whereIn('PubID', $pubids_study)->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
//            $pubids_genomes = GenomeTranscript::whereIn('PubID', $pubids_study)->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
//
//            $pubids_all = array_unique(array_merge($pubids_studies, $pubids_ingredients, $pubids_nutrients, $pubids_subjects, $pubids_performances, $pubids_infusions, $pubids_invitros, $pubids_genomes));
//            ksort($pubids_all);
//            return $pubids_all;
//        }
//
//        $pubids_study = StudyDescriptor::distinct()->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
//        $pubids_ingredients = DietaryIngredients::distinct()->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
//        $pubids_nutrients = DietaryNutrients::distinct()->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
//        $pubids_subjects = Subject::distinct()->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
//        $pubids_performances = PerformanceData::distinct()->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
//        $pubids_infusions = Infusion::distinct()->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
//        $pubids_invitros = InVitroData::distinct()->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
//        $pubids_genomes = InVitroData::distinct()->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
//
//        $pubids_all = array_unique(array_merge($pubids_study, $pubids_ingredients, $pubids_nutrients, $pubids_subjects, $pubids_performances, $pubids_infusions, $pubids_invitros, $pubids_genomes));
//        ksort($pubids_all);
//        return $pubids_all;
//
//    }

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
                $pubids_studies = StudyDescriptor::whereIn('PubID', $pubids_study)->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
            } elseif ($request->dataset_all != null && $request->pubid_all == '') {
                $pubids_study = StudyDescriptor::where('DataSet', $request->dataset_all)->distinct()->pluck('PubID')->toArray();
                $pubids_studies = StudyDescriptor::whereIn('PubID', $pubids_study)->where('DataSet', $request->dataset_all)->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
            } elseif($request->pubid_all != null) {
                $pubids_study = StudyDescriptor::where('DataSet', $request->dataset_all)->distinct()->pluck('PubID')->toArray();
                $pubids_studies = StudyDescriptor::whereIn('PubID', $pubids_study)->where('DataSet', $request->dataset_all)->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
            } else {
                $pubids_study = StudyDescriptor::distinct()->pluck('PubID')->toArray();
                $pubids_studies = StudyDescriptor::whereIn('PubID', $pubids_study)->where('VarName', 'Reference')->distinct()->pluck('id', 'VarValue')->toArray();

            }

            $pubids_all = array_unique($pubids_studies);
            ksort($pubids_all);
            return $pubids_all;
        }

        $pubids_study = StudyDescriptor::distinct()->where('VarName', 'Reference')->distinct()->pluck('PubID', 'VarValue')->toArray();
        $pubids_all = array_unique($pubids_study);
        ksort($pubids_all);
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
        })->limit(20)->get();


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