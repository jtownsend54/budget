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
//        dd(Expense::ofCategory(1)->get());
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
