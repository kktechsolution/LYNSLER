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
        Schema::create('ecommerce_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('user_address_id')->nullable()->constrained('user_addresses')->onDelete('set null');
            $table->decimal('amount');
            $table->enum('payment_type',['COD','ONLINE'])->default('COD');
            $table->enum('payment_status',['pending','compeleted'])->default('pending');
            $table->enum('order_status',['pending','on_the_way','delivered','canceled','in_return','returned'])->default('pending');
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
        Schema::dropIfExists('ecommerce_orders');
    }
};
