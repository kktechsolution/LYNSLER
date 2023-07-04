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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->nullable()->constrained('orders')->onDelete('set null');
            $table->foreignId('fabric_id')->nullable()->constrained('fabrics')->onDelete('set null');
            $table->string('design_image_1')->nullable();
            $table->string('design_image_2')->nullable();
            $table->string('design_image_3')->nullable();
            $table->string('design_image_4')->nullable();
            $table->bigInteger('no_of_piece');
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
        Schema::dropIfExists('order_details');
    }
};
