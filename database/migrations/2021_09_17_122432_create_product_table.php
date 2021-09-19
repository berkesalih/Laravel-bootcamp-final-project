<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("props");
            $table->integer("discount");
            $table->integer("stock");
            $table->double("price");
            $table->double("rating");
            $table->integer("like");
            $table->integer("view_count");
            $table->integer("saler_id");
            $table->integer("sc_id");
            $table->foreign("saler_id")->references("id")->on("saler")->onDelete("cascade");
            $table->foreign("sc_id")->references("id")->on("subcategory")->onDelete("cascade");

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
        Schema::dropIfExists('product');
    }
}
