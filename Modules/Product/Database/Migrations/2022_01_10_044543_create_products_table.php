<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->longtext('product_full_description')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->string('product_detail_banner')->nullable();
            $table->string('video')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->boolean('publish')->default(false);
            $table->timestamps();
        });
        DB::table('permissions')->insert([
            'name' => 'View Product',
            'guard_name' => 'web',
            'group' => 'Product'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Add Product',
            'guard_name' => 'web',
            'group' => 'Product'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Edit Product',
            'guard_name' => 'web',
            'group' => 'Product'
        ]);
        DB::table('permissions')->insert([
            'name' => 'Delete Product',
            'guard_name' => 'web',
            'group' => 'Product'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('name', 'View Product')->delete();
        Schema::dropIfExists('products');
    }
}
