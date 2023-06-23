<?php


namespace App\Services\Tasks;


use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

interface TaskServiceInterface
{
    /**
     * Fetches all tasks
     *
     * @return mixed
     */
    public function fetchTasks(): mixed;

    /**
     * Fetches task by search param
     *
     * @param string $searchParam
     * @return mixed
     */
    public function fetchTaskBySearchParam(string $searchParam): mixed;

    /**
     * Creates Task
     *
     * @param StoreTaskRequest $request
     * @return Task
     */
    public function createTask(StoreTaskRequest $request): Task;

    /**
     * Updates specific task
     *
     * @param UpdateTaskRequest $request
     * @param int $id
     */
    public function updateTask(UpdateTaskRequest $request, int $id): void;

    /**
     * Deletes certain task
     *
     * @param int $id
     */
    public function deleteTask(int $id): void;
}
