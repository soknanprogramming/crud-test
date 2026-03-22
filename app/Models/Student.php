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

    public function scopeGender($query, $gender)
    {
        return $query->when($gender != 'all', function ($q) use ($gender) {
            $q->where('gender', $gender);
        });
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            $q->where(function ($query) use ($search) {
                $query->orWhere('first_name', 'ilike', "%$search%")
                    ->orWhere('last_name', 'ilike', "%$search%")
                    ->orWhere('email', 'ilike', "%$search%")
                    ->orWhere('phone', 'ilike', "%$search%")
                    ->orWhere('address', 'ilike', "%$search%")
                    ->orWhere('gender', 'ilike', "%$search%")
                    ->orWhere('dob', 'ilike', "%$search%");
            });
        });
    }

    use HasFactory;
}
