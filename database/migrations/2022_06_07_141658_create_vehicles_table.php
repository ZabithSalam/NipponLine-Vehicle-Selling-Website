<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string("vehicle_name");
            $table->string("vehicle_price");
            $table->string("vehicle_model_year");
            $table->foreignId("vehicle_maker_id");
            $table->string("vehicle_displacement");
            $table->string("vehicle_Mileage");
            $table->string("vehicle_inspection");
            $table->text("vehicle_repire_history");
            $table->string("vehicle_body_color");
            $table->string("vehicle_riding_capacity");
            $table->string("vehicle_transmission");
            $table->string("vehicle_legal_inspection");
            $table->string("vehicle_guarantee");
            $table->string("vehicle_registered_un_used");
            $table->string("vehicle_recycling_deposite");
            $table->string("vehicle_import_route");
            $table->string("vehicle_body_type");
            $table->string("vehicle_steering");
            $table->string("vehicle_chassis_no");
            $table->string("vehicle_engine_type");
            $table->string("vehicle_no_of_doors");
            $table->string("vehicle_wheight");
            $table->string("vehicle_body_dimension");
            $table->string("vehicle_type");
            $table->text("description");
            $table->string("use");
            $table->string("vehicle_image");
            $table->timestamps();

            $table->foreign('vehicle_maker_id')->references('id')->on('makers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
