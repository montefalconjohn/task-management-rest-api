<?php


namespace App\Services;


use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class TaskService implements TaskServiceInterface
{
    public function fetchTasks()
    {
        // TODO: Implement fetchTasks() method.
    }

    public function fetchTaskBySearchParam(string $searchParam)
    {
        // TODO: Implement fetchTaskBySearchParam() method.
    }

    public function createTask(StoreTaskRequest $request): Task
    {
        // TODO: Implement createTask() method.
    }

    public function updateTask(UpdateTaskRequest $request, int $id): void
    {
        // TODO: Implement updateTask() method.
    }

    public function deleteTask(int $id): void
    {
        // TODO: Implement deleteTask() method.
    }

}
