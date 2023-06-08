<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

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
     * One task only belongs to one status
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
