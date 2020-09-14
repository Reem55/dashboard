<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseReport extends Model
{
    use SoftDeletes;

    public $table = 'expense_reports';
}
