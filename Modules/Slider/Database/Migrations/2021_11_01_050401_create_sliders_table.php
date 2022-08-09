<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('slider_title')->nullable();
            $table->text('slider_description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('publish')->default(false);
            $table->timestamps();
        });
        DB::table('permissions')->insert([
            'name' => 'View Slider',
            'guard_name' => 'web',
            'group' => 'Slider'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Add Slider',
            'guard_name' => 'web',
            'group' => 'Slider'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit Slider',
            'guard_name' => 'web',
            'group' => 'Slider'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete Slider',
            'guard_name' => 'web',
            'group' => 'Slider'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('name', 'View Slider')->delete();
        DB::table('permissions')->where('name', 'Add Slider')->delete();
        DB::table('permissions')->where('name', 'Edit Slider')->delete();
        DB::table('permissions')->where('name', 'Delete Slider')->delete();
        Schema::dropIfExists('sliders');
    }
}
