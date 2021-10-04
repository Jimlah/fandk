<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'branch_id',
        'firstname',
        'lastname',
        'phone',
        'address',
        'city',
        'state',
        'photo',
    ];


    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    protected static function booted()
    {
        self::addGlobalScope('branch', function ($builder) {
            if (auth()->user()->manager  != null) {
                $builder->where('branch_id', auth()->user()->manager->branch_id);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }
}
