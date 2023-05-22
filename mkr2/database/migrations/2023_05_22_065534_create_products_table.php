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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name', 50);
            $table->float('price');
            $table->bigInteger('manufacturer_id')
                ->unsigned()
                ->nullable(false);
            $table->string('create_date', 50);

            $table->timestamps();

            $table->foreign('manufacturer_id')
                ->references('id')
                ->on('manufacturers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
