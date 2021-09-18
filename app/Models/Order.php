<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'comment',
        'amount',
        'delivery',
        'phone',
        'index',

    ];

    public function firstName(){
       return explode(' ', $this->name )[1]; 
    }
    public function lastName(){
        return explode(' ', $this->name )[0]; 
    }
    public function patronymic(){
        return explode(' ', $this->name )[2]; 
    }

    public function items(){
        return $this->hasMany(OrderItem::class); 
    }
    public function total(){
        return $this->delivery + $this->amount; 
    }


    /**
     * Получить последний заказ пользователя
     */
    public function lastOrderUser($user_id){

        $order = Order::where('user_id', $user_id)->orderBy('id', 'desc')->first(); 
        return $order; 
        
    }
}
