<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $guarded = ['id'];

    /**
     * @param Builder $query
     * @param $categoryId
     */
    public function scopeOfCategory($query, $categoryId)
    {
        $currentBudget = Budget::current();

        $query
            ->where('budget_category_id', '=', $categoryId)
            ->where('budget_id', '=', $currentBudget->id)
            ->orderBy('date_charged')
        ;
    }
}
