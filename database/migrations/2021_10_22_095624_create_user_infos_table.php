<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            // Creiamo colonna per foreign
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('address', 30);
            $table->string('phone', 15);
            $table->string('city', 25);
            $table->string('country', 25);
            $table->string('zip_code', 5);
            $table->timestamps();

            // creiamo vincolo con foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}
