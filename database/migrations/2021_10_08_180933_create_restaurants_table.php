<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("shortName");
            $table->text("logo");
            $table->text("front_image");
            $table->string("phone");
            $table->string("address");
            $table->string("city");
            $table->string("state");
            $table->string("slogan")->nullable(true);
            $table->string("description")->nullable(true);
            $table->boolean("status")->default(true);
            $table->bigInteger("user_id");
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
        Schema::dropIfExists('restaurants');
    }
}
