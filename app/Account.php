<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Order;

class Account extends Model
{
    protected $table = 'accounts';

    protected $fillable =[
        'user_id',
        'balance',
        'margin',
        'margin_used',
        'leverage'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','user_id');
    }

    public function order(){
        return $this->hasMany(Order::class,'user_id','user_id');
    }
}
