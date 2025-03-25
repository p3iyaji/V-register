<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorAttendance extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'visitor_id',
        'check_in',
        'check_out',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    public function preRegister()
    {
        return $this->belongsTo(PreRegister::class);
    }
}
