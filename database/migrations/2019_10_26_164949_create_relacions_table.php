<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('company')->create('relacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cantidad');
            $table->unsignedInteger('vehiculo_id');
            $table->unsignedInteger('autoparte_id');
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
        Schema::connection('company')->dropIfExists('relacions');
    }
}
