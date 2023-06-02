<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->text('amenities');
            $table->text('title');
            $table->text('description')->nullable();
            $table->text('address');
            $table->unsignedBigInteger('area_id');
            $table->decimal('latitude',16,8);
            $table->decimal('longitude',16,8);
            $table->decimal('sq_ft',16,8)->nullable();
            $table->integer('price');
            $table->string('bhk')->nullable();
            $table->string('bathrooms')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('slug');
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
        Schema::dropIfExists('properties');
    }
}
