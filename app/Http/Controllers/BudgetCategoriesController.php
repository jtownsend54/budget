<?php

namespace App\Http\Controllers;

use App\BudgetCategory;
use Illuminate\Http\Request;

class BudgetCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('budget_categories.index', [
            'budgetCategories' => BudgetCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('budget_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BudgetCategory::create(request(['name']));

        return redirect(route('budget_categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param BudgetCategory $budgetCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BudgetCategory $budgetCategory)
    {
        return view('budget_categories.show', compact('budgetCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BudgetCategory $budgetCategory
     * @return \Illuminate\Http\Response
     */
    public function update(BudgetCategory $budgetCategory)
    {
        $budgetCategory->update(request(['name']));

        return redirect(route('budgets'));
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
