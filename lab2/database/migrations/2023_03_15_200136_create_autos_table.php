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
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name', 50);
            $table->string('brand', 100);
            $table->string('car_number', 20);
            $table->string('color', 50);

            $table->BigInteger('dps_id')
                ->unsigned()
                ->nullable(false);

            $table->timestamps();

            $table->foreign('dps_id')
                ->references ('id')
                ->on('_d_p_s');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};
