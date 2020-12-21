<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKind extends Model
{
    use HasFactory;

    public function paymentBases() {
        return $this->belongsToMany('App\Models\PaymentBasis');
    }

    public function periods() {
        return $this->hasMany('App\Models\Period');
    }
}
