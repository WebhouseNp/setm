<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->longtext('blog_full_description')->nullable();
            $table->string('image')->nullable();
            $table->string('blog_inner_banner')->nullable();
            $table->string('author')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('publish')->default(false);
            $table->timestamps();
        });
        DB::table('permissions')->insert([
            'name' => 'View Blog',
            'guard_name' => 'web',
            'group' => 'Blog'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Add Blog',
            'guard_name' => 'web',
            'group' => 'Blog'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit Blog',
            'guard_name' => 'web',
            'group' => 'Blog'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete Blog',
            'guard_name' => 'web',
            'group' => 'Blog'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('name', 'View Blog')->delete();
        Schema::dropIfExists('blogs');
    }
}
