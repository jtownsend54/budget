<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at', 'date_paid', 'date_charged'];

    /**
     * @param Builder $query
     * @param $categoryId
     */
    public function scopeOfCategory($query, Budget $budget, $categoryId)
    {
        $query
            ->select('expenses.*')
            ->leftJoin('budget_amounts', 'expenses.budget_amount_id', '=', 'budget_amounts.id')
            ->where('budget_amounts.budget_id', '=', $budget->id)
            ->where('budget_amounts.budget_category_id', '=', $categoryId)
            ->orderBy('date_charged')
        ;
    }

    /**
     * @todo Might not need this function. Budget::getTotalExpenses uses relationships to figure this out
     * Get the expense total for a specific budget amount (essentially a specific budget)
     *
     * @param BudgetAmount $budgetAmount
     */
    public static function getTotal(BudgetAmount $budgetAmount)
    {
        return self::total($budgetAmount, '=');
    }

    /**
     * Get the running total of expenses for a budget amount starting with the
     * passed in budget amount and previous in the past for the same category
     *
     * @param BudgetAmount $budgetAmount
     */
    public static function getRunningTotal(BudgetAmount $budgetAmount)
    {
        return self::total($budgetAmount, '<=');
    }

    private static function total(BudgetAmount $budgetAmount, $operator)
    {
        return self::leftJoin('budget_amounts', 'budget_amounts.id', '=', 'expenses.budget_amount_id')
            ->where('expenses.budget_amount_id', $operator, $budgetAmount->getKey())
            ->where('budget_amounts.budget_category_id', '=', $budgetAmount->budget_category_id)
            ->get()
            ->sum('amount');
    }
}
