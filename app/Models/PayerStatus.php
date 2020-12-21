<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayerStatus extends Model
{
    use HasFactory;

    public function paymentDucuments() {
        return $this->hasMany('App\Models\PaymentDocument');
    }

    public function payerType() {
        return $this->belongsTo('App\Models\PayerType');
    }
}
