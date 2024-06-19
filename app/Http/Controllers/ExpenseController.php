<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ExpenseController extends Controller
{
    public function create(Request $request)
    {
        try {
            $data = $request->all();
            $data['user_id'] = Auth::id();

            Expense::create($data);

            return redirect()->route('landing-page');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Bitte überprüfe deine Daten und versuche es erneut']);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $expense = Expense::findOrFail($id);
            $expense->fill($data);
            $expense->save();
            return redirect()->route('landing-page');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Bitte überprüfe deine Daten und versuche es erneut']);
        }
    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('landing-page')->with('success', 'Aufgabe erfolgreich gelöscht');
    }
}
