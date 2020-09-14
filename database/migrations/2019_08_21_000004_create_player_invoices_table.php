<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('player_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('amount', 15, 2);
            $table->integer('invoice_number');
            $table->string('invoice_type');
            $table->date('invoice_date');
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
