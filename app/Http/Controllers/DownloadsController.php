<?php

namespace App\Http\Controllers;

use App\GenomeTranscript;
use App\Infusion;
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

        return Response::download($filename);
    }

    public function downloadFilteredInfusions(Request $request)
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

        return Response::download($filename);
    }

    public function downloadInvitro()
    {
        $table = InVitroData::all();
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

        return Response::download($filename);
    }

    public function downloadFilteredInvitroDatas(Request $request)
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

        return Response::download($filename);
    }

    public function downloadGenomes()
    {
        $table = GenomeTranscript::all();
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
                $row['Site_sample'], $row['Cell_Type'], $row['Day_Sample'], $row['Day_Sample2'] , $row['Time_Sample'],
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



    public function downloadZipCsv(Request $request) {
        $files_to_zip = array(
            $studies = TableImport::createFilteredStudiesFile($request),
            $ingredients = TableImport::createFilteredIngredientsFile($request),
            $nutrients = TableImport::createFilteredNutrientsFile($request),
            $subjects = TableImport::createFilteredSubjectsFile($request),
            $performances = TableImport::createFilteredPerformancesFile($request),
            $infusions = TableImport::createFilteredInfusionsFile($request),
            $invitros = TableImport::createFilteredInvitroDatasFile($request),
            $genomes = TableImport::createFilteredGenomesFile($request)
        );

        $result = TableImport::create_zip($files_to_zip,'my-archive.zip');

        return Response::download('my-archive.zip');
    }
}
