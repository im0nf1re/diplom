<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kbk extends Model
{
    use HasFactory;

    public function paymentName() {
        return $this->belongsTo('App\Models\PaymentName');
    }

    public function paymentType() {
        return $this->belongsTo('App\Models\PaymentType');
    }
}
