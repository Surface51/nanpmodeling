<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInVitroDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_vitro_datas', function (Blueprint $table) {
            $table->string('DataSet');
            $table->integer(('PubID'));
            $table->integer('TrialID');
            $table->integer('TrtID');
            $table->integer('SubjectID');
            $table->integer('PlateID');
            $table->integer('WellID');
            $table->integer('SubTrtID');
            $table->string('Site_sample');
            $table->string('Cell_Type');
            $table->string('Day_Sample');
            $table->string('Time_Sample');
            $table->string('VarName');
            $table->string('VarValue');
            $table->string('VarUnits');
            $table->string('N');
            $table->string('SE');
            $table->string('SD');
            $table->string('VarType');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('in_vitro_datas');
    }
}
