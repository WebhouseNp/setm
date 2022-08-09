<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();

            // SEO DETAILS
            $table->text('title');
            $table->longText('description')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();

            // SOCIAL MEDIA LINKS:
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('whatsapp')->nullable();
            $table->text('youtube')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('messanger')->nullable();
            $table->text('skype')->nullable();
            $table->text('viber')->nullable();
            $table->string('video')->nullable();

            // ADDRESS & CONTACT INFO:
            $table->text('email1')->nullable();
            $table->text('email2')->nullable();
            $table->text('contact1')->nullable();
            $table->text('contact2')->nullable();
            $table->text('address')->nullable();
            $table->text('map')->nullable();

            //Counter
            $table->string('title1')->default(0);
            $table->string('title2')->default(0);
            $table->string('title3')->default(0);
            $table->string('title4')->default(0);


            //AboutUS
            $table->string('about_title')->nullable();
            $table->text('about_description')->nullable();
            $table->string('about_image1')->nullable();
            $table->string('about_image2')->nullable();
            $table->string('about_image3')->nullable();
            $table->string('about_image4')->nullable();

            //Sustainable developement (sd)
            $table->text('sd_description')->nullable();
            $table->string('sd_image1')->nullable();
            $table->string('sd_image2')->nullable();


            //Page Banners
            $table->string('fav_icon')->nullable();
            $table->string('header_logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('contactus_banner_image')->nullable();
            $table->string('whoweare_banner_image')->nullable();
            $table->string('whatweserve_banner_image')->nullable();
            $table->string('whatwedo_banner_image')->nullable();
            $table->string('ouractivities_banner_image')->nullable();
            $table->string('news_banner_image')->nullable();

            // Page Subtitles
            $table->text('whatwedo_subtitle')->nullable();
            $table->text('ouractivities_subtitle')->nullable();




            $table->timestamps();
        });
        DB::table('permissions')->insert([
            'name' => 'View SiteInfo',
            'guard_name' => 'web',
            'group' => 'Site'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('name', 'View SiteInfo')->delete();
        Schema::dropIfExists('sites');
    }
}
