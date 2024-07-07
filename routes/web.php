<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Expense;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
Route::get('/', function () {
    $expenses = Expense::where('user_id', auth()->id())->paginate(10);
    $categories = Category::all();

    $expenses->getCollection()->transform(function ($expense) use ($categories) {
        $category = $categories->firstWhere('id', $expense->category_id);
        $expense->category_name = $category ? $category->name : null;
        return $expense;
    });

    return Inertia::render('Welcome', [
        'expenses' => $expenses,
        'categories' => $categories,
    ]);
})->name('landing-page');



Route::get('/info', function () {
    return Inertia::render('InfoPage');
})->name('info');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::patch('/patch/expense/{id}', [ExpenseController::class, 'update'])->name('expense.update');
    Route::delete('/delete/expense/{id}', [ExpenseController::class, 'destroy'])->name('expense.destroy');
    Route::post('/create/expense', [ExpenseController::class, 'create'])->name('expense.create');

    Route::post('/create/category', [CategoryController::class, 'create'])->name('category.create');
    Route::delete('/delete/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/create/category', [CategoryController::class, 'get'])->name('category.create.form');


    Route::get('/create/expense', function () {
        $categories = Category::all();
        return Inertia::render('CreateExpensePage', [
            'categories' => $categories,
        ]);
    })->name('expense.create.form');

    Route::get('/edit/expense/{id}', function ($id) {
        $expense = Expense::findOrFail($id);
        $categories = Category::all();

        $category = $categories->firstWhere('id', $expense->category_id);
        $expense->category_name = $category ? $category->name : null;

        return Inertia::render('EditExpensePage', [
            'expense' => $expense,
            'categories' => $categories,
        ]);
    })->name('expense.edit.form');

    Route::get('/view/{id}', function ($id) {
        $expense = Expense::findOrFail($id);
        $categories = Category::all();

        $category = $categories->firstWhere('id', $expense->category_id);
        $expense->category_name = $category ? $category->name : null;
        return Inertia::render('ViewExpensePage', [
            'expense' => $expense
        ]);
    });


});

require __DIR__.'/auth.php';
