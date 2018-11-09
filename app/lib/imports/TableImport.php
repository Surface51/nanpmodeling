<?php
namespace App\lib\imports;
ini_set('max_execution_time', 300); //3 minutes


use App\GenomeTranscript;
use App\Infusion;
use App\lib\Filters\FilterEngine;
use App\StudyDescriptor;
use App\DietaryIngredients;
use App\DietaryNutrients;
use App\Subject;
use App\PerformanceData;
use App\InVitroData;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
                'IngrNum' => $data->ingrnum,
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
                'SD' => $data->sd,
                'IngrNum' => $data->ingrnum
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
                    'Day_Sample2' => $data->day_sample2,
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
                'Day_Sample2' => $data->day_sample2,
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
            $ref = $data->dataset . $data->pubid . $data->trialid . $data->trtid . $data->subjectid;
            $duplicate = Infusion::where('DataSet', $data->dataset)
                ->where('ref', $ref)
                ->where('VarName', $data->varname)
                ->where('VarValue', $data->varvalue)
                ->first();
            if (empty($duplicate)) {
                $infusion = Infusion::create([
                    'DataSet' => $data->dataset,
                    'PubID' => $data->pubid,
                    'TrialID' => $data->trialid,
                    'TrtID' => $data->trtid,
                    'SubjectID' => $data->subjectid,
                    'InfusionLocation' => $data->infusionlocation,
                    'VarName' => $data->varname,
                    'VarValue' => $data->varvalue,
                    'VarUnits' => $data->varunits,
                    'DayofPeriodStart' => $data->dayofperiodstart,
                    'DayofPeriodStop' => $data->dayofperiodstop,
                    'TimeofDayStart' => $data->timeofdaystart,
                    'TimeofDayStop' => $data->timeofdaystop,
                    'ref' => $data->dataset . $data->pubid . $data->trialid . $data->trtid . $data->subjectid
                ]);
                $infusion->save();

                return $infusion;
            }

            $duplicate->update([
                'DataSet' => $data->dataset,
                'PubID' => $data->pubid,
                'TrialID' => $data->trialid,
                'TrtID' => $data->trtid,
                'SubjectID' => $data->subjectid,
                'InfusionLocation' => $data->infusion_location,
                'VarName' => $data->varname,
                'VarValue' => $data->varvalue,
                'VarUnits' => $data->varunits,
                'DayofPeriodStart' => $data->day_of_period_start,
                'DayofPeriodStop' => $data->day_of_period_stop,
                'TimeofDayStart' => $data->time_of_day_start,
                'TimeofDayStop' => $data->time_of_day_stop
            ]);
            $duplicate->save();

            return $duplicate;
        }

        if($type == 'genome_transcripts') {
            $ref = $data->dataset . $data->pubid . $data->trialid . $data->trtid . $data->subjectid;
            $duplicate = GenomeTranscript::where('DataSet', $data->dataset)
                ->where('ref', $ref)
                ->where('VarName', $data->varname)
                ->where('VarValue', $data->varvalue)
                ->first();
            if (empty($duplicate)) {
                $genome = GenomeTranscript::create([
                    'DataSet' => $data->dataset,
                    'PubID' => $data->pubid,
                    'TrialID' => $data->trialid,
                    'TrtID' => $data->trtid,
                    'SubjectID' => $data->subjectid,
                    'PlateID' => $data->plateid,
                    'WellID' => $data->wellid,
                    'SubTrtID' => $data->subtrtid,
                    'Site_sample' => $data->sitesample,
                    'Cell_Type' => $data->celltype,
                    'Day_Sample' => $data->day_sample,
                    'Day_Sample2' => $data->day_sample2,
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
                $genome->save();

                return $genome;
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
                'Day_Sample2' => $data->day_sample2,
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
    }

    /* creates a compressed zip file */
    public static function create_zip($files = array(),$destination = '',$overwrite = false) {
        //if the zip file already exists and overwrite is false, return false
        if(file_exists($destination) && !$overwrite) { return false; }
        //vars
        $valid_files = array();
        //if files were passed in...
        if(is_array($files)) {
            //cycle through each file
            foreach($files as $file) {
                //make sure the file exists
                if(file_exists($file)) {
                    $valid_files[] = $file;
                }
            }
        }
        //if we have good files...
        if(count($valid_files)) {
            //create the archive
            $zip = new \ZipArchive();
            if($zip->open($destination,$overwrite ? \ZipArchive::OVERWRITE : \ZipArchive::CREATE) !== true) {
                return false;
            }
            //add the files
            foreach($valid_files as $file) {
                $zip->addFile($file,$file);
            }
            //debug
            //echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;

            //close the zip -- done!
            $zip->close();

            //check to make sure the file exists
            return file_exists($destination);
        }
        else
        {
            return false;
        }
    }

    public static function createFilteredStudiesFile(Request $request) {
        $table = FilterEngine::filterToDownloadStudyDescriptors($request);
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

        return $filename;
    }

    public static function createFilteredIngredientsFile(Request $request)
    {
        $table = FilterEngine::filterToDownloadDietaryIngredients($request);
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

        return $filename;
    }

    public static function createFilteredNutrientsFile(Request $request)
    {
        $table = FilterEngine::filterToDownloadDietaryNutrients($request);
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

        return $filename;
    }

    public static function createFilteredSubjectsFile(Request $request)
    {
        $table = FilterEngine::filterToDownloadSubjects($request);
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

        return $filename;
    }

    public static function createFilteredPerformancesFile(Request $request)
    {
        $table = FilterEngine::filterToDownloadPerformances($request);
        $filename = "performances.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'Site_Sample', 'Day_Sample', 'Time_Sample',
            'VarName', 'VarValue', 'VarUnits', 'N', 'SEM', 'SED', 'VarType'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['Site_Sample'], $row['Day_Sample'], $row['Time_Sample'],
                $row['VarName'], $row['VarValue'], $row['VarUnits'],
                $row['N'], $row['SEM'], $row['SED'], $row['VarType']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return $filename;
    }

    public static function createFilteredInfusionsFile(Request $request)
    {
        $table = FilterEngine::filterToDownloadInfusions($request);
        $filename = "infusions.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'InfusionLocation', 'VarName', 'VarValue',
            'VarUnits', 'DayofPeriodStart', 'DayofPeriodStop', 'TimeofDayStart', 'TimeofDayStop'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['InfusionLocation'], $row['VarName'], $row['VarValue'],
                $row['VarUnits'], $row['DayofPeriodStart'], $row['DayofPeriodStop'],
                $row['TimeofDayStart'], $row['TimeofDayStop']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return $filename;
    }

    public static function createFilteredInvitroDatasFile(Request $request)
    {
        $table = FilterEngine::filterToDownloadInvitros($request);
        $filename = "invitrodata.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'PlateID', 'WellID', 'SubTrtID',
            'Site_sample', 'Cell_Type', 'Day_Sample', 'Day_Sample2', 'Time_Sample', 'VarName', 'VarValue', 'VarUnits', 'N', 'SE', 'SD', 'VarType'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['PlateID'], $row['WellID'], $row['SubTrtID'],
                $row['Site_sample'], $row['Cell_Type'], $row['Day_Sample'], $row['Day_Sample2'] , $row['Time_Sample'],
                $row['VarName'], $row['VarValue'], $row['VarUnits'],
                $row['N'], $row['SE'], $row['SD'], $row['VarType']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return $filename;
    }

    public static function createFilteredGenomesFile(Request $request)
    {
        $table = FilterEngine::filterToDownloadGenomes($request);
        $filename = "genome.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'PlateID', 'WellID', 'SubTrtID',
            'Site_sample', 'Cell_Type', 'Day_Sample', 'Day_Sample2', 'Time_Sample', 'VarName', 'VarValue', 'VarUnits', 'N', 'SE', 'SD', 'VarType'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['PlateID'], $row['WellID'], $row['SubTrtID'],
                $row['Site_sample'], $row['Cell_Type'], $row['Day_Sample'], $row['Day_Sample2'], $row['Time_Sample'],
                $row['VarName'], $row['VarValue'], $row['VarUnits'],
                $row['N'], $row['SE'], $row['SD'], $row['VarType']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return $filename;
    }
}