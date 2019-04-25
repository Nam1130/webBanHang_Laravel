<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
       $table->increments('id');
       $table->string('name',200);
       $table->integer('id_type')->unsigned();
      $table->integer('qty')->unsigned();
       $table->string('description',200);
       $table->float('unit_price');
       $table->float('promotion_price');
       $table->string('image');
       $table->string('unit');
       $table->string('new');
       $table->date('updated_at');
       $table->date('created_at');

       $table->foreign('id_type')
       ->references('id')
       ->on('type_products')
       ->onDelete('cascade');
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
