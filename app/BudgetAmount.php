<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BudgetAmount extends Model
{
    protected $guarded = ['id'];

    public function budgetCategory()
    {
        return $this->belongsTo(BudgetCategory::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function getTotal()
    {
        // Sum all the expenses where the budget_amount_id is less than the passed in budgetAmount
        $expenses = Expense::getRunningTotal($this);

        // Sum all the added_to_this_month and adjustment where budget_amount_id is less than or equal to the passed in
        // budgetAmount
        /** @var Collection $collection */
        $collection = self::where('id', '<=', $this->getKey())
            ->where('budget_category_id', '=', $this->budget_category_id)
            ->get();

        $available = $collection->sum('added_to_this_month');
        $adjustments = $collection->sum('adjustment');

        // Subtract expense total from added_this_month_total.
        // We should now have the total at the end of a previous budget for a specific budget_category
        return $available + $adjustments - $expenses;
    }
}
