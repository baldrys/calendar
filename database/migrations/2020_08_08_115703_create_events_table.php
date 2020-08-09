<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->string('work_type');

            $table->unsignedBigInteger('company_id')
                ->nullable(true)
                ->unsigned();
            $table->foreign('company_id')
                ->references('id')->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('employee_id')
                ->nullable(true)
                ->unsigned();
            $table->foreign('employee_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->date('date');

            $table->unsignedBigInteger('shift_id')
                ->nullable(true)
                ->unsigned();
            $table->foreign('shift_id')
                ->references('id')->on('shifts')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('events');
    }
}
