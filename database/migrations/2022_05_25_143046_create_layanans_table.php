<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode', $precision = 20);
            $table->string('nama', $precision = 50);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->decimal('harga', $precision = 20)->nullable();
            $table->decimal('harga_member', $precision = 20)->nullable();
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
        Schema::dropIfExists('layanans');
    }
}
