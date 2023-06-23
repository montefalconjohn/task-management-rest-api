<?php

namespace App\Services\Tasks;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class TaskService implements TaskServiceInterface
{
    /** @var string */
    private const DEFAULT_KEYWORD = "all";

    /**
     * @inheritDoc
     */
    public function fetchTasks()
    {
        return Task::get();
    }

    /**
     * @inheritDoc
     */
    public function fetchTaskBySearchParam(string $searchParam)
    {
        // Decode search param
        $searchKeyword = $this->decodeSearchParam($searchParam);

        if ($searchKeyword === self::DEFAULT_KEYWORD) {
            $result = Task::get();
        } else {
            $result = Task::where('name', 'like', '%' . $searchKeyword . '%')->paginate(8);
        }

        return $result;
    }

    /**
     * Decodes Search Parameter
     *
     * @param string $searchParam
     * @return string
     */
    private function decodeSearchParam(string $searchParam): string
    {
        $explodedParam = explode("=", $searchParam);
        return urldecode($explodedParam[1]);
    }

    /**
     * @inheritDoc
     */
    public function createTask(StoreTaskRequest $request): Task
    {
        return Task::create([
            'name' => $request->name,
            'status_id' => 1
        ]);
    }

    /**
     * @inheritDoc
     */
    public function updateTask(UpdateTaskRequest $request, int $id): void
    {
        // Fetch task
        $task = Task::getTaskById($id);

        // Only update the affected columns
        $task->fill($request->input())->save();
    }

    /**
     * @inheritDoc
     */
    public function deleteTask(int $id): void
    {
        // Fetch task
        $task = Task::getTaskById($id);

        // Delete
        $task->delete();
    }
}
