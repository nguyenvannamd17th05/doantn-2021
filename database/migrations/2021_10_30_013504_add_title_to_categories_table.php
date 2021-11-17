<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('c_avatar')->nullable();
            $table->string('c_title_seo')->nullable();
            $table->string('c_desc_seo')->nullable();
            $table->string('c_keyword_seo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('c_avatar');
            $table->dropColumn('c_title_seo');
            $table->dropColumn('c_desc_seo');
            $table->dropColumn('c_keyword_seo');
        });
    }
}
