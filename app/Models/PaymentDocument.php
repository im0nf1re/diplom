<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDocument extends Model
{
    use HasFactory;

    public function kbk() {
        return $this->belongsTo('App\Models\Kbk');
    }

    public function payerStatus() {
        return $this->belongsTo('App\Models\PayerStatus');
    }

    public function oktmo() {
        return $this->belongsTo('App\Models\Oktmo');
    }

    public function ifns() {
        return $this->belongsTo('App\Models\Ifns');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
