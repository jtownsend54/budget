<?php

namespace App\Http\Controllers;

use App\Budget;
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
        Budget::create(request(['name', 'start', 'end', 'from_last_month', 'added_this_month']));

        return redirect(route('budgets'));
    }

    public function update(Budget $budget)
    {
        $budget->update(request(['name', 'start', 'end', 'from_last_month', 'added_this_month']));

        return redirect(route('budgets'));
    }
}
