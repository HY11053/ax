<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('typeid');
            $table->integer('ismake');
            $table->integer('brandid')->nullable();
            $table->integer('click');
            $table->string('title');
            $table->string('bdname')->nullable();
            $table->string('flags')->nullable();
            $table->string('tags')->nullable();
            $table->integer('mid')->default(0);//文档类型
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('write');
            $table->string('editor')->nullable();
            $table->string('litpic')->nullable();
            $table->string('oldtable')->nullable();
            $table->string('oldid')->nullable();
            $table->integer('brandcid')->default(0);
            $table->integer('brandtypeid')->default(0);
            $table->smallInteger('dutyadmin');
            $table->smallInteger('editorid')->nullable();
            $table->mediumText('imagepics')->nullable();//品牌图集
            $table->text('body')->nullable();
            $table->timestamp('published_at')->nullable();//预选发布时间
            $table->timestamps();
            $table->index('click');
            $table->index('typeid');
            $table->index('brandid');
            $table->index('bdname');
            $table->index('title');
            $table->index('flags');
            $table->index('mid');
            $table->index('ismake');
            $table->index('editor');
            $table->index('litpic');
            $table->index('brandtypeid');
            $table->index('editorid');
            $table->index('brandcid');
            $table->index('oldtable');
            $table->index('oldid');
            $table->index('write');
            $table->index('dutyadmin');
            $table->index('published_at');
            $table->index('created_at');
            $table->index('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('archives');
    }
}
