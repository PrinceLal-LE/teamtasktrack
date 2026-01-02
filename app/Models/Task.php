<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $guarded = [];

    
    public function column()
    {
        return $this->belongsTo(TaskColumn::class, 'task_column_id');
    }
}
