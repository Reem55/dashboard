<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTrainerInvoicesTable extends Migration
{
    public function up()
    {
        Schema::table('trainer_invoices', function (Blueprint $table) {
            $table->unsignedInteger('trainer_id');
            $table->foreign('trainer_id', 'trainer_fk_255012')->references('id')->on('trainers');
        });
    }
}
