<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'address2',
        'city',
        'state',
        'country',
        'status',
        'message',
        'tracking_no',
        'pincode',
    ];

    public function orderitems(){
        return $this->hasMany(OrderItem::class);
    }
}
