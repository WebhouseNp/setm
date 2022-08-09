<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('icon')->nullable();
            $table->boolean('publish')->default(false);
            $table->timestamps();
        });
        DB::table('permissions')->insert([
            'name' => 'View Client',
            'guard_name' => 'web',
            'group' => 'Client'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Add Client',
            'guard_name' => 'web',
            'group' => 'Client'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit Client',
            'guard_name' => 'web',
            'group' => 'Client'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete Client',
            'guard_name' => 'web',
            'group' => 'Client'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
