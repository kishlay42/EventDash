<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * Define the relationship with the User model.
     *
     * A task belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Allow only these fields to be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name', 'status', 'description', 'due_date', 'priority', 'user_id'];
}