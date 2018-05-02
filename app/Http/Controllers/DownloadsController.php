<?php

namespace App\Http\Controllers;

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
}
