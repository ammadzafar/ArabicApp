<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecordingRule extends Model
{
    protected $guarded=[];
    public function recording()
    {
        $this->belongsTo(StudentEnrollment::class);
    }
}
