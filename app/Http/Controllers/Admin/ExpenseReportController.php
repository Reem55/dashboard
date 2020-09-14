<?php

namespace App\Http\Controllers\Admin;

use App\Expense;
use App\Http\Controllers\Controller;
use App\Income;
use App\PlayerInvoice;
use App\Stadium;
use App\TrainerInvoice;
use Carbon\Carbon;

class ExpenseReportController extends Controller
{
    public function index()
    {
        $from = Carbon::parse(sprintf(
            '%s-%s-01',
            request()->query('y', Carbon::now()->year),
            request()->query('m', Carbon::now()->month)
        ));
        $to      = clone $from;
        $to->day = $to->daysInMonth;

        $expenses = Expense::with('expense_category')
            ->whereBetween('entry_date', [$from, $to]);

        $incomes = Income::with('income_category')
            ->whereBetween('entry_date', [$from, $to]);


        $playerSubInvoices=PlayerInvoice::where('invoice_type','!=','clothes')->whereBetween('invoice_date', [$from, $to]);
        $totalPlayerIncome=$playerSubInvoices->sum('amount');


        $playerClothesInvoices=PlayerInvoice::where('invoice_type','=','clothes')->whereBetween('invoice_date', [$from, $to]);
        $totalPlayerClothesIncome=$playerClothesInvoices->sum('amount');


        //Trainers Expenses

        $trainerExpenses=TrainerInvoice::whereBetween('invoice_date', [$from, $to]);
        $totalTrainerExpense=$trainerExpenses->sum('amount');



        //Stadiums

        $stadimusExpense=Stadium::whereBetween('invoice_date', [$from, $to]);
        $stadiumTotalExpense=$stadimusExpense->sum('amount');

        $expensesTotal   = $expenses->sum('amount');
        $incomesTotal    = $incomes->sum('amount');
        $groupedExpenses = $expenses->whereNotNull('expense_category_id')->orderBy('amount', 'desc')->get()->groupBy('expense_category_id');
        $groupedIncomes  = $incomes->whereNotNull('income_category_id')->orderBy('amount', 'desc')->get()->groupBy('income_category_id');

        $incomesTotal=$incomesTotal+$totalPlayerIncome;
        $incomesTotal=$incomesTotal+$totalPlayerClothesIncome;



        $expensesTotal=$expensesTotal+$totalTrainerExpense;
        $expensesTotal=$expensesTotal+$stadiumTotalExpense;


        $profit          = $incomesTotal - $expensesTotal;

        $expensesSummary = [];
        if($totalTrainerExpense!=0)
        {
            $expensesSummary['systemTrainers']=['amount'=>$totalTrainerExpense,'name'=>'مصروفات المدربين'];
        }

        if($stadiumTotalExpense!=0)
        {
            $expensesSummary['systemStadiums']=['amount'=>$stadiumTotalExpense,'name'=>'مصروفات الملاعب'];
        }

        foreach ($groupedExpenses as $exp) {
            foreach ($exp as $line) {
                if (!isset($expensesSummary[$line->expense_category->name])) {
                    $expensesSummary[$line->expense_category->name] = [
                        'name'   => $line->expense_category->name,
                        'amount' => 0,
                    ];
                }

                $expensesSummary[$line->expense_category->name]['amount'] += $line->amount;
            }
        }

        $incomesSummary = [];

        if($totalPlayerIncome!=0)
        {
            $incomesSummary['systemPlayers']=['amount'=>$totalPlayerIncome,'name'=>'ايرادات اشتراك اللاعبين'];
        }


        if($totalPlayerClothesIncome!=0)
        {
            $incomesSummary['systemClothesPlayers']=['amount'=>$totalPlayerClothesIncome,'name'=>'ايرادات ملابس اللاعبين'];
        }

        foreach ($groupedIncomes as $inc) {
            foreach ($inc as $line) {
                if (!isset($incomesSummary[$line->income_category->name])) {
                    $incomesSummary[$line->income_category->name] = [
                        'name'   => $line->income_category->name,
                        'amount' => 0,
                    ];
                }

                $incomesSummary[$line->income_category->name]['amount'] += $line->amount;
            }
        }

        return view('admin.expenseReports.index', compact(
            'expensesSummary',
            'incomesSummary',
            'expensesTotal',
            'incomesTotal',
            'profit'
        ));
    }
}
