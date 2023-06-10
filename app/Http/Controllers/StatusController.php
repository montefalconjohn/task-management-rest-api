<?php

namespace App\Http\Controllers;

use App\Http\Resources\StatusResource;
use App\Services\Statuses\StatusServiceInterface;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /** @var StatusServiceInterface  */
    private StatusServiceInterface $statusService;

    /**
     * StatusController constructor.
     *
     * @param StatusServiceInterface $statusService
     */
    public function __construct(StatusServiceInterface $statusService)
    {
        $this->statusService = $statusService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return StatusResource::collection($this->statusService->fetchStatuses());
    }
}
