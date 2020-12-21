<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodItem extends Model
{
    use HasFactory;

    public function period() {
        return $this->belongsTo('App\Models\Period');
    }
}
