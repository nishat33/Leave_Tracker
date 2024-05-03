<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $table = "leave";

    protected $fillable = [
        'employee_name',
        'employee_username',
        'startig_date',
        'ending_date',
        'leave_type',
        'remarks',
        'status'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'employee_name', 'name');
    }


    
}
