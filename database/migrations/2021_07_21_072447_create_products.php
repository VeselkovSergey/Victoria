<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
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
            $table->string('title')->comment('Название продукта');
            $table->integer('category_id')->comment('id категории');
            $table->string('modification_id')->comment('id модификации');
            $table->longText('description')->comment('Описание продукта');
            $table->string('img')->comment('Файлы картинки');
            $table->string('semantic_url')->comment('Семантический URL');
            $table->integer('active')->comment('Активный ли продукт');
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
