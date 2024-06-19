<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Inertia\Inertia;


class CategoryController extends Controller
{
    public function get()
    {
        $categories = Category::all();
        return Inertia::render('CreateCategoryPage', ['categories' => $categories]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return Inertia::render('CreateCategoryPage', ['error' => 'Überprüfe deine Werte und versuche es erneut.']);
        }

        Category::create($validator->validated());

        return redirect()->route('category.create.form') ->with('flash', [
            'success' => session('success'),
        ]);
    }

    public function destroy($id)
    {
    $category = Category::findOrFail($id);
    $category->delete();

    return redirect()->route('category.create.form')->with('success', 'Kategorie erfolgreich gelöscht');
    }
}
