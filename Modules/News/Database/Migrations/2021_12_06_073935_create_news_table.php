<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('type')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('banner_image')->nullable();
            $table->boolean('publish')->default(false);
            $table->timestamps();
        });
        DB::table('permissions')->insert([
            'name' => 'View News',
            'guard_name' => 'web',
            'group' => 'News'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Add News',
            'guard_name' => 'web',
            'group' => 'News'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit News',
            'guard_name' => 'web',
            'group' => 'News'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete News',
            'guard_name' => 'web',
            'group' => 'News'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
