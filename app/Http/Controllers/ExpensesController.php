<?php

namespace App\Http\Controllers;

use App\Budget;
use App\BudgetAmount;
use App\BudgetCategory;
use App\Expense;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expenses.index', [
            'budgetAmounts' => Budget::current()->budgetAmounts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param BudgetAmount $budgetAmount
     * @return \Illuminate\Http\Response
     */
    public function create(BudgetAmount $budgetAmount)
    {
        /** @var Budget $currentBudget */
        $currentBudget = Budget::current();
        $budgetAmounts = $currentBudget->budgetAmounts;

        return view('expenses.create', compact('budgetAmount','budgetAmounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $values = request(['budget_amount_id', 'amount', 'source', 'date_charged', 'date_paid']);

        Expense::create([
            'budget_amount_id'  => $values['budget_amount_id'],
            'amount'            => $values['amount'],
            'source'            => $values['source'],
            'date_charged'      => $values['date_charged'],
            'date_paid'         => $values['date_paid'],
        ]);

        return redirect(route('expenses'));
    }

    /**
     * Display the specified resource.
     *
     * @param Expense $expense
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Expense $expense)
    {
        /** @var Budget $currentBudget */
        $currentBudget = Budget::current();
        $budgetAmounts = $currentBudget->budgetAmounts;

        return view('expenses.show', compact('expense', 'budgetAmounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Expense $expense)
    {
        $expense->update(request(['budget_amount_id', 'amount', 'source', 'date_charged', 'date_paid']));

        return redirect(route('expenses'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
