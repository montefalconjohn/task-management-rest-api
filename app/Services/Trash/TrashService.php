<?php

namespace App\Services\Trash;

use App\Models\Task;

class TrashService implements TrashServiceInterface
{
    /**
     * @inheritDoc
     */
    public function fetchDeletedTasks(): mixed
    {
        return Task::withTrashed()->get();
    }

    /**
     * @inheritDoc
     */
    public function restoreTask(int $id): void
    {
        // Fetch Task
        $
    }

    /**
     * @inheritDoc
     */
    public function deleteTaskPermanently(int $id): void
    {
        // TODO: Implement deleteTaskPermanently() method.
    }
}
