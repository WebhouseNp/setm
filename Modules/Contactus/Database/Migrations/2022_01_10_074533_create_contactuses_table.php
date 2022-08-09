<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->constrained('products');
            $table->foreignId('service_id')->nullable()->constrained('services');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_no')->nullable();
            $table->text('subject')->nullable();
            $table->string('type')->nullable();
            $table->longtext('message')->nullable();
            $table->timestamps();
        });
        DB::table('permissions')->insert([
            'name' => 'View Contactus',
            'guard_name' => 'web',
            'group' => 'Contactus'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Add Contactus',
            'guard_name' => 'web',
            'group' => 'Contactus'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit Contactus',
            'guard_name' => 'web',
            'group' => 'Contactus'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete Contactus',
            'guard_name' => 'web',
            'group' => 'Contactus'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contactuses');
    }
}
