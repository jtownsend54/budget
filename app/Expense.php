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
    public function scopeOfCategory($query, $categoryId)
    {
        $currentBudget = Budget::current();

        $query
            ->leftJoin('budget_amounts', 'expenses.budget_amount_id', '=', 'budget_amounts.id')
            ->where('budget_amounts.budget_id', '=', $currentBudget->id)
            ->where('budget_amounts.budget_category_id', '=', $categoryId)
            ->orderBy('date_charged')
        ;
    }
}
