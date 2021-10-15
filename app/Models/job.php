<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    public function user(){
    	return $this->belongsTo(user::class);
    }
    public function city(){
        return $this->belongsTo(city::class);
    }
    public function catagory(){
        return $this->belongsTo(catagory::class);
    }
}
