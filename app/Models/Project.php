<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];
    //
    public function columns()
    {
        return $this->hasMany(TaskColumn::class)->orderBy('sort_order');
    }
}
