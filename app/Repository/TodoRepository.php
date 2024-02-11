<?php

namespace App\Repository;

use App\Interface\TodoRepositoryInterface;
use App\Models\Todo;
use Symfony\Component\CssSelector\Node\FunctionNode;

class TodoRepository implements TodoRepositoryInterface
{
    public function getAllTodos()
    {
        return Todo::latest()->get();
    }

    public function getTodoById($id)
    {
        return Todo::findOrFail($id);
    }

    public function createTodo(array $data)
    {
        return Todo::create($data);
    }

    public function updateTodo($id, array $data)
    {
        return Todo::whereId($id)->update($data);
    }

    public function deleteTodo($id)
    {
        Todo::destroy($id);
    }
    public function getAllTodosPaginate($records)
    {
        return Todo::latest()->paginate($records);
    }
}
