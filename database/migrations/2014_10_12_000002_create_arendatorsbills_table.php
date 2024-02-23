<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('arendatorsbills', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('arendator_id')->comment("Идентификатор арендатора");
            $table->foreignUuid('bill_id')->comment("Идентификатор счёта");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arendatorsbills');
    }
};