<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->integer('mq');
            $table->float('latitude');
            $table->float('longitude');
            $table->tinyInteger('rooms');
            $table->tinyInteger('bathrooms');
            $table->json('images');
            $table->integer('views');
            $table->bigInteger('category_id')->unsigned()->index();
            $table->bigInteger('owner_id')->unsigned()->index();
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
        Schema::dropIfExists('apartments');
    }
}
