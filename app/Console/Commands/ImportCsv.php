<?php

namespace App\Console\Commands;

use App\lib\imports\TableImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class ImportCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports recently uploaded CSV file into database';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        set_time_limit(300);
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
}
