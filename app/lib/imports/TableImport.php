<?php
namespace App\lib\imports;
ini_set('max_execution_time', 300); //3 minutes


use App\Infusion;
use App\StudyDescriptor;
use App\DietaryIngredients;
use App\DietaryNutrients;
use App\Subject;
use App\PerformanceData;
use App\InVitroData;
use Illuminate\Support\Facades\DB;

class TableImport
{
    public static function importFile($file, $data)
    {

        DB::connection()->disableQueryLog();
        $path = $file;
        $type = basename($path, ".csv");
        if($type == 'study_descriptors') {
            $ref = $data->dataset . $data->pubid . $data->trialid;
            $duplicate = StudyDescriptor::where('DataSet', $data->dataset)
                ->where('ref', $ref)
                ->where('Varvalue', $data->varvalue)
                ->first();
            if(empty($duplicate)) {
                $study_descriptors = StudyDescriptor::create([
                    'DataSet' => $data->dataset,
                    'PubID' => $data->pubid,
                    'TrialID' => $data->trialid,
                    'VarName' => $data->varname,
                    'VarValue' => $data->varvalue,
                    'VarUnits' => $data->varunits,
                    'ref' => $data->dataset . $data->pubid . $data->trialid
                ]);
                $study_descriptors->save();

                return $study_descriptors;
            }

            $duplicate->update([
                'DataSet' => $data->dataset,
                'PubID' => $data->pubid,
                'TrialID' => $data->trialid,
                'VarName' => $data->varname,
                'VarValue' => $data->varvalue,
                'VarUnits' => $data->varunits,
            ]);
            $duplicate->save();

                return $duplicate;

        }

        if($type == 'dietary_ingredients') {
            $ref = $data->dataset . $data->pubid . $data->trialid . $data->trtid . $data->ifn;
            $duplicate = DietaryIngredients::where('DataSet', $data->dataset)
                ->where('ref', $ref)
                ->where('VarName', $data->varname)
                ->where('Varvalue', $data->varvalue)
                ->first();
            if(empty($duplicate)) {
                $dietary_ingredients = DietaryIngredients::create([
                'DataSet' => $data->dataset,
                'PubID' => $data->pubid,
                'TrialID' => $data->trialid,
                'TrtID' => $data->trtid,
                'IFN' => $data->ifn,
                'VarName' => $data->varname,
                'Varvalue' => $data->varvalue,
                'VarUnits' => $data->varunits,
                'N' => $data->n,
                'SE' => $data->se,
                'SD' => $data->sd,
                'ref' => $data->dataset . $data->pubid . $data->trialid . $data->trtid . $data->ifn
                ]);
                $dietary_ingredients->save();

                return $dietary_ingredients;
            }

            $duplicate->update([
                'DataSet' => $data->dataset,
                'PubID' => $data->pubid,
                'TrialID' => $data->trialid,
                'TrtID' => $data->trtid,
                'IFN' => $data->ifn,
                'VarName' => $data->varname,
                'Varvalue' => $data->varvalue,
                'VarUnits' => $data->varunits,
                'N' => $data->n,
                'SE' => $data->se,
                'SD' => $data->sd
            ]);
            $duplicate->save();

            return $duplicate;
        }

        if($type == 'dietary_nutrients') {
            $ref = $data->dataset . $data->pubid . $data->trialid . $data->trtid . $data->subjectid;
            $duplicate = DietaryNutrients::where('DataSet', $data->dataset)
                ->where('ref', $ref)
                ->where('VarName', $data->varname)
                ->where('Varvalue', $data->varvalue)
                ->first();
            if(empty($duplicate)) {
                $dietary_nutrients = DietaryNutrients::create([
                    'DataSet' => $data->dataset,
                    'PubID' => $data->pubid,
                    'TrialID' => $data->trialid,
                    'TrtID' => $data->trtid,
                    'SubjectID' => $data->subjectid,
                    'VarName' => $data->varname,
                    'Varvalue' => $data->varvalue,
                    'VarUnits' => $data->varunits,
                    'N' => $data->n,
                    'SE' => $data->se,
                    'SD' => $data->sd,
                    'ref' => $data->dataset . $data->pubid . $data->trialid . $data->trtid . $data->subjectid
                ]);
                $dietary_nutrients->save();

                return $dietary_nutrients;
            }

            $duplicate->update([
                'DataSet' => $data->dataset,
                'PubID' => $data->pubid,
                'TrialID' => $data->trialid,
                'TrtID' => $data->trtid,
                'SubjectID' => $data->subjectid,
                'VarName' => $data->varname,
                'Varvalue' => $data->varvalue,
                'VarUnits' => $data->varunits,
                'N' => $data->n,
                'SE' => $data->se,
                'SD' => $data->sd
            ]);
            $duplicate->save();

            return $duplicate;
        }

        if($type == 'subjects') {
            $ref = $data->dataset . $data->pubid . $data->trialid . $data->trtid . $data->subjectid;
            $duplicate = Subject::where('DataSet', $data->dataset)
                ->where('ref', $ref)
                ->where('VarName', $data->varname)
                ->where('Varvalue', $data->varvalue)
                ->first();
            if(empty($duplicate)) {
                $subjects = Subject::create([
                    'DataSet' => $data->dataset,
                    'PubID' => $data->pubid,
                    'TrialID' => $data->trialid,
                    'TrtID' => $data->trtid,
                    'SubjectID' => $data->subjectid,
                    'VarName' => $data->varname,
                    'Varvalue' => $data->varvalue,
                    'VarUnits' => $data->varunits,
                    'N' => $data->n,
                    'SE' => $data->se,
                    'SD' => $data->sd,
                    'ref' => $data->dataset . $data->pubid . $data->trialid . $data->trtid . $data->subjectid
                ]);

                $subjects->save();

                return $subjects;
            }

            $duplicate->update([
                'DataSet' => $data->dataset,
                'PubID' => $data->pubid,
                'TrialID' => $data->trialid,
                'TrtID' => $data->trtid,
                'SubjectID' => $data->subjectid,
                'VarName' => $data->varname,
                'Varvalue' => $data->varvalue,
                'VarUnits' => $data->varunits,
                'N' => $data->n,
                'SE' => $data->se,
                'SD' => $data->sd
            ]);
            $duplicate->save();

            return $duplicate;

        }

        if($type == 'in_vitro_data') {
            $ref = $data->dataset . $data->pubid . $data->trialid . $data->trtid . $data->subjectid . $data->varname;
            $duplicate = InVitroData::where('DataSet', $data->dataset)
                ->where('ref', $ref)
                ->where('Varvalue', $data->varvalue)
                ->first();
            if (empty($duplicate)) {
                $in_vitro_data = InVitroData::create([
                    'DataSet' => $data->dataset,
                    'PubID' => $data->pubid,
                    'TrialID' => $data->trialid,
                    'TrtID' => $data->trtid,
                    'SubjectID' => $data->subjectid,
                    'PlateID' => $data->plateid,
                    'WellID' => $data->wellid,
                    'SubTrtID' => $data->subtrtid,
                    'Site_sample' => $data->site_sample,
                    'Cell_Type' => $data->cell_type,
                    'Day_Sample' => $data->day_sample,
                    'Time_Sample' => $data->time_sample,
                    'VarName' => $data->varname,
                    'VarUnits' => $data->varunits,
                    'N' => $data->n,
                    'SE' => $data->se,
                    'SD' => $data->sd,
                    'VarType' => $data->vartype
                ]);
                $in_vitro_data->save();

                return $in_vitro_data;
            }

            $duplicate->update([
                'DataSet' => $data->dataset,
                'PubID' => $data->pubid,
                'TrialID' => $data->trialid,
                'TrtID' => $data->trtid,
                'SubjectID' => $data->subjectid,
                'PlateID' => $data->plateid,
                'WellID' => $data->wellid,
                'SubTrtID' => $data->subtrtid,
                'Site_sample' => $data->site_sample,
                'Cell_Type' => $data->cell_type,
                'Day_Sample' => $data->day_sample,
                'Time_Sample' => $data->time_sample,
                'VarName' => $data->varname,
                'VarUnits' => $data->varunits,
                'N' => $data->n,
                'SE' => $data->se,
                'SD' => $data->sd,
                'VarType' => $data->vartype
            ]);
            $duplicate->save();

            return $duplicate;
        }

        if($type == 'performance_data') {
            $ref = $data->dataset . $data->pubid . $data->trialid . $data->trtid . $data->subjectid;
            $duplicate = PerformanceData::where('DataSet', $data->dataset)
                ->where('ref', $ref)
                ->where('VarName', $data->varname)
                ->where('VarValue', $data->varvalue)
                ->first();
            if (empty($duplicate)) {
                $performance_data = PerformanceData::create([
                    'DataSet' => $data->dataset,
                    'PubID' => $data->pubid,
                    'TrialID' => $data->trialid,
                    'TrtID' => $data->trtid,
                    'SubjectID' => $data->subjectid,
                    'Site_Sample' => $data->site_sample,
                    'Day_Sample' => $data->day_sample,
                    'Time_Sample' => $data->time_sample,
                    'VarName' => $data->varname,
                    'VarValue' => $data->varvalue,
                    'VarUnits' => $data->varunits,
                    'N' => $data->n,
                    'SEM' => $data->sem,
                    'SED' => $data->sed,
                    'VarType' => $data->vartype,
                    'ref' => $data->dataset . $data->pubid . $data->trialid . $data->trtid . $data->subjectid
                ]);
                $performance_data->save();

                return $performance_data;
            }

            $duplicate->update([
                'DataSet' => $data->dataset,
                'PubID' => $data->pubid,
                'TrialID' => $data->trialid,
                'TrtID' => $data->trtid,
                'SubjectID' => $data->subjectid,
                'Site_Sample' => $data->site_sample,
                'Day_Sample' => $data->day_sample,
                'Time_Sample' => $data->time_sample,
                'VarName' => $data->varname,
                'VarValue' => $data->varvalue,
                'VarUnits' => $data->varunits,
                'N' => $data->n,
                'SEM' => $data->sem,
                'SED' => $data->sed,
                'VarType' => $data->vartype
            ]);
            $duplicate->save();

            return $duplicate;
        }

        if($type == 'infusion') {
            $infusion = new Infusion();
            $infusion->DataSet = $data[0];
            $infusion->PubID = $data[1];
            $infusion->TrialID = $data[2];
            $infusion->TrtID = $data[3];
            $infusion->SubjectID = $data[4];
            $infusion->InfusionLocation = $data[5];
            $infusion->VarName = $data[6];
            $infusion->VarValue = $data[7];
            $infusion->VarUnits = $data[8];
            $infusion->DayofPeriodStart = $data[9];
            $infusion->DayofPeriodStop = $data[10];
            $infusion->TimeofDayStart = $data[11];
            $infusion->TimeofDayStop = $data[12];
            $infusion->save();

            return $infusion;
        }
    }
}