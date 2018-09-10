<?php

namespace App\lib\imports;
ini_set('max_execution_time', 1800);

use App\DietaryIngredients;
use App\StudyDescriptor;
use App\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\lib\imports\TableImport;


class ImportEngine
{
    /**
     * @return bool
     */
    public static function importData()
    {
        $directory = public_path('/uploads/files/');
        $handle = opendir($directory);
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $files = scandir ($directory);
                if(count($files) == 3) {
                    $firstfile = $directory . $files[2];
                    $file = $firstfile;
                    if(File::exists($file)) {
                        Excel::filter('chunk')->load($file)->chunk(10000, function ($results) use ($file){
                            foreach($results as $data)
                            {
                                ini_set('max_execution_time', 1800);
                                $import_file = TableImport::importFile($file, $data);
                            }
                        });
                    }
                    $path = $file;
                    $type = basename($path, ".csv");
                    $dat = date('d-m-y');
                    $old_path = $file;
                    $new_path = public_path('/uploads/archives/'. $type . '_' . $dat . '.csv');
                    $move = File::move($old_path, $new_path);
                }
            }
        }

        return true;
    }

//    public static function importData()
//    {
//        $directory = public_path('/uploads/files/');
//        $handle = opendir($directory);
//        while (false !== ($entry = readdir($handle))) {
//            if ($entry != "." && $entry != "..") {
//                $files = scandir($directory);
//                if (count($files) == 3) {
//                    $firstfile = $directory . $files[2];
//                    $file = $firstfile;
//                    $customerArr = ImportEngine::csvToArray($file);
//
//                    for ($i = 0; $i < count($customerArr); $i++) {
//                        DietaryIngredients::firstOrCreate($customerArr[$i]);
//                    }
//                }
//            }
//        }
//
//        return 'Job done';
//    }
//
//    public static function csvToArray($filename = '', $delimiter = ',')
//    {
//        if (!file_exists($filename) || !is_readable($filename))
//            return false;
//
//        $header = null;
//        $data = array();
//        if (($handle = fopen($filename, 'r')) !== false)
//        {
//            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
//            {
//                if (!$header)
//                    $header = $row;
//                else
//                    $data[] = array_combine($header, $row);
//            }
//            fclose($handle);
//        }
//
//        return $data;
//    }
}
