<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Budget extends Model
{
    protected $guarded = ['id'];
    public $dates = ['start', 'end'];

    public function budgetAmounts()
    {
        return $this->hasMany(BudgetAmount::class);
    }

    public function getRunningTotal()
    {
        $total = 0;

        /** @var BudgetAmount $budgetAmount */
        foreach ($this->budgetAmounts as $budgetAmount) {
            $total += $budgetAmount->getTotal();
        }

        return $total;
    }

    public function getTotalExpenses()
    {
        $total = 0;

        /** @var BudgetAmount $budgetAmount */
        foreach ($this->budgetAmounts as $budgetAmount) {
            $total += $budgetAmount->expenses->sum('amount');
        }

        return $total;
    }

    public function scopeCurrent()
    {
        return self::latest()->limit(1)->get()->first();
    }

    public static function previous()
    {
        /** @var Collection $collection */
        $collection = self::latest()->limit(2)->get();
        $collection->shift();

        return $collection->first();
    }
}
