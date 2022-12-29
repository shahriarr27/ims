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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->text('address1')->nullable();
            $table->string('gender')->nullable()->comment('1=male,2=female');
            $table->string('chapter')->nullable();
            $table->tinyInteger('membership_number')->nullable();
            $table->string('id_card_number')->nullable();
            $table->string('profession')->nullable();
            $table->string('cv')->nullable();
            $table->text('address2')->nullable();
            $table->string('phone2')->nullable();
            $table->string('constituency')->nullable();
            $table->tinyInteger('status')->default('0')->comment('0=pending 1=approved');
            // $table->timestamps();
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