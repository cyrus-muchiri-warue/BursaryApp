<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('institution_id');
            $table->integer('yearOfStudy');
            $table->string('admission');
            $table->string('academicLevel');
            $table->string('constituency');
            $table->string('ward');
            $table->string('village');
            $table->string('gender');
            $table->string('dob');
            $table->string('parentals');
            $table->integer('ability');
            $table->integer('billed');
            $table->integer('paid');
            $table->integer('score');
            $table->integer('gross_income');
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
        Schema::dropIfExists('applications');
    }
}
