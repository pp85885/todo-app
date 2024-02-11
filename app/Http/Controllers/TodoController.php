<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Interface\TodoRepositoryInterface;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    private TodoRepositoryInterface $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository   =   $todoRepository;
    }

    public function index()
    {
        // $todos   =   $this->todoRepository->getAllTodos();
        $todos   =   $this->todoRepository->getAllTodosPaginate(10);

        return view('todo.index', compact('todos'));
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(TodoRequest $request)
    {
        $data = $request->except(['_token']);
        $this->todoRepository->createTodo($data);

        return redirect()->route('todo.index')->with('success', 'Todo created successfully');
    }

    public function edit($id)
    {
        $todo   =   $this->todoRepository->getTodoById($id);
        return view('todo.edit', compact('todo'));
    }

    public function update($id, TodoRequest $request)
    {
        $data = $request->except(['_token', '_method']);
        $this->todoRepository->updateTodo($id, $data);

        return redirect()->route('todo.index')->with('success', 'Todo updated successfully');
    }

    function delete($id)
    {
        $this->todoRepository->deleteTodo($id);

        return redirect()->route('todo.index')->with('success', 'Todo deleted successfully');
    }
}
