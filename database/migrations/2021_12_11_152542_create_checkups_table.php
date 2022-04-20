<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkups', function (Blueprint $table) {
            $table->id()->from(100);
            $table->foreignId('patient_id')->constrained('patients');
            $table->float('age');
            $table->date('date');
            $table->integer('case_year');
            $table->integer('case_no');
            $table->integer('case_year_full');
            $table->string('case_paper_no', 20)->unique();
            $table->string('symptoms');
            $table->string('history');
            $table->string('history_details');
            $table->float('consulting_charges');
            $table->float('medicine_charges')->default(0);
            $table->float('total_charges')->default(0);
            $table->float('medicine_days')->default(0);
            $table->date('next_appointment')->nullable();
            $table->string('pay_mode');
            $table->string('status')->default('Active');
            $table->foreignId('user_id')->nullable()->constrained('users');
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
        Schema::dropIfExists('checkups');
    }
}
