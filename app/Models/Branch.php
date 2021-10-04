<?php

namespace App\Models;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'address',
        'phone',
        'email',
        'city'
    ];

    public function manager()
    {
        return $this->hasOne(Manager::class, 'branch_id');
    }

    public function customer()
    {
        return $this->hasMany(Customer::class, 'branch_id', 'id');
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class, 'branch_id', 'id');
    }
}
