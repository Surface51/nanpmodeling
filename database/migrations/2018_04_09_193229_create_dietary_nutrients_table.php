<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietaryNutrientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dietary_nutrients', function (Blueprint $table) {
            $table->string('DataSet');
            $table->integer('PubID');
            $table->integer('TrialID');
            $table->integer('TrtID');
            $table->string('SubjectID');
            $table->string('VarName');
            $table->string('Varvalue');
            $table->string('VarUnits');
            $table->string('N');
            $table->string('SE');
            $table->string('SD');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dietary_nutrients');
    }
}
