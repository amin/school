<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DeleteTaskController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Task $task): RedirectResponse
    {
        $task->delete();
        return redirect('/dashboard');
    }
}
