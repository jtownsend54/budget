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
            'budgets' => Budget::all()
        ]);
    }

    public function create()
    {
        return view('budgets.create');
    }

    public function show(Budget $budget)
    {
        return view('budgets.show', compact('budget'));
    }

    public function store()
    {
        /** @var Budget $budget */
        $budget = Budget::create(request(['name', 'start', 'end', 'bank_start']));

        foreach (BudgetCategory::all() as $budgetCategory) {
            BudgetAmount::create([
                'budget_category_id' => $budgetCategory->getKey(),
                'budget_id' => $budget->getKey()
            ]);
        }

        return redirect(route('budgets'));
    }

    public function update(Budget $budget)
    {
        $budget->update(request(['name', 'start', 'end', 'bank_start']));

        // Update all the budget amounts
        foreach (request('budget_amounts') as $key => $amount) {
            /** @var BudgetAmount $budgetAmount */
            $budgetAmount = BudgetAmount::find($key);

            $budgetAmount->update([
                'adjustment'            => $amount['adjustment'],
                'added_to_this_month'   => $amount['added_to_this_month'],
            ]);
        }

        return redirect(route('budgets'));
    }
}
