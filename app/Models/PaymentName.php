<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentName extends Model
{
    use HasFactory;

    public function paymentKind() {
        return $this->belongsTo('App\Models\PaymentKind');
    }

    public function kbks() {
        return $this->hasMany('App\Models\Kbk');
    }

    public function paymentTypes() {
        return $this->belongsToMany('App\Models\PaymentType');
    }
}
