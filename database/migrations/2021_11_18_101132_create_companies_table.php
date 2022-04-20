<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('doctor_name', 100)->nullable();
            $table->string('doctor_degree', 100)->nullable();
            $table->string('opd_spl', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('mobile', 10)->nullable();
            $table->string('alt_mobile', 10)->nullable();
            $table->string('landline', 20)->nullable();
            $table->string('gstin', 20)->nullable();
            $table->string('address')->nullable();
            $table->string('logo')->nullable();
            $table->string('status')->nullable();
            $table->date('expiry_date')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
