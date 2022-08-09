<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('email1')->nullable();
            $table->string('email2')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('map_link')->nullable();
            $table->string('image')->nullable();
            $table->boolean('publish')->default(false);
            $table->timestamps();
        });
        DB::table('permissions')->insert([
            'name' => 'View Address',
            'guard_name' => 'web',
            'group' => 'Address'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Add Address',
            'guard_name' => 'web',
            'group' => 'Address'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit Address',
            'guard_name' => 'web',
            'group' => 'Address'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete Address',
            'guard_name' => 'web',
            'group' => 'Address'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('name', 'View Address')->delete();
        Schema::dropIfExists('addresses');
    }
}
