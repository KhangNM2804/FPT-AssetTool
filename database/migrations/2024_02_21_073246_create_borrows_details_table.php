<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borrows_id');
            $table->foreign('borrows_id')->references('id')->on('borrows');
            $table->unsignedBigInteger('category_assets_id');
            $table->foreign('category_assets_id')->references('id')->on('category_assets');
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
        Schema::dropIfExists('borrows_details');
    }
}
