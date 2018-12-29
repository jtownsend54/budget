<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Income;
use Illuminate\Http\Request;

class IncomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('incomes.index', [
            'incomes' => Income::all()->sortByDesc('created_at')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incomes.create', [
            'budgets' => Budget::all()->sortByDesc('created_at')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Income::create(request(['budget_id', 'amount', 'source']));

        return redirect(route('incomes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        $budgets = Budget::all()->sortByDesc('created_at');

        return view('incomes.show', compact('income', 'budgets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Income $income)
    {
        $income->update(request(['budget_id', 'amount', 'source']));

        return redirect(route('incomes'));
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
