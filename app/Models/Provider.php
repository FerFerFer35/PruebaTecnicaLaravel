<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provider extends Model
{
    /** @use HasFactory<\Database\Factories\ProviderFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function incomes(): HasMany
    {
        return $this->hasMany(Incomes::class);
    }

    public function expenses(): HasMany
    {
        return $this->hasMany(Expenses::class);
    }
}
