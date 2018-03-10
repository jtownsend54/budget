<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetAmount extends Model
{
    protected $guarded = ['id'];

    public function budgetCategory()
    {
        return $this->belongsTo(BudgetCategory::class);
    }
}
