<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('pro_name')->unique();
            $table->string('pro_slug')->index();
            $table->integer('cate_id')->index()->default(0);
            $table->integer('pro_author_id')->default(0)->index();
            $table->string('pro_price')->default(0);
            $table->tinyInteger('pro_sale')->default(0);
            $table->tinyInteger('pro_active')->default(1)->index();
            $table->tinyInteger('pro_hot')->default(0);
            $table->integer('pro_view')->default(0);
            $table->string('pro_desc');
            $table->string('pro_content ');
            $table->string('pro_image')->nullable();
            $table->string('pro_title_seo')->nullable();
            $table->string('pro_desc_seo')->nullable();
            $table->string('pro_keyword_seo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
