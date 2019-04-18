<?php

namespace App\Http\Controllers;

use App\Budget;
use App\BudgetAmount;
use App\BudgetCategory;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index()
    {
        return view('budgets.index', [
            'budgets' => Budget::all()->sortByDesc('id')
        ]);
    }

    public function create()
    {
        return view('budgets.create');
    }

    public function show(Budget $budget)
    {
        /** @var Budget $previousBudget */
        $previousBudget = $budget->previous();

        $previousAmount = $previousBudget ? $previousBudget->getRunningTotal() : 0;

        return view('budgets.show', compact('budget', 'previousAmount', 'previousBudget'));
    }

    public function store()
    {
        /** @var Budget $budget */
        $budget = Budget::create(request(['name', 'start', 'end', 'bank_start', 'projected_income']));

        foreach (BudgetCategory::all() as $budgetCategory) {
            BudgetAmount::create([
                'budget_category_id' => $budgetCategory->getKey(),
                'budget_id' => $budget->getKey()
            ]);
        }

        return redirect(route('budget_update', ['budget' => $budget]));
    }

    public function update(Budget $budget)
    {
        $budget->update(request(['name', 'start', 'end', 'bank_start', 'projected_income']));

        // Update all the budget amounts
        foreach (request('budget_amounts') as $key => $amount) {
            /** @var BudgetAmount $budgetAmount */
            $budgetAmount = BudgetAmount::find($key);

            $budgetAmount->update([
                'adjustment'            => $amount['adjustment'],
                'added_to_this_month'   => $amount['added_to_this_month'],
            ]);
        }

        return redirect(route('budget_update', ['budget' => $budget]));
    }
}
