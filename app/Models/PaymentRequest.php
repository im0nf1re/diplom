<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    use HasFactory;

    public static function sumToString($value)
    {
        $value = explode('.', number_format($value, 2, '.', ''));

        $f = new \NumberFormatter('ru', \NumberFormatter::SPELLOUT);
        $str = $f->format($value[0]);

        // Первую букву в верхний регистр.
        $str = mb_strtoupper(mb_substr($str, 0, 1)) . mb_substr($str, 1, mb_strlen($str));

        // Склонение слова "рубль".
        $num = $value[0] % 100;
        if ($num > 19) {
            $num = $num % 10;
        }
        switch ($num) {
            case 1: $rub = 'рубль'; break;
            case 2:
            case 3:
            case 4: $rub = 'рубля'; break;
            default: $rub = 'рублей';
        }

        return $str . ' ' . $rub . ($value[1] !== '00' ? ' ' . $value[1] . ' копеек.' : '');
    }
}
