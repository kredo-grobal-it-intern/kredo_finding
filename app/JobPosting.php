<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class JobPosting extends Model
{
    public function companyUser()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function toJobId()
    {
        return $this->hasMany('App\WorkerReaction', 'to_job_id', 'id');
    }

    public function isLiked()
    {
        return $this->toJobId()->where('from_worker_id', Auth::user()->id)->exists();
    }
}
