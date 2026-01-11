<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $guarded = [];
    
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($project) {
            if (empty($project->slug) && !empty($project->name)) {
                $project->slug = Str::slug($project->name);
            }
        });
        
        static::updating(function ($project) {
            if ($project->isDirty('name') && empty($project->slug)) {
                $project->slug = Str::slug($project->name);
            }
        });
    }
    
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    
    public function columns()
    {
        return $this->hasMany(TaskColumn::class)->orderBy('sort_order');
    }
}
