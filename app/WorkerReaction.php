<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkerReaction extends Model
{
    public function toJobId()
    {
        return $this->belongsTo('App\JobPosting', 'to_job_id', 'id');
    }

    public function fromWorkerId()
    {
        return $this->belongsTo('App\User', 'from_worker_id', 'id');
    }
}
