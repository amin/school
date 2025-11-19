<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Symfony\Component\HttpFoundation\RedirectResponse;

class OpenTaskController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Task $task): RedirectResponse
    {
        $task->completed = false;
        $task->save();
        return redirect('/dashboard');
    }
}
