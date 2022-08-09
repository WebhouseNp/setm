<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('partner_link')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->longtext('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('publish')->default(false);
            $table->timestamps();
        });
        DB::table('permissions')->insert([
            'name' => 'View Partner',
            'guard_name' => 'web',
            'group' => 'Partner'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Add Partner',
            'guard_name' => 'web',
            'group' => 'Partner'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit Partner',
            'guard_name' => 'web',
            'group' => 'Partner'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete Partner',
            'guard_name' => 'web',
            'group' => 'Partner'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('name', 'View Partner')->delete();
        DB::table('permissions')->where('name', 'Add Partner')->delete();
        DB::table('permissions')->where('name', 'Edit Partner')->delete();
        DB::table('permissions')->where('name', 'Delete Partner')->delete();
        Schema::dropIfExists('partners');
    }
}
