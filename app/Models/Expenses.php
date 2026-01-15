<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    /** @use HasFactory<\Database\Factories\ExpensesFactory> */
    use HasFactory;

    protected $fillable = ['provider_id', 'amount', 'concept_date', 'description'];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
