<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bus_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('driver_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->date('start_rent_date');
            $table->integer('total_rent_days');
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
        Schema::dropIfExists('orders');
    }
}