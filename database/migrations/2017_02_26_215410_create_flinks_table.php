<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flinks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('weburl')->unique();
            $table->string('webname');
            $table->integer('cid');
            $table->integer('type')->default(1);
            $table->string('note')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
            $table->index('type');
            $table->index('cid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flinks');
    }
}
