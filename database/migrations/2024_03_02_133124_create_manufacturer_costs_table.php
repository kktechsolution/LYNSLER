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
        Schema::create('manufacturer_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manufacturer_id')->constrained('users')->onDelete('cascade');
            $table->string('style_name');
            $table->string('size');
            $table->decimal('manufacuturing_cost');
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
        Schema::dropIfExists('manufacturer_costs');
    }
};
