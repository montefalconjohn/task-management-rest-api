<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;


class Task extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['name', 'status_id'];

    /**
     * Fetches task by ID
     *
     * @param int $id
     * @return static
     */
    public static function getTaskById(int $id): self
    {
        return self::findOrFail($id);
    }

    /**
     * Fetches trashed task by id
     *
     * @param int $id
     * @return static
     * @throws Exception
     */
    public static function getTrashedTaskById(int $id): static
    {
        try {
            $trashTask = self::onlyTrashed()->findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            throw new Exception("Task with ID {$id} does not exists", 500);
        }

        return $trashTask;
    }

    /**
     * One task only belongs to one status
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
