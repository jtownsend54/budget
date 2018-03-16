<?php

namespace App\Http\Controllers;

use App\Budget;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        /** @var Budget $budget */
        $budget         = Budget::current();

        /** @var Budget $previousBudget */
        $previousBudget = Budget::previous();

        $previousAmount = $previousBudget ? $previousBudget->getRunningTotal() : 0;

        return view('dashboard', compact('budget', 'previousBudget', 'previousAmount'));
    }
}
