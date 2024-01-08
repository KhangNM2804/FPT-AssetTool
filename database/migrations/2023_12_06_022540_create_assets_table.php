<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('quantity');
            $table->unsignedBigInteger('category_asset_id');
            $table->foreign('category_asset_id')->references('id')->on('category_assets');
            $table->double('price');
            $table->double('total_price');
            $table->string('document_number')->nullable();
            $table->string('envoice_number');
            $table->string('image')->nullable();
            $table->string('material_code')->nullable();
            $table->date('date_of_use')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('assets');
    }
}
