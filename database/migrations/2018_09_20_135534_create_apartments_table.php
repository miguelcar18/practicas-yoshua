<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('apartments', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->string('code',45);
            $table->string('owner',255);
            $table->string('phone',45);
            $table->string('email', 100);
            $table->boolean('status')->default(1);
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
        //
        Schema::drop('apartments');
    }
}
