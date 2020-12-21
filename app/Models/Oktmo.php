<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oktmo extends Model
{
    use HasFactory;

    public function subject() {
        return $this->belongsTo('App\Models\Subject');
    }

    public function paymentDocuments() {
        return $this->hasMany('App\Models\PaymentDocument');
    }
}
