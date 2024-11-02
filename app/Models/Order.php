<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['user_id','tracking_number','username','phone',
    'email','address','status_message','payment_mode','payment_id','pin_code'];

    public function orderItems(){
        return $this->hasMany(OrderItem::class,'order_id','id');
    }
}
