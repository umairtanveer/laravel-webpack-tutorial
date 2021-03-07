<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class Task1Controller extends Controller
{
    /**
     * Load/Render blade file for task 1
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $todoList = Todo::all();
        return view('front.task1.index',
            compact('todoList')
        );
    }
}
