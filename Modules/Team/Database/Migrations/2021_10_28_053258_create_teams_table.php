<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->text('content')->nullable();
            $table->boolean('publish')->default(false);
            $table->timestamps();
        });
        DB::table('permissions')->insert([
            'name' => 'View Team',
            'guard_name' => 'web',
            'group' => 'Team'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Add Team',
            'guard_name' => 'web',
            'group' => 'Team'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit Team',
            'guard_name' => 'web',
            'group' => 'Team'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete Team',
            'guard_name' => 'web',
            'group' => 'Team'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('name', 'View Team')->delete();
        DB::table('permissions')->where('name', 'Add Team')->delete();
        DB::table('permissions')->where('name', 'Edit Team')->delete();
        DB::table('permissions')->where('name', 'Delete Team')->delete();
        Schema::dropIfExists('teams');
    }
}
