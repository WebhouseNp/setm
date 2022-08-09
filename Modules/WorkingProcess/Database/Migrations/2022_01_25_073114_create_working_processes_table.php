<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkingProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_processes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longtext('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('publish')->default(false);
            $table->timestamps();
        });
        DB::table('permissions')->insert([
            'name' => 'View WorkingProcess',
            'guard_name' => 'web',
            'group' => 'WorkingProcess'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Add WorkingProcess',
            'guard_name' => 'web',
            'group' => 'WorkingProcess'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit WorkingProcess',
            'guard_name' => 'web',
            'group' => 'WorkingProcess'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete WorkingProcess',
            'guard_name' => 'web',
            'group' => 'WorkingProcess'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('name', 'View WorkingProcess')->delete();
        DB::table('permissions')->where('name', 'Add WorkingProcess')->delete();
        DB::table('permissions')->where('name', 'Edit WorkingProcess')->delete();
        DB::table('permissions')->where('name', 'Delete WorkingProcess')->delete();
        Schema::dropIfExists('working_processes');
    }
}
