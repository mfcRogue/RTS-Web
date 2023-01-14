<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLobbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lobbies', function (Blueprint $table) {
            $table->id();
            $table->string('LobbyName', 255)->nullable();
            $table->string('HostName')->nullable();
            $table->enum('Visibility', ["public","private","locked","friends"])->nullable();
            $table->ipAddress('HostIP')->nullable();
            $table->integer('CurrentPlayers')->nullable();
            $table->integer('MaxPlayers')->nullable();
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
        Schema::dropIfExists('lobbies');
    }
}
