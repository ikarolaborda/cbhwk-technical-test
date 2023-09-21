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
        Schema::create('turbine_components', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('turbine_id');
            $table->string('component_name');
            $table->integer('grade')->default(1); // Grades range from 1 to 5
            $table->timestamps();

            $table->foreign('turbine_id')
                ->references('id')
                ->on('turbines')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turbine_components');
    }
};
