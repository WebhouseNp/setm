<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWhatwedosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatwedos', function (Blueprint $table) {
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
            'name' => 'View Whatwedo',
            'guard_name' => 'web',
            'group' => 'Whatwedo'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Add Whatwedo',
            'guard_name' => 'web',
            'group' => 'Whatwedo'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit Whatwedo',
            'guard_name' => 'web',
            'group' => 'Whatwedo'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete Whatwedo',
            'guard_name' => 'web',
            'group' => 'Whatwedo'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('name', 'View Whatwedo')->delete();
        DB::table('permissions')->where('name', 'Add Whatwedo')->delete();
        DB::table('permissions')->where('name', 'Edit Whatwedo')->delete();
        DB::table('permissions')->where('name', 'Delete Whatwedo')->delete();
        Schema::dropIfExists('whatwedos');
    }
}
