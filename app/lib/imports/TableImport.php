<?php
namespace App\lib\imports;

use App\Infusion;
use App\StudyDescriptor;
use App\DietaryIngredients;
use App\DietaryNutrients;
use App\Subject;
use App\PerformanceData;
use App\InVitroData;

class TableImport
{
    public static function importFile($file, $data)
    {
        $path = $file;
        $type = basename($path, ".csv");
        if($type == 'study_descriptors') {
            $duplicate = StudyDescriptor::where('DataSet', $data[0])->where('PubID', $data[1])->where('VarName', $data[3])->where('VarValue', $data[4])->first();
            if(empty($duplicate)) {
                $study_descriptors = new StudyDescriptor();
                $study_descriptors->DataSet = $data[0];
                $study_descriptors->PubID = $data[1];
                $study_descriptors->TrialID = $data[2];
                $study_descriptors->VarName = $data[3];
                $study_descriptors->VarValue = $data[4];
                $study_descriptors->VarUnits = $data[5];
                $study_descriptors->ref = $data[0] . $data[1] . $data[2];
                $study_descriptors->save();

                return $study_descriptors;
            }

            $duplicate->update([
                'DataSet' => $data[0],
                'PubID' => $data[1],
                'TrialID' => $data[2],
                'VarName' => $data[3],
                'VarValue' => $data[4],
                'VarUnits' => $data[5],
            ]);
            $duplicate->save();

                return $duplicate;

        }

        if($type == 'dietary_ingredients') {
            $duplicate = DietaryIngredients::where('DataSet', $data[0])->where('PubID', $data[1])->where('VarName', $data[3])->where('VarValue', $data[4])->first();
            if(empty($duplicate)) {
                $dietary_ingredients = new DietaryIngredients();
                $dietary_ingredients->DataSet = $data[0];
                $dietary_ingredients->PubID = $data[1];
                $dietary_ingredients->TrialID = $data[2];
                $dietary_ingredients->TrtID = $data[3];
                $dietary_ingredients->IFN = $data[4];
                $dietary_ingredients->VarName = $data[5];
                $dietary_ingredients->Varvalue = $data[6];
                $dietary_ingredients->VarUnits = $data[7];
                $dietary_ingredients->N = $data[8];
                $dietary_ingredients->SE = $data[9];
                $dietary_ingredients->SD = $data[10];
                $dietary_ingredients->ref = $data[0] . $data[1] . $data[2];
                $dietary_ingredients->save();

                return $dietary_ingredients;
            }

            $duplicate->update([
                'DataSet' => $data[0],
                'PubID' => $data[1],
                'TrialID' => $data[2],
                'TrtID' => $data[3],
                'IFN' => $data[4],
                'VarName' => $data[5],
                'Varvalue' => $data[6],
                'VarUnits' => $data[7],
                'N' => $data[8],
                'SE' => $data[9],
                'SD' => $data[10]
            ]);
            $duplicate->save();

            return $duplicate;
        }

        if($type == 'dietary_nutrients') {
            $dietary_nutrients = new DietaryNutrients();
            $dietary_nutrients->DataSet = $data[0];
            $dietary_nutrients->PubID = $data[1];
            $dietary_nutrients->TrialID = $data[2];
            $dietary_nutrients->TrtID = $data[3];
            $dietary_nutrients->SubjectID = $data[4];
            $dietary_nutrients->VarName = $data[5];
            $dietary_nutrients->Varvalue = $data[6];
            $dietary_nutrients->VarUnits = $data[7];
            $dietary_nutrients->N = $data[8];
            $dietary_nutrients->SE = $data[9];
            $dietary_nutrients->SD = $data[10];
            $dietary_nutrients->save();

            return $dietary_nutrients;
        }

        if($type == 'subjects') {
            $subjects = new Subject();
            $subjects->DataSet = $data[0];
            $subjects->PubID = $data[1];
            $subjects->TrialID = $data[2];
            $subjects->TrtID = $data[3];
            $subjects->SubjectID = $data[4];
            $subjects->VarName = $data[5];
            $subjects->Varvalue = $data[6];
            $subjects->VarUnits = $data[7];
            $subjects->N = $data[8];
            $subjects->SE = $data[9];
            $subjects->SD = $data[10];
            $subjects->save();

            return $subjects;
        }

        if($type == 'in_vitro_data') {
            $in_vitro_data = new InVitroData();
            $in_vitro_data->DataSet = $data[0];
            $in_vitro_data->PubID = $data[1];
            $in_vitro_data->TrialID = $data[2];
            $in_vitro_data->TrtID = $data[3];
            $in_vitro_data->SubjectID = $data[4];
            $in_vitro_data->PlateID = $data[5];
            $in_vitro_data->WellID = $data[6];
            $in_vitro_data->SubTrtID = $data[7];
            $in_vitro_data->Site_sample = $data[8];
            $in_vitro_data->Cell_Type = $data[9];
            $in_vitro_data->Day_Sample = $data[10];
            $in_vitro_data->Time_Sample = $data[11];
            $in_vitro_data->VarName = $data[12];
            $in_vitro_data->VarUnits = $data[13];
            $in_vitro_data->N = $data[14];
            $in_vitro_data->SE = $data[15];
            $in_vitro_data->SD = $data[16];
            $in_vitro_data->VarType = $data[17];
            $in_vitro_data->save();

            return $in_vitro_data;
        }

        if($type == 'performance_data') {
            $performance_data = new PerformanceData();
            $performance_data->DataSet = $data[0];
            $performance_data->PubID = $data[1];
            $performance_data->TrialID = $data[2];
            $performance_data->TrtID = $data[3];
            $performance_data->SubjectID = $data[4];
            $performance_data->Site_Sample = $data[5];
            $performance_data->Day_Sample = $data[6];
            $performance_data->Time_Sample = $data[7];
            $performance_data->VarName = $data[8];
            $performance_data->VarValue = $data[9];
            $performance_data->VarUnits = $data[10];
            $performance_data->N = $data[11];
            $performance_data->SE = $data[12];
            $performance_data->SD = $data[13];
            $performance_data->VarType = $data[14];
            $performance_data->save();

            return $performance_data;
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