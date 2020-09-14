<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainerInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('trainer_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('amount', 15, 2);
            $table->integer('invoice_number')->nullable();
            $table->longText('notes')->nullable();
            $table->date('invoice_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
