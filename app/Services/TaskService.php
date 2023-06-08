<?php


namespace App\Services;


use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class TaskService implements TaskServiceInterface
{
    public function fetchTasks()
    {
        return Task::paginate(8);
    }

    public function fetchTaskBySearchParam(string $searchParam)
    {
        // TODO: Implement fetchTaskBySearchParam() method.
    }

    public function createTask(StoreTaskRequest $request): Task
    {
        return Task::create([
            'name' => $request->name,
            'status_id' => $request->status
        ]);
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
