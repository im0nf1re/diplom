<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ifns extends Model
{
    use HasFactory;

    public function subject() {
        return $this->belongsTo('App\Models\Subject');
    }

    public function recipient() {
        return $this->belongsTo('App\Models\Recipient');
    }
}
