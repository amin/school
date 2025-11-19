<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CompleteTaskController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Task $task): RedirectResponse
    {
        $task->completed = true;
        $task->save();
        return redirect('/dashboard');
    }
}
