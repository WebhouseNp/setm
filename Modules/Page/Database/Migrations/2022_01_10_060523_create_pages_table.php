<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->longtext('page_full_description')->nullable();
            $table->string('image')->nullable();
            $table->string('page_banner')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('publish')->default(false);
            $table->timestamps();
        });
        DB::table('permissions')->insert([
            'name' => 'View Page',
            'guard_name' => 'web',
            'group' => 'Page'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Add Page',
            'guard_name' => 'web',
            'group' => 'Page'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit Page',
            'guard_name' => 'web',
            'group' => 'Page'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete Page',
            'guard_name' => 'web',
            'group' => 'Page'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
