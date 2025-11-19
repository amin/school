<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CreateTaskController extends Controller
{
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'description' => ['required', 'string', 'min:10']
        ]);

        $task = new Task();
        $task->description = $request->description;
        $task->user_id = Auth::id();
        $task->save();
        return redirect('/dashboard');
    }
}
