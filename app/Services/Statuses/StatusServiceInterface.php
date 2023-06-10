<?php


namespace App\Services\Statuses;


interface StatusServiceInterface
{
    /**
     * Fetches all statuses
     *
     * @return mixed
     */
    public function fetchStatuses();
}
