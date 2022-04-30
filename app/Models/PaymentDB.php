<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class PaymentDB extends Model
{
    use HasFactory, SearchableTrait;
    protected $prot = [];
    
    protected $searchable = [
        'columns' => [
            'pay_method.name' => 10,
            'pay_method.code' => 10,
            'pay_method.email' => 10,
        ],
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(BookingDB::class);
    }

    public function getStatusAttribute(): string
    {
        return $this->attributes['status'] == 1 ? 'Active' : 'Inactive';
    }
}