<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->integer("saler_id");
            $table->integer("user_id");
            $table->integer("product_id");
            $table->integer("pieces");
            $table->double("price");
            $table->string("status")->default("s");
            $table->timestamps();

            $table->foreign("saler_id")->references("id")->on("saler")->onDelete("cascade");
            $table->foreign("user_id")->references("id")->on("user")->onDelete("cascade");
            $table->foreign("product_id")->references("id")->on("product")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
