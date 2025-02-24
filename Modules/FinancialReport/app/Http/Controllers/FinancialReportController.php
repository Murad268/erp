<?php

namespace Modules\FinancialReport\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Expense\Repositories\ExpenseRepository;
use Modules\Income\Repositories\IncomeRepository;
use Carbon\Carbon;

class FinancialReportController extends Controller
{
    public function __construct(public IncomeRepository $incomeRepository, public ExpenseRepository $expenseRepository)
    {
    }

    public function index()
    {
        $incomes = $this->incomeRepository->all();
        $expenses = $this->expenseRepository->all();

        // Tarix üzrə qruplaşdırma və hesabatların yaradılması
        $reports = collect();

        $allDates = $incomes->pluck('date')->merge($expenses->pluck('date'))->unique()->sort();

        foreach ($allDates as $date) {
            $dateIncomes = $incomes->where('date', $date)->sum('amount');
            $dateExpenses = $expenses->where('date', $date)->sum('amount');
            $balance = $dateIncomes - $dateExpenses;

            $reports->push((object) [
                'date' => $date,
                'income' => $dateIncomes,
                'expense' => $dateExpenses,
                'balance' => $balance,
            ]);
        }

        return view('financialreport::index', compact('reports'));
    }
}
