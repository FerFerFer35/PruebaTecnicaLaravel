<?php

use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\IncomesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/charts', [IncomesController::class, 'chart'])->name('incomes.chart');

Route::get('/utilities', [ProviderController::class, 'summary'])->name('utilities.summary');

Route::get('utilitiesFilter', [ProviderController::class, 'filter'])->name('utilities.filter');

Route::get('/showProviders', [ProviderController::class, 'index'])->name('showProviders.index');

Route::delete('/deleteProvider/{id}', [ProviderController::class, 'destroy'])->name('provider.destroy');

Route::get('/findProvider/{id}', [ProviderController::class, 'show'])->name(('findProvider.show'));

Route::put('/providers/{provider}', [ProviderController::class, 'update'])->name('providers.update');

Route::get('createProvider', [ProviderController::class, 'create'])->name('createProvider.create');

Route::post('/providers', [ProviderController::class, 'store'])->name('providers.store');

// Incomes
Route::get('/showIncomes', [IncomesController::class, 'index'])->name('showIncomes.index');

Route::get('/findIncome/{id}', [IncomesController::class, 'show'])->name('incomes.edit');

Route::put('/updateIncome/{income}', [IncomesController::class, 'update'])->name('updateIncome.update');

Route::get('/createIncome', [IncomesController::class, 'create'])->name('createIncome.create');

Route::post('/income', [IncomesController::class, 'store'])->name('income.store');

Route::delete('/incomes/{id}', [IncomesController::class, 'destroy'])->name('incomes.destroy');

// Expenses
Route::get('/showExpenses', [ExpensesController::class, 'index'])->name('showExpenses.index');

Route::get('/findExpense/{id}', [ExpensesController::class, 'show'])->name('expenses.edit');

Route::put('/updateExpense/{expense}', [ExpensesController::class, 'update'])->name('updateExpense.update');

Route::get('/createExpense', [ExpensesController::class, 'create'])->name('createExpense.create');

Route::post('/expense', [ExpensesController::class, 'store'])->name('expense.store');

Route::delete('/expenses/{id}', [ExpensesController::class, 'destroy'])->name('expenses.destroy');
