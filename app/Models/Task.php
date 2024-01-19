<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'due_date', 'completed_at'];

    // Accessor for the dates of the tasks
    public function getDueDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('Y-m-d') : null;
    }

    public function getCompletedAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('Y-m-d') : null;
    }

    // Accessor for displaying due_date
    public function getDueDateDisplayAttribute($value)
    {
        return $this->attributes['due_date'] ? Carbon::parse($this->attributes['due_date'])->format('d-m-Y') : null;
    }
    // Accessor for displaying completed_at
    public function getCompletedAtDisplayAttribute($value)
    {
        return $this->attributes['completed_at'] ? Carbon::parse($this->attributes['completed_at'])->format('d-m-Y') : null;
    }
}
