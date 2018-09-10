<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyDescriptorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_descriptors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref');
            $table->string('DataSet');
            $table->integer('PubID');
            $table->integer('TrialID');
            $table->string('VarName');
            $table->string('VarValue');
            $table->string('VarUnits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_descriptors');
    }
}
