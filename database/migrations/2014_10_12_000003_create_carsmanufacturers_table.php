<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carsmanufacturers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->comment("Название производителя машины");
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('carsmanufacturers', function (Blueprint $table) {
            $table->foreignUuid('manufacturer_id')->nullable()->references('id')->on('carsmarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carsmanufacturers');
    }
};
