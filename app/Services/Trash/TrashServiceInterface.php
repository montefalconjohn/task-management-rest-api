<?php

namespace App\Services\Trash;

interface TrashServiceInterface
{
    /**
     * Fetches all deleted Tasks
     *
     * @return mixed
     */
    public function fetchDeletedTasks(): mixed;

    /**
     * Restore task by ID
     *
     * @param int $id
     * @return void
     */
    public function restoreTask(int $id): void;

    /**
     * Deletes a specific task permanently by id
     *
     * @param int $id
     * @return void
     */
    public function deleteTaskPermanently(int $id): void;
}
