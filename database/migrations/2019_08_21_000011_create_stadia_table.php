<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStadiaTable extends Migration
{
    public function up()
    {
        Schema::create('stadia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('amount', 15, 2);
            $table->integer('invoice_number')->nullable();
            $table->date('invoice_date');
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
