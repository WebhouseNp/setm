<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('short_description')->nullable();
            $table->longtext('description')->nullable();
            $table->string('image')->nullable();
            $table->string('banner_image')->nullable();
            $table->boolean('publish')->default(false);
            $table->timestamps();
        });
        DB::table('permissions')->insert([
            'name' => 'View Activity',
            'guard_name' => 'web',
            'group' => 'Activity'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Add Activity',
            'guard_name' => 'web',
            'group' => 'Activity'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit Activity',
            'guard_name' => 'web',
            'group' => 'Activity'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete Activity',
            'guard_name' => 'web',
            'group' => 'Activity'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('name', 'View Activity')->delete();
        DB::table('permissions')->where('name', 'Add Activity')->delete();
        DB::table('permissions')->where('name', 'Edit Activity')->delete();
        DB::table('permissions')->where('name', 'Delete Activity')->delete();
        Schema::dropIfExists('activities');
    }
}
