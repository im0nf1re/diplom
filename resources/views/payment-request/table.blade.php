<style>
    * {
        font-family: "DejaVu Sans";
        font-size: 14px;
    }
    td {
        /*border: 3px solid black;*/
        text-align: left;
        vertical-align: top;
    }
</style>

<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table class="table table-striped table-bordered"  style="border-collapse: collapse; page-break-inside:avoid;">
    <tr>
        <td style="text-align: right;" colspan="6"></td>
        <td></td>
        <td style="text-align: right; border: 2px solid black;" colspan="1" >0401061</td>
    </tr>
    <tr>
        <td colspan="2" style="border-top: 2px solid black">Поступ. в банк плат.</td>
        <td colspan="2" style="border-top: 2px solid black">Оконч. срока акцепта</td>
        <td colspan="2" style="border-top: 2px solid black">Списано со сч. плат.</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="4"><b> ПЛАТЕЖНОЕ ТРЕБОВАНИЕ № {{ $number }}</b></td>
        <td></td>
        <td>{{ $date_from }}</td>
        <td>{{ $request_payment_kind->name }}</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3"></td>
        <td></td>
        <td style="border-top: 2px solid black;">Дата</td>
        <td style="border-top: 2px solid black;">Вид платежа</td>
        <td></td>
    </tr>
    <tr>
        <td style="border: 2px solid black; border-left:none;">Условие<br/>оплаты</td>
        <td colspan="5" style="border: 2px solid black;">
            @if($accept == 1)
                Акцепт
            @else
                Без акцепта
            @endif
            <br/>
            @if($accept == 0)
                {{ $payment_condition }}
            @endif
        </td>
        <td style="border: 2px solid black;">Срок для<br/>акцепта</td>
        <td style="border: 2px solid black; border-right:none;">
            @if($accept == 1)
                {{ $accept_period }}
            @endif
        </td>
    </tr>
    <tr>
        <td style="border: 2px solid black; border-left:none;">Сумма<br/>прописью</td>
        <td colspan="7" style="border: 2px solid black; border-right:none;">{{ $sum_string }}</td>

    </tr>
    <tr>
        <td colspan="4" style="border-top: 2px solid black;">ИНН {{ $payer_inn }}<br/>{{ $payer_name }}</td>
        <td style="border: 2px solid black;">Сумма</td>
        <td colspan="3" style="border: 2px solid black; border-right:none;">{{ $sum }}</td>
    </tr>
    <tr>
        <td colspan="4" style="border-bottom: 2px solid black;"><i>Плательщик</i></td>
        <td style="border: 2px solid black;">Сч. No</td>
        <td colspan="3">{{ $payer_rass_account }}</td>
    </tr>
    <tr>
        <td colspan="4">{{ $payer_bank_name }}</td>
        <td style="border: 2px solid black;">БИК</td>
        <td colspan="3">{{ $payer_bank_bik }}</td>
    </tr>
    <tr>
        <td colspan="4"><i>Банк плательщика</i></td>
        <td style="border: 2px solid black;">Сч. No</td>
        <td colspan="3">{{ $payer_corr_account }}</td>
    </tr>
    <tr>
        <td colspan="4" style="border-top: 2px solid black;">{{ $company_bank_name }}</td>
        <td style="border: 2px solid black;">БИК</td>
        <td colspan="3" style="border-top: 2px solid black;">{{ $company_bank_bik }}</td>
    </tr>
    <tr>
        <td colspan="4"><i>Банк получателя</i></td>
        <td style="border: 2px solid black;">Сч. No</td>
        <td colspan="2">{{ $company_corr_account }}</td>
        <td></td>
    </tr>
    <tr>
        <td colspan="4" style="border-top: 2px solid black;">ИНН {{ $company_inn }}<br/>{{ $company_name }}</td>
        <td style="border: 2px solid black;">Сч. No</td>
        <td colspan="2" style="border-bottom: 2px solid black;">{{ $company_rass_account }}</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3"></td>
        <td style="border: 2px solid black;">Вид оп.</td>
        <td style="text-align: center; border-right: 2px solid black;" >0{{ $request_payment_kind->id }}</td>
        <td style="border-right: 2px solid black;">Очер. плат.</td>
        <td style="border-top: 2px solid black;"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="3"></td>
        <td style="border: 2px solid black;">Наз. пл.</td>
        <td style="border-right: 2px solid black;"></td>
        <td style="border-right: 2px solid black;"></td>
        <td></td>
    </tr>
    <tr>
        <td style="border-bottom: 2px solid black;"><i>Получатель</i></td>
        <td style="border-bottom: 2px solid black;" colspan="3"></td>
        <td style="border: 2px solid black;">Код</td>
        <td style="border-bottom: 2px solid black;"></td>
        <td style="border: 2px solid black;">Рез. поле</td>
        <td style="border-bottom: 2px solid black;"></td>
    </tr>
    <tr>
        <td colspan="5">Назначение платежа</td>
        <td colspan="2"></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="8">{{ $description }}</td>
    </tr>
    <tr>
        <td colspan="5">{{ $nds_string }}</td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td style="border-bottom: 2px solid black;" colspan="5">Дата отсылки (вручения) плательщику предусмотренных договором документов</td>
        <td style="text-align: center; border-bottom: 2px solid black;" colspan="3">{{ $documents_send_date }}</td>
    </tr>
    <tr>
        <td colspan="5" style="text-align: right">Подписи</td>
        <td style="text-align: right" colspan="3">Отметки банка получателя</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center"></td>
        <td colspan="2"></td>
        <td style="color: white" colspan="2">a <br>a </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center; ">М.П.</td>
        <td colspan="2" style="border-top: 2px solid black;"></td>
        <td style="color: white" colspan="2"> <br>a </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: center; "></td>
        <td colspan="2" style="border-top: 2px solid black;"></td>
        <td style="color: white" colspan="2"> <br>a </td>
    </tr>
    <tr>
        <td style="border: 2px solid black; border-left: none;">№ч. <br>плат.</td>
        <td style="border: 2px solid black;">No плат. <br>ордера</td>
        <td style="border: 2px solid black;">Дата плат. <br>ордера</td>
        <td style="border: 2px solid black;">Сумма частичного <br>платежа</td>
        <td style="border: 2px solid black;">Сумма остатка <br>платежа</td>
        <td style="border: 2px solid black; border-right: none;">Подпись</td>
        <td colspan="2">Дата помещения в картотеку</td>
    </tr>
    <tr>
        <td style="border-right: 2px solid black; color: white">a <br> a <br>a <br>a <br>a <br>a</td>
        <td style="border-right: 2px solid black;"></td>
        <td style="border-right: 2px solid black;"></td>
        <td style="border-right: 2px solid black;"></td>
        <td style="border-right: 2px solid black;"></td>
        <td></td>
        <td colspan="2">Отметки банка плательщика</td>

    </tr>
</table>



</body>
</html>

