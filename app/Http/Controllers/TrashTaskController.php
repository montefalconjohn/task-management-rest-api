<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Services\Trash\TrashServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TrashTaskController extends Controller
{
    /** @var TrashServiceInterface */
    private $trashService;

    /**
     * TrashTaskController constructor.
     *
     * @param TrashServiceInterface $trashService
     */
    public function __construct(TrashServiceInterface $trashService)
    {
        $this->trashService = $trashService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return TaskResource::collection($this->trashService->fetchDeletedTasks());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(int $id): JsonResponse
    {
        $this->trashService->restoreTask($id);
        return response()->json('Task Restored.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $this->trashService->deleteTaskPermanently($id);
        return response()->json('Task deleted permanently.');
    }
}
