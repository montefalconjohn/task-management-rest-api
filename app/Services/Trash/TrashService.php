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
        return Task::onlyTrashed()->get();
    }

    /**
     * @inheritDoc
     */
    public function restoreTask(int $id): void
    {
        // Fetch Task
        $trashedTask = Task::getTrashedTaskById($id);

        // Restore
        $trashedTask->restore();
    }

    /**
     * @inheritDoc
     */
    public function deleteTaskPermanently(int $id): void
    {
        // Fetch Task
        $trashedTask = Task::getTrashedTaskById($id);

        // Permanently Delete
        $trashedTask->forceDelete();
    }
}
