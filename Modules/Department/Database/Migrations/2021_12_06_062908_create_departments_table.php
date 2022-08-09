<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('link');
            $table->string('icon')->nullable();
            $table->text('description');
            $table->string('image')->nullable();
            $table->boolean('publish')->default(false);
            $table->timestamps();
        });
        DB::table('permissions')->insert([
            'name' => 'View Associated',
            'guard_name' => 'web',
            'group' => 'Associated'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Add Associated',
            'guard_name' => 'web',
            'group' => 'Associated'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit Associated',
            'guard_name' => 'web',
            'group' => 'Associated'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete Associated',
            'guard_name' => 'web',
            'group' => 'Associated'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('name', 'View Department')->delete();
        Schema::dropIfExists('departments');
    }
}
