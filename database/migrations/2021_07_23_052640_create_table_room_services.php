<?php

use App\Models\Room;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRoomServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_services', function (Blueprint $table) {
            $table->id('id');
            $table->integer('room_id');
            $table->integer('service_id');
            // $table->string('additional_price');
            $table->timestamps();
            // $table->foreign('room_id')->references('id')->on('rooms'); //sự ngu dốt của Cụt
            // $table->foreign('service_id')->references('id')->on('services');//nhớ để bên dưới tml ngu vl
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_services');
    }
}
