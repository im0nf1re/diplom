<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    use HasFactory;

    public function kbks() {
        return $this->hasMany('App\Models\Kbk');
    }

    public function paymentNames() {
        return $this->belongsToMany('App\Models\PaymentName');
    }
}
