<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employ extends Model
{
    protected $primaryKey = 'user_id';
    public function user(){
    	return $this->belongsTo(user::class);
    }
    public function city(){
        return $this->belongsTo(city::class);
    }
}
