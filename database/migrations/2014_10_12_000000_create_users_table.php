<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('roles')->insert([
            ['name' => 'Admin'],
            ['name' => 'Doctor'],
            ['name' => 'Assistance'],
            ['name' => 'Cashiers'],
            ['name' => 'Financial'],
            ['name' => 'Front Desk'],
            ['name' => 'Guests'],
            ['name' => 'Imaging'],
            ['name' => 'Laboratory'],
            ['name' => 'Managers'],
            ['name' => 'Marketing'],
            ['name' => 'Medics'],
            ['name' => 'Nurses'],
            ['name' => 'Pharmacists'],
            ['name' => 'Purchases'],
            ['name' => 'Users'],
        ]);

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('role')->constrained('roles');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
