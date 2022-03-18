<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSowatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sowaters', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('avatar_hover')->nullable();
            $table->integer('priority')->nullable();
            $table->integer('on_column')->nullable();
            $table->integer('show_homepage')->default(0);
            $table->integer('status')->default(0);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('sowaters');
    }
}
