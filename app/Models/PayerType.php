<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayerType extends Model
{
    use HasFactory;

    public function payerStatuses() {
        return $this->hasMany('App\Models\PayerStatus');
    }

    public function paymentKinds() {
        return $this->belongsToMany('App\Models\PaymentKind');
    }

    public function paymentBases() {
        return $this->belongsToMany('App\Models\PaymentBasis');
    }
}
