<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trades extends Model
{
    protected $fillable = [
		'ticketID',
		'units',
		'exit_price',
		'cost',
		'profit',
    ];
    
    public function order(){
        return $this->belongsTo(Order::class,'ticketID','ticketID');
    }
}
