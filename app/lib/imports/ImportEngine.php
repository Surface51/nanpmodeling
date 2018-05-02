<?php

namespace App\lib\imports;

use App\StudyDescriptor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\lib\imports\TableImport;


class ImportEngine
{

    public static function importData()
    {
        $directory = public_path('/uploads/files/');
        $handle = opendir($directory);
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $files = scandir($directory);
                if (count($files) == 3) {
                    $firstfile = $directory . $files[2];
                    $file = $firstfile;
                    if (File::exists($file)) {
                        if (($folder = fopen ( $file, 'r' )) !== FALSE) {
                            $i=0;
                            while (($data = fgetcsv ( $folder, 1000, ',' )) !== FALSE ) {
                                $i++;
                                if($i==1) continue;
                                $import_file = TableImport::importFile($file, $data);
                            }
                            fclose ( $folder );
                        }
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

    public static function importFiles()
    {
        $directory = public_path('/uploads/files/');
        $handle = opendir($directory);
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $files = scandir($directory);
                if (count($files) == 4) {
                    $firstfile = $directory . $files[3];
                    $file = $firstfile;
                    if (File::exists($file)) {
                        Excel::filter('chunk')->load($file)->chunk(250, function ($results) {
                            foreach ($results as $row) {
                                $source = preg_replace("/[^A-Za-z0-9 ]/", '', $row->source);
                                $key = $source . $row->volume . $row->page . $row->year;
                                $sty = StudyDescriptor::where('reference', $key)->first();
                                if (empty($sty)) {
                                    $study_descriptor = StudyDescriptor::create(
                                        ['ingredient_name' => ($row->ingredient_name != 'NULL') ? $row->ingredient_name : NULL,
                                            'year' => ($row->year != 'NULL') ? $row->year : NULL
                                        ]);
                                    $source = preg_replace("/[^A-Za-z0-9 ]/", '', $row->source);
                                    $study_descriptor->reference = $source . $row->volume . $row->page . $row->year;
                                    $study_descriptor->save();
                                } else {
                                    $input = array_filter($row->toArray(), 'strlen');
                                    $source = preg_replace("/[^A-Za-z0-9 ]/", '', $row->source);
                                    $key = $source . $row->volume . $row->page . $row->year;
                                    StudyDescriptor::where('reference', $key)->update($input);
                                    $study_descriptor = StudyDescriptor::where('reference', $key)->first();
                                    $study_descriptor->reference = $key;
                                }
                            }
                        });
                    }
                }
            }
        }
        return true;
    }
}