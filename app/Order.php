<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Trades;
use App\Account;

class Order extends Model
{
    protected $fillable = [
		'user_id',
		'ticketID',
		'type',
		'pair',
		'margin',
		'total_units',
		'available_units',
		'entry_price',
		'status',
	];

	public function account(){
        return $this->belongsTo(Account::class,'user_id','user_id');
	}
	
	public function trades(){
		return $this->hasMany(Trades::class,'ticketID','ticketID');
	}
}
