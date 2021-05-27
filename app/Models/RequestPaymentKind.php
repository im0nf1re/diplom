<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestPaymentKind extends Model
{
    use HasFactory;

    public function paymentRequests() {
        return $this->hasMany('App\Models\PaymentRequest');
    }
}
