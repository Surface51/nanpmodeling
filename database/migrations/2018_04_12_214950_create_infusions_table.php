<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfusionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infusions', function (Blueprint $table) {
            $table->string('DataSet');
            $table->string('PubID');
            $table->string('TrialID');
            $table->string('TrtID');
            $table->string('SubjectID');
            $table->string('InfusionLocation');
            $table->string('VarName');
            $table->string('VarValue');
            $table->string('VarUnits');
            $table->string('DayofPeriodStart');
            $table->string('DayofPeriodStop');
            $table->string('TimeofDayStart');
            $table->string('TimeofDayStop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infusions');
    }
}
