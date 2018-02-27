<?php

namespace App\Http\Controllers;

use App\Budget;
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
            'categories' => BudgetCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param BudgetCategory $budgetCategory
     * @return \Illuminate\Http\Response
     */
    public function create(BudgetCategory $budgetCategory)
    {
        $categories = BudgetCategory::all();

        return view('expenses.create', compact('budgetCategory','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $currentBudget = Budget::current();
        $values = request(['budget_category_id', 'amount', 'source', 'date_charged', 'date_paid']);

        Expense::create([
            'budget_category_id'    => $values['budget_category_id'],
            'amount'                => $values['amount'],
            'source'                => $values['source'],
            'date_charged'          => $values['date_charged'],
            'date_paid'             => $values['date_paid'],
            'budget_id'             => $currentBudget->id,
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
        $categories = BudgetCategory::all();

        return view('expenses.show', compact('expense', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Expense $expense)
    {
        $expense->update(request(['budget_category_id', 'amount', 'source', 'date_charged', 'date_paid']));

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
