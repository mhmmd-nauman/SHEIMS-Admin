<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('country')->nullable()->default('PK');
            $table->string('region')->nullable();
            $table->string('title')->nullable();
            $table->double('latitude',14,10)->nullable();
            $table->double('longitude',14,10)->nullable();
            $table->boolean('is_division')->nullable();
            $table->boolean('is_district')->nullable();
            $table->boolean('is_tehsil')->nullable();
            $table->smallInteger('district_id')->nullable();
            $table->smallInteger('division_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
