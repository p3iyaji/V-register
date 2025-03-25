<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'email',
        'phone',
        'gender',
        'company_name',
        'national_id_no',
        'purpose',
        'address',
        'image',
        'user_id',
        'employee_id',
        'check_in',
        'check_out',
        'status',
        'approved_by',
        'type',
        'expected_date',
        'expected_time',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    
}
