<?php

namespace App\Models;

use App\Models\Branch;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'branch_id',
        'title',
        'message',
        'reviewed'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    protected static function booted()
    {
        self::addGlobalScope('branch', function ($builder) {
            if (auth()->user()?->manager  != null) {
                $builder->where('branch_id', auth()->user()->manager->branch_id);
            }
        });

        self::addGlobalScope('customer', function ($builder) {
            if (auth()->user()?->customer != null) {
                $builder->where('customer_id', auth()->user()->customer->branch_id);
            }
        });
    }
}
