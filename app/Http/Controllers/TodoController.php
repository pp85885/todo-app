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
        $todos   =   $this->todoRepository->getAllTodos();

        return view('todo.index', compact('todos'));
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(TodoRequest $request)
    {
        $this->todoRepository->createTodo($request);
    }
}
