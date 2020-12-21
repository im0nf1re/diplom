<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    public function dataKind() {
        return $this->belongsTo('App\Models\DataKind');
    }

    public function periodItems() {
        return $this->hasMany('App\Models\PeriodItem');
    }
}
