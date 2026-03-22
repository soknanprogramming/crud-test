<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'image',
        'gender',
        'dob',
        'email',
        'phone',
        'address'
    ];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->dob)->age;
    }

    use HasFactory;
}
