<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->tinyInteger('priority')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('madeBy');
            $table->unsignedBigInteger('developer')->nullable();
            $table->longText('remark')->nullable();
            $table->longText('URL');
            $table->string('photo')->nullable();
            $table->tinyInteger('type');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('madeBy')->references('id')->on('users');
            $table->foreign('developer')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
