<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // ✅ Allow only these fields to be mass assigned

protected $fillable = ['name', 'status', 'description', 'due_date', 'priority'];
}
