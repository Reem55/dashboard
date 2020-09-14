<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPlayerInvoicesTable extends Migration
{
    public function up()
    {
        Schema::table('player_invoices', function (Blueprint $table) {
            $table->unsignedInteger('palyer_id');
            $table->foreign('palyer_id', 'palyer_fk_254995')->references('id')->on('players');
        });
    }
}
