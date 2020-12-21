<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDocument extends Model
{
    use HasFactory;

    public function subject() {
        return $this->belongsTo('App\Models\Subject');
    }

    public function payer() {
        return $this->belongsTo('App\Models\Payer');
    }

    public function kbk() {
        return $this->belongsTo('App\Models\Kbk');
    }

    public function payerStatus() {
        return $this->belongsTo('App\Models\PayerStatus');
    }
}
