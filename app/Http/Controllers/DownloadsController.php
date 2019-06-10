<?php

namespace App\Http\Controllers;

use App\Acknowledgement;
use App\GenomeTranscript;
use App\Infusion;
use App\label;
use App\lib\imports\TableImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\StudyDescriptor;
use App\DietaryIngredients;
use App\DietaryNutrients;
use App\Subject;
use App\PerformanceData;
use App\InVitroData;
use App\lib\Filters\FilterEngine;
use Spatie\DbDumper\Databases\MySql;
ini_set('max_execution_time', 180); //3 minutes

class DownloadsController extends Controller
{
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

    public function downloadAcknowledgments()
    {

        $table = Acknowledgement::all();
        $filename = "acknowledgment.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'dataset', 'acknowledgment', 'comments'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['dataset'], $row['acknowledgment'], $row['comments']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename);
    }

    public function downloadLabels()
    {

        $table = label::all();
        $filename = "labels.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'VarName', 'VarUnits', 'PotentialTable'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['VarName'], $row['VarUnits'], $row['PotentialTable']
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

        return Response::download($filename);
    }

    public function downloadIngredients()
    {
        $table = DietaryIngredients::all();
        $filename = "dietaryingredients.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'UID', 'RepUID', 'VarName', 'VarValue', 'VarUnits', 'N', 'SE', 'SD'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['UID'], $row['RepUID'], $row['VarName'], $row['Varvalue'], $row['VarUnits'],
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
        $table = FilterEngine::filterToDownloadDietaryIngredients($request);
        $filename = "dietaryingredients.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'UID', 'RepUID', 'VarName', 'VarValue', 'VarUnits', 'N', 'SE', 'SD'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['UID'], $row['RepUID'], $row['VarName'], $row['Varvalue'], $row['VarUnits'],
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
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'VarName', 'VarValue', 'VarUnits', 'N', 'SE', 'SD'
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
        $table = FilterEngine::filterToDownloadDietaryNutrients($request);
        $filename = "dietarynutrients.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'VarName', 'VarValue', 'VarUnits', 'N', 'SE', 'SD'
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
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'VarName', 'VarValue', 'VarUnits', 'N', 'SE', 'SD'
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
        $table = FilterEngine::filterToDownloadSubjects($request);
        $filename = "subjects.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'VarName', 'VarValue', 'VarUnits', 'N', 'SE', 'SD'
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

        return Response::download($filename);
    }

    public function downloadFilteredPerformances(Request $request)
    {
        if($request->dataset == "USDA Beltsville") {
            $file= public_path(). "/downloadable/performance_beltsville.csv";

            $headers = array(
                'Content-Type' => 'text/csv',
            );

            return Response::download($file, 'download.csv', $headers);
        }
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

        return Response::download($filename);
    }

