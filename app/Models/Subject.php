<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function ifns() {
        return $this->hasMany('App\Models\Ifns');
    }

    public function oktmos() {
        return $this->hasMany('App\Models\Oktmo');
    }

    public function paymentDocuments() {
        return $this->hasMany('App\Models\PaymentDocument');
    }
}
