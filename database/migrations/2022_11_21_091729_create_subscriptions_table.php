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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->mediumText('title');
            $table->string('slug');
            $table->string('token');
            $table->string('regular_price');
            $table->string('selling_price')->nullable();
            $table->mediumText('body');
            $table->string('order_number');
            $table->tinyInteger('status')->nullable()->default(0)->comment('0=disabled,1=active');
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
        Schema::dropIfExists('subscriptions');
    }
};
