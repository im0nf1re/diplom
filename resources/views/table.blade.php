<style>
    @font-face {
        font-family: arialuni; /* Гарнитура шрифта */
        src: url(/fonts/arialuni.ttf); /* Путь к файлу со шрифтом */
    }
    * {
        font-family: "DejaVu Sans";
        font-size: 15px;
    }
    td {
        border: 3px solid black;
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
    <table height="1000px" border="2px" width="100%" style="border-collapse: collapse; page-break-inside:avoid">
    <!-- Индекс документа -->
    <tr height="3%">
        <td style="width: 30%; border:none;"></td>
        <td style="width: 35%"><i>Индекс док</i> {{ $index }}</td>
        <td style="width: 17%"><i>(101)</i> {{ $payer_status->code }}</td>
        <td style="width: 18%"><i>Форма №ПД (налог)</i></td>
    </tr>
    <!-- Штрихи -->
    <tr height="9%">
        <td style="width: 30%; border:none; text-align: center; vertical-align: middle">Извещение</td>
        <td style="width: 35%; border:none;"></td>
        <td style="width: 17%; border:none;"></td>
        <td style="width: 18%; border:none;"></td>
    </tr>
    <!-- Фио -->
    <tr height="9%">
        <td style="width: 30%; border:none;"></td>
        <td style="width: 35%;"><i>ФИО</i> {{ $surname }} {{ $firstname }} {{ $patronymic }}</td>
        <td style="width: 35%;" colspan="2"><i>Адрес</i> {{ $address }}</td>
    </tr>
    <!-- Инн -->
    <tr height="3%">
        <td style="width: 30%; border:none;"></td>
        <td style="width: 35%;"><i>ИНН</i> {{ $inn }}</td>
        <td style="width: 30%" colspan="2"><i>Сумма</i> {{ $amount }}</td>
    </tr>
    <!-- Банк -->
    <tr height="3%">
        <td style="width: 30%; border:none;"></td>
        <td rowspan="2" style="width: 35%;"><i>Банк получателя</i> {{ $ifns->recipient->bank->name }}</td>
        <td style="width: 30%" colspan="2"><i>БИК</i> {{ $ifns->recipient->bank->bik }}</td>
    </tr>
    <tr height="3%">
        <td style="width: 30%; border:none;"></td>
        <td style="width: 30%" colspan="2"><i>Сч.№</i> 00000000000000000000</td>
    </tr>
    <!-- Получатель -->
    <tr height="3%">
        <td style="width: 30%; border:none;"></td>
        <td rowspan="3" style="width: 35%;"><i>Получатель</i> {{ $ifns->recipient->name }}</td>
        <td style="width: 30%" colspan="2"><i>Сч.№</i> {{ $ifns->recipient->account_number }}</td>
    </tr>
    <tr height="3%">
        <td style="width: 30%; border:none;"></td>
        <td style="width: 30%" colspan="2"><i>ИНН</i> {{ $ifns->recipient->inn }}</td>
    </tr>
    <tr height="3%">
        <td style="width: 30%; border:none;"></td>
        <td style="width: 30%" colspan="2"><i>КПП</i> {{ $ifns->recipient->kpp }}</td>
    </tr>
    <!-- КБК  -->
    <tr height="3%">
        <td style="width: 30%; border:none;"></td>
        <td style="width: 35%;"><i>КБК</i> {{ $kbk->number }}</td>
        <td style="width: 30%" colspan="2"><i>ОКТМО</i> {{ $oktmo->code }}</td>
    </tr>
    <!-- Пусто -->
    <tr height="3%">
        <td style="width: 30%; border:none; text-align: center; vertical-align: middle">Отметки банка</td>
        <td rowspan="2" style="width: 35%;" colspan="2"></td>
        <td style="width: 18%"><i>(107)</i> {{ $date }}</td>
    </tr>
    <tr height="3%">
        <td style="width: 30%; border:none;"></td>
        <td style="width: 18%"><i>(106)</i> {{ $paymentBasis->code }}</td>
    </tr>
    <!-- Дата -->
    <tr height="3%">
        <td style="width: 30%;border-bottom:0px;border-left:0px;"></td>
        <td style="width: 35%"><i>Дата</i></td>
        <td style="width: 35%" colspan="2"><i>Подпись</i></td>
    </tr>

    <!-- Разрез -->

    <!-- Индекс документа -->
    <tr height="3%">
        <td style="width: 30%;border:none; border-top:2px;"></td>
        <td style="width: 35%"><i>Индекс док</i> {{ $index }}</td>
        <td style="width: 17%"><i>(101)</i> {{ $payer_status->code }}</td>
        <td style="width: 18%"><i>Форма №ПД (налог)</i></td>
    </tr>

    <!-- ФИО -->
    <tr height="12%">
        <td style="width: 30%; border:none;"></td>
        <td style="width: 35%;"><i>ФИО</i> {{ $surname }} {{ $firstname }} {{ $patronymic }}</td>
        <td style="width: 35%;" colspan="2"><i>Адрес</i> {{ $address }}</td>
    </tr>
    <tr height="3%">
        <td style="width: 30%; border:none;"></td>
        <td style="width: 35%;"><i>ИНН</i> {{ $inn }}</td>
        <td style="width: 30%" colspan="2"><i>Сумма</i> {{ $amount }}</td>
    </tr>

    <!-- Банк -->
    <tr height="3%">
        <td style="width: 30%; border:none;"></td>
        <td rowspan="2" style="width: 35%;"><i>Банк получателя</i> {{ $ifns->recipient->bank->name }}</td>
        <td style="width: 30%" colspan="2"><i>БИК</i> {{ $ifns->recipient->bank->bik }}</td>
    </tr>
    <tr height="3%">
        <td style="width: 30%; border:none;"></td>
        <td style="width: 30%" colspan="2"><i>Сч.№</i> 00000000000000000000</td>
    </tr>

    <!-- Получатель -->
    <tr height="3%">
        <td style="width: 30%; border:none;"></td>
        <td rowspan="3" style="width: 35%;"><i>Получатель</i> {{ $ifns->recipient->name }}</td>
        <td style="width: 30%" colspan="2"><i>Сч.№</i> {{ $ifns->recipient->account_number }}</td>
    </tr>
    <tr height="3%">
        <td style="width: 30%; border:none;"></td>
        <td style="width: 30%" colspan="2"><i>ИНН</i> {{ $ifns->recipient->inn }}</td>
    </tr>
    <tr height="3%">
        <td style="width: 30%; border:none;"></td>
        <td style="width: 30%" colspan="2"><i>КПП</i> {{ $ifns->recipient->kpp }}</td>
    </tr>

    <!-- КБК  -->
    <tr height="3%">
        <td style="width: 30%; border:none;"></td>
        <td style="width: 35%;"><i>КБК</i> {{ $kbk->number }}</td>
        <td style="width: 30%" colspan="2"><i>ОКТМО</i> {{ $oktmo->code }}</td>
    </tr>

    <!-- Пусто -->
    <tr height="6%">
        <td style="width: 30%; border:none; text-align: center; vertical-align: middle">Квитанция</td>
        <td rowspan="2" style="width: 35%;" colspan="2"></td>
        <td style="width: 18%"><i>(107)</i> {{ $date }}</td>
    </tr>
    <tr height="6%">
        <td style="width: 30%; border:none; text-align: center; vertical-align: middle">Отметки банка</td>
        <td style="width: 18%"><i>(106)</i> {{ $paymentBasis->code }}</td>
    </tr>
    <!-- Дата -->
    <tr height="4%">
        <td style="width: 30%; border:none;"></td>
        <td style="width: 35%"><i>Дата</i></td>
        <td style="width: 35%" colspan="2"><i>Подпись</i></td>
    </tr>

</table>

</body>
</html>

