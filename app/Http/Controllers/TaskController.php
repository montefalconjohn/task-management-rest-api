<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\Tasks\TaskServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaskController extends Controller
{
    /** @var TaskServiceInterface  */
    private TaskServiceInterface $taskService;

    /**
     * TaskController constructor.
     *
     * @param TaskServiceInterface $taskService
     */
    public function __construct(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return TaskResource::collection($this->taskService->fetchTasks());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTaskRequest $request
     * @return TaskResource
     */
    public function store(StoreTaskRequest $request): TaskResource
    {
        return new TaskResource($this->taskService->createTask($request));
    }

    /**
     * Fetches Task Entity by Search param
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function showTaskEntityBySearchParam(Request $request): AnonymousResourceCollection
    {
        return TaskResource::collection($this->taskService->fetchTaskBySearchParam($request->searchParam));
    }

    /**
     * Update the specified resource in storage
     *
     * @param UpdateTaskRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateTaskRequest $request, int $id): JsonResponse
    {
        $this->taskService->updateTask($request, $id);
        return response()->json('Task Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->taskService->deleteTask($id);

        // Display success message
        return response()->json('Task successfully deleted.');
    }
}
