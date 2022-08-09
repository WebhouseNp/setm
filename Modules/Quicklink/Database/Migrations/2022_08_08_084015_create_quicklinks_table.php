<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuicklinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quicklinks', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('link')->nullable();
            $table->boolean('publish')->default(false);
            $table->tinyInteger('order_row')->default(0);
            $table->timestamps();
        });
        DB::table('permissions')->insert([
            'name' => 'View Quicklink',
            'guard_name' => 'web',
            'group' => 'Quicklink'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Add Quicklink',
            'guard_name' => 'web',
            'group' => 'Quicklink'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit Quicklink',
            'guard_name' => 'web',
            'group' => 'Quicklink'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete Quicklink',
            'guard_name' => 'web',
            'group' => 'Quicklink'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('name', 'View Quicklink')->delete();
        DB::table('permissions')->where('name', 'Add Quicklink')->delete();
        DB::table('permissions')->where('name', 'Edit Quicklink')->delete();
        DB::table('permissions')->where('name', 'Delete Quicklink')->delete();
        Schema::dropIfExists('quicklinks');
    }
}
