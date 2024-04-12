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
            $table->string('name');
            $table->text('detail')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('quantity')->unsigned()->default(0);
            $table->string('image1')->nullable()->default('assets/images/products/demo.jpg'); // First image field
            $table->string('image2')->nullable()->default('assets/images/products/demo.jpg'); // Second image field
            $table->string('image3')->nullable()->default('assets/images/products/demo.jpg'); // Third image field
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
