<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'task_category_id');
    }

    public static function codes()
    {
        return collect(
            [
                ['code' => 0,  'label' => 'Inprogress'],
                ['code' => 1,  'label' => 'Completed'],
                ['code' => 2,  'label' => 'Overdue'],
            ]
        );
    }
}