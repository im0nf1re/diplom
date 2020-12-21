<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    use HasFactory;

    public function bank() {
        return $this->belongsTo('App\Models\Bank');
    }

    public function ifns() {
        return $this->hasMany('App\Models\Ifns');
    }
}
