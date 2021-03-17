<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

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

    /**
     * Creating new record for todo_lists table
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function createTodo(Request $request): JsonResponse
    {
        $html = '';
        $success = false;
        $message = 'Sorry! something went wrong while saving data.';

        $validation = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'author' => 'required|max:50',
            'date' => 'required|date',
            'list' => 'required|max:500',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validation->errors()
            ]);
        }


        // Save data
        try {
            $todo = new Todo();
            $todo->forceFill([
                'title' => $request->get('title'),
                'author' => $request->get('author'),
                'date' => $request->get('date'),
                'list' => $request->get('list')
            ]);

            if ($todo->save()) {
                $success = true;
                $message = 'Todo list created successfully!';
                $html = view('front.task1.includes._todo_table_row', ['todo' => $todo])->render();
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => $success,
                'message' => $e->getMessage()
            ]);
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
            'html' => $html
        ]);
    }

    /**
     * Update record for todo_lists table
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function updateTodo(Request $request): JsonResponse
    {
        $success = false;
        $message = 'Sorry! something went wrong while saving data.';

        $validation = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'author' => 'required|max:50',
            'date' => 'required|date',
            'list' => 'required|max:500',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => $success,
                'errors' => $validation->errors()
            ]);
        }

        // Update data
        try {
            $todo = Todo::find($request->get('id'));

            if (empty($todo)) {
                return response()->json([
                    'success' => false,
                    'message' => "TODO #{$request->get('id')} not found!"
                ]);
            }

            $todo->forceFill([
                'title' => $request->get('title'),
                'author' => $request->get('author'),
                'date' => $request->get('date'),
                'list' => $request->get('list')
            ]);

            if ($todo->update()) {
                $success = true;
                $message = 'Todo list updated successfully!';
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => $success,
                'message' => $e->getMessage()
            ]);
        }

        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }

    /**
     * Delete record for todo_lists table
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function deleteTodo(Request $request): JsonResponse
    {
        $success = false;
        $message = 'Sorry! something went wrong while saving data.';

        // Delete data
        try {
            $todo = Todo::find($request->get('id'));

            if (empty($todo)) {
                return response()->json([
                    'success' => false,
                    'message' => "TODO #{$request->get('id')} not found!"
                ]);
            }

            if ($todo->delete()) {
                $success = true;
                $message = 'Todo list deleted successfully!';
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => $success,
                'message' => $e->getMessage()
            ]);
        }

        return response()->json([
            'success' => $success,
            'message' => $message
        ]);
    }
}