    public function downloadInfusions()
    {
        $table = Infusion::all();
        $filename = "infusions.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'InfusionLocation', 'UID', 'RepUID', 'VarName', 'VarValue',
            'VarUnits', 'DayofPeriodStart', 'DayofPeriodStop', 'TimeofDayStart', 'TimeofDayStop'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['InfusionLocation'], $row['UID'], $row['RepUID'], $row['VarName'], $row['VarValue'],
                $row['VarUnits'], $row['DayofPeriodStart'], $row['DayofPeriodStop'],
                $row['TimeofDayStart'], $row['TimeofDayStop']
            ));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename);
    }

    public function downloadFilteredInfusions(Request $request)
    {
        $table = FilterEngine::filterToDownloadInfusions($request);
        $filename = "infusions.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'InfusionLocation', 'UID', 'RepUID', 'VarName', 'VarValue',
            'VarUnits', 'DayofPeriodStart', 'DayofPeriodStop', 'TimeofDayStart', 'TimeofDayStop'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['InfusionLocation'], $row['UID'], $row['RepUID'], $row['VarName'], $row['VarValue'],
                $row['VarUnits'], $row['DayofPeriodStart'], $row['DayofPeriodStop'],
                $row['TimeofDayStart'], $row['TimeofDayStop']
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
            'Site_sample', 'Cell_Type', 'DaySampleofPeriod_InVivo', 'DaySampleofPeriod_InVitro', 'TimeSampleofPeriod_InVivo', 'TimeSampleofPeriod_InVitro', 'VarName', 'VarValue', 'VarUnits', 'N', 'SE', 'SD', 'VarType'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['PlateID'], $row['WellID'], $row['SubTrtID'],
                $row['Site_sample'], $row['Cell_Type'], $row['DaySampleofPeriod_InVivo'], $row['DaySampleofPeriod_InVitro'] , $row['TimeSampleofPeriod_InVivo'],  $row['TimeSampleofPeriod_InVitro'],
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

    public function downloadFilteredInvitroDatas(Request $request)
    {
        $table = FilterEngine::filterToDownloadInvitros($request);
        $filename = "invitrodata.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'PlateID', 'WellID', 'SubTrtID',
            'Site_sample', 'Cell_Type', 'DaySampleofPeriod_InVivo', 'DaySampleofPeriod_InVitro', 'TimeSampleofPeriod_InVivo', 'TimeSampleofPeriod_InVitro', 'VarName', 'VarValue', 'VarUnits', 'N', 'SE', 'SD', 'VarType'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['PlateID'], $row['WellID'], $row['SubTrtID'],
                $row['Site_sample'], $row['Cell_Type'], $row['DaySampleofPeriod_InVivo'], $row['DaySampleofPeriod_InVitro'] , $row['TimeSampleofPeriod_InVivo'],  $row['TimeSampleofPeriod_InVitro'],
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

    public function downloadGenomes()
    {
        $table = GenomeTranscript::all();
        $filename = "genome.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'PlateID', 'WellID', 'SubTrtID',
            'Site_sample', 'Cell_Type', 'DaySampleofPeriod_InVivo', 'DaySampleofPeriod_InVitro', 'TimeSampleofPeriod_InVivo', 'TimeSampleofPeriod_InVitro', 'VarName', 'VarValue', 'VarUnits', 'N', 'SE', 'SD', 'VarType'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['PlateID'], $row['WellID'], $row['SubTrtID'],
                $row['Site_sample'], $row['Cell_Type'], $row['DaySampleofPeriod_InVivo'], $row['DaySampleofPeriod_InVitro'] , $row['TimeSampleofPeriod_InVivo'],  $row['TimeSampleofPeriod_InVitro'],
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


    public function downloadFilteredGenomes(Request $request)
    {
        $table = FilterEngine::filterToDownloadGenomes($request);
        $filename = "genome.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array(
            'DataSet', 'PubID', 'TrialID', 'TrtID', 'SubjectID', 'PlateID', 'WellID', 'SubTrtID',
            'Site_sample', 'Cell_Type', 'DaySampleofPeriod_InVivo', 'DaySampleofPeriod_InVitro', 'TimeSampleofPeriod_InVivo', 'TimeSampleofPeriod_InVitro', 'VarName', 'VarValue', 'VarUnits', 'N', 'SE', 'SD', 'VarType'
        ));

        foreach($table as $row) {
            fputcsv($handle, array(
                $row['DataSet'], $row['PubID'], $row['TrialID'], $row['TrtID'],
                $row['SubjectID'], $row['PlateID'], $row['WellID'], $row['SubTrtID'],
                $row['Site_sample'], $row['Cell_Type'], $row['DaySampleofPeriod_InVivo'], $row['DaySampleofPeriod_InVitro'] , $row['TimeSampleofPeriod_InVivo'],  $row['TimeSampleofPeriod_InVitro'],
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
             ->setDbName('modeling')
             ->setUserName('homestead')
             ->setPassword('secret')
             ->dumpToFile($filename);

//        MySql::create()
//            ->setDbName('animalnu_modeling')
//            ->setUserName('animalnu_modelin')
//            ->setPassword('EuR6Q50KzR55')
//            ->dumpToFile($filename);

        return Response::download($filename);
    }



    public function downloadZipCsv(Request $request) {
        if($request->dataset == "USDA Beltsville") {
            $file= public_path(). "/downloadable/beltsville.zip";

            return Response::download($file, 'download.zip');
        }

        if($request->compare_value == "Beef") {
            $file= public_path(). "/downloadable/beltsvillebeef.zip";

            return Response::download($file, 'download.zip');
        }

            $pubids_filtered = FilterEngine::filterPubIdsForFiltering($request);

            $current = time();
            $files_to_zip = array(
                $studies = TableImport::createFilteredStudiesFile($request),
                $ingredients = TableImport::createFilteredIngredientsFile($request),
                $nutrients = TableImport::createFilteredNutrientsFile($request),
                $subjects = TableImport::createFilteredSubjectsFile($request),
//                $performances = TableImport::createFilteredPerformancesFromIds($pubids_filtered, $request),
                $infusions = TableImport::createFilteredInfusionsFile($request),
                $invitros = TableImport::createFilteredInvitroDatasFile($request),
                $genomes = TableImport::createFilteredGenomesFile($request)
            );


        $filename = 'my-archive' . $current . '.zip';
        $result = TableImport::create_zip($files_to_zip, $filename);

        return Response::download($filename);
    }

    public function downloadAllZipCsv() {
        $filename = public_path(). "/downloadable/csv-tables.zip";

        return Response::download($filename);
    }

    public function getDownload() {
        $file= public_path(). "/downloadable/performance_datas.csv";

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($file, 'download.csv', $headers);
    }

    public function exportPerformanceData() {

        $filename_xml = public_path(). '/downloadable/performance_data.sql';

         MySql::create()
             ->setDbName('modeling')
             ->setUserName('homestead')
             ->setPassword('secret')
             ->includeTables('performance_datas')
             ->dumpToFile($filename_xml);

//        MySql::create()
//            ->setDbName('animalnu_modeling')
//            ->setUserName('animalnu_modelin')
//            ->setPassword('EuR6Q50KzR55')
//            ->doNotCreateTables()
//            ->includeTables('performance_datas')
//            ->addExtraOption('--xml')
//            ->dumpToFile($filename_tab, $filename_tab);


        return Response::download($filename_xml);
    }

    public function convertFiletoCSV() {
        $filename_xml = public_path(). '/downloadable/performance_data.xml';
        $xml = simplexml_load_file($filename_xml);

        $headers = array();
        foreach ($xml->ROW->children() as $field) {
            $headers[] = $field->getName();
        }
        $csv_filename = str_replace('xml', 'csv', $filename_xml);
        $file = $this->getCsvDirectory() . '/' . $csv_filename;
        if (file_exists($file)) {
            unlink($file);
        }
        $csv = fopen($file, 'w');
        fputcsv($csv, $headers, ',', '"');
        foreach ($xml as $entry) {
            $data = get_object_vars($entry);
            // Decode HTML entities.
            $sanitized_data = array();
            foreach ($data as $key => $datum) {
                $sanitized_data[$key] = html_entity_decode($datum, ENT_COMPAT, 'UTF-8');
            }
            fputcsv($csv, $sanitized_data, ',', '"');
        }
        fclose($csv);
    }



// DB_CONNECTION=mysql
// DB_HOST=127.0.0.1
// DB_PORT=3306
// DB_DATABASE=animalnu_modeling
// DB_USERNAME=animalnu_modelin
// DB_PASSWORD=EuR6Q50KzR55


}
