<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentBasis extends Model
{
    use HasFactory;

    public function dataKinds() {
        return $this->belongsToMany('App\Models\DataKind');
    }
}
