<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id()->from(1000);
            $table->string('name', 100);
            $table->text('address');
            $table->string('gender', 6);
            $table->string('contact', 10);
            $table->string('email', 100)->nullable();
            $table->date('dob');
            $table->text('allergy')->nullable();
            $table->string('image', 100)->nullable();
            $table->float('balance')->default(0);
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
        Schema::dropIfExists('patients');
    }
}
