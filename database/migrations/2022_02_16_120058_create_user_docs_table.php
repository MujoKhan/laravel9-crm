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
        Schema::create('user_docs', function (Blueprint $table) {
            $table->id();
            $table->string('User_Id');
            $table->string('User_Photo')->nullable();
            $table->string('User_Resume')->nullable();
            $table->string('User_10_Class')->nullable();
            $table->string('User_12_Class')->nullable();
            $table->string('User_Ug_1st')->nullable();
            $table->string('User_Ug_2nd')->nullable();
            $table->string('User_Ug_3rd')->nullable();
            $table->string('User_Ug_4th')->nullable();
            $table->string('User_Ug_5th')->nullable();
            $table->string('User_Ug_6th')->nullable();
            $table->string('User_Id_Proof')->nullable();
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
        Schema::dropIfExists('user_docs');
    }
};
