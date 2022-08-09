<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->text('time');
            $table->longtext('name');
            $table->string('title');
            $table->string('office');
            $table->string('email');
            $table->string('contact');
            $table->string('incidentDate');
            $table->text('incidentTime');
            $table->text('location');
            $table->text('appName');
            $table->text('description');
            $table->timestamps();
        });
        DB::table('permissions')->insert([
            'name' => 'View Incident',
            'guard_name' => 'web',
            'group' => 'Incident'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Add Incident',
            'guard_name' => 'web',
            'group' => 'Incident'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit Incident',
            'guard_name' => 'web',
            'group' => 'Incident'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete Incident',
            'guard_name' => 'web',
            'group' => 'Incident'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidents');
    }
}
