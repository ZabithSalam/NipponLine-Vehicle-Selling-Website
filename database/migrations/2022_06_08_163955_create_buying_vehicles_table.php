<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyingVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buying_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('seller_email');
            $table->string('seller_name');
            $table->string('seller_phone');
            $table->string('seller_fax');
            $table->string('seller_address');
            $table->foreignId('maker_id');
            $table->string('model_name');
            $table->string('model_year');
            $table->string('displasement');
            $table->string('mileage');
            $table->string('chassis_no');
            $table->string('inspection_expiry_date');
            $table->string('photos');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();

            $table->foreign('maker_id')->references('id')->on('makers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buying_vehicles');
    }
}
