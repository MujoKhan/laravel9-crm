<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Email')->unique();
            $table->string('Phone');
            $table->string('Gender')->nullable();
            $table->date('DOB')->nullable();
            $table->string('Course')->nullable();
            $table->string('Address')->nullable();
            $table->string('City')->nullable();
            $table->string('State')->nullable();
            $table->string('Round_1')->nullable();
            $table->string('Round_2')->nullable();
            $table->string('Round_3')->nullable();
            $table->string('R1_Result')->nullable();
            $table->string('R2_Result')->nullable();
            $table->string('R3_Result')->nullable();
            $table->string('Call_Response')->nullable();
            $table->string('Select_Status')->nullable();
            $table->string('Data_Admin_Id')->nullable();
            $table->string('Hr_Id')->nullable();
            $table->string('Inter_Id_R1')->nullable();
            $table->string('Inter_Id_R2')->nullable();
            $table->string('Inter_Id_R3')->nullable();
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
        Schema::dropIfExists('user_data');
    }
};
