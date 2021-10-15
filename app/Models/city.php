<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    public function employ(){
    	return $this->hasMany(employ::class);
    }
    public function job(){
    	return $this->hasMany(job::class);
    }
}
