<?php

namespace App\Http\Controllers;

use App\Budget;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        /** @var Budget $budget */
        $budgetId = request()->get('budget_id');
        $budget = Budget::current();

        if ($budgetId) {
            $budget = Budget::find($budgetId);
        }

        /** @var Budget $previousBudget */
        $previousBudget = $budget->previous();

        $previousAmount = $previousBudget ? $previousBudget->getRunningTotal() : 0;

        return view('dashboard', compact('budget', 'previousAmount'));
    }
}
