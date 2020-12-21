<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentKind extends Model
{
    use HasFactory;

    public function paymentNames() {
        return $this->hasMany('App\Models\PaymentName');
    }
}
