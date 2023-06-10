<?php


namespace App\Services\Statuses;


use App\Models\Status;

class StatusService implements StatusServiceInterface
{
    /***
     * @inheritDoc
     */
    public function fetchStatuses()
    {
        return Status::get();
    }
}
