<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['title', 'description', 'location', 'job_type', 'last_date_to_apply'];

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
