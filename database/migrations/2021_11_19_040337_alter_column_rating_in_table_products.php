<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnRatingInTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('pro_total_rating')->default(0)->comment('Tổng số đánh giá');
            $table->integer('pro_total_rate_number')->default(0)->comment('Tổng điểm đánh giá');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('pro_total_rating');
            $table->dropColumn('pro_total_rate_number');
        });
    }
}
