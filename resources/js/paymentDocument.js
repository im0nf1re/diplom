let spinner = require('./spinner');

let paymentDocument = {
    run() {
        this.form = $('#paymentDocument');
        this.csrf = $('meta[name=csrf-token]').attr('content');
        this.ifnsList();
        this.chooseIfns();
        this.next();
        this.choosePaymentKind();
        this.choosePaymentName();
        this.choosePayerStatus();
        this.choosePaymentBasis();
        this.choosePeriod();

        this.removeErrors();
        this.loadKbkCode();
        this.savePaymentDocument();
    },

    ifnsList() {
        $('.my-hidden-list').siblings('p').click(function (e) {
            let list = $(this).siblings('.my-hidden-list');
            if (list.attr('data-opened') == 'true') {
                list.hide();
                list.attr('data-opened', false);
            } else {
                list.show();
                list.attr('data-opened', true);
            }
        })
    },

    chooseIfns() {
        $('[data-subject]').click(function () {
            $('[data-hidden-ifns-field]').val($(this).val());
            $('[data-ifns-field]').val($(this).siblings('[data-ifns-name]').text());
            paymentDocument.loadOktmos($(this).attr('data-subject'));
        })
    },

    loadOktmos(subjectId) {
        spinner.start();
        $.ajax({
            url: '/ajax/load-oktmos',
            type: 'post',
            data: {
                id: subjectId,
                _token: paymentDocument.csrf
            },
            success: function (html) {
                spinner.stop();
                $('[data-oktmo-select]').append(html);
            }
        })
    },

    validate() {
        let empty = false;
        $('#paymentDocument input[type=text]').each(function () {
            if (!$(this).val())
            {
                empty = true;
                $(this).closest('.form-group').find('label').addClass('text-danger');
            }

        });
        $('#paymentDocument select').each(function () {
            if (!$(this).val())
            {
                empty = true;
                $(this).closest('.form-group').find('label').addClass('text-danger');
            }
        });
        return !empty;
    },

    next() {
        $(document).on('click', '[data-next]', function (e) {
            if (paymentDocument.validate())
                $('input, select').attr('disabled', true);
        });

        $('[data-next=paymentKind]').click(function (e) {
            e.preventDefault();
            if (!paymentDocument.validate())
                return false;

            spinner.start();
            $.ajax({
                url: '/ajax/load-payment-kinds',
                type: 'post',
                data: {
                    id: $('[data-payer-type]').val(),
                    _token: paymentDocument.csrf,
                },
                success: function (html) {
                    spinner.stop();
                    paymentDocument.form.append(html);
                    $(e.currentTarget).remove();
                    paymentDocument.scrollDown();
                }
            });
        });

        $(document).on('click', '[data-next=payerStatuses]', function (e) {
            e.preventDefault();
            if (!paymentDocument.validate())
                return;

            spinner.start();
            $.ajax({
                url: '/ajax/load-payer-statuses',
                type: 'post',
                data: {
                    id: $('[data-payer-type]').val(),
                    _token: paymentDocument.csrf,
                },
                success: function (html) {
                    spinner.stop();
                    paymentDocument.form.append(html);
                    document.body.scrollTop = document.body.scrollHeight;
                    $(e.target).remove();
                    paymentDocument.scrollDown();
                }
            });
        });

        $(document).on('click', '[data-next=fio]', function (e) {
            e.preventDefault();
            if (!paymentDocument.validate())
                return;

            spinner.start();
            $.ajax({
                url: '/ajax/load-fio',
                type: 'get',
                success: function (html) {
                    spinner.stop();
                    paymentDocument.form.append(html);
                    document.body.scrollTop = document.body.scrollHeight;
                    $(e.target).remove();
                    paymentDocument.scrollDown();
                }
            });
        });

        $(document).on('click', '[data-next=ready]', function (e) {
            e.preventDefault();
            if (!paymentDocument.validate())
                return;

            spinner.start();
            $.ajax({
                url: '/ajax/load-ready',
                type: 'get',
                success: function (html) {
                    spinner.stop();
                    paymentDocument.form.append(html);
                    document.body.scrollTop = document.body.scrollHeight;
                    $(e.target).remove();
                    paymentDocument.scrollDown();
                }
            });
        });
    },

    choosePaymentKind() {
        $(document).on('change', '[data-payment-kind]', function () {
            $('[data-payment-name]').empty();
            let val = '';
            $("[data-payment-kind] option:selected").each(function() {
                val += $( this ).val();
            });
            if (val == '')
                return;

            spinner.start();
            $.ajax({
                url: '/ajax/load-payment-names',
                type: 'post',
                data: {
                    id: val,
                    _token: paymentDocument.csrf,
                },
                success: function (html) {
                    $('[data-payment-name]').append(html);
                    spinner.stop();
                }
            });
        }).change();
    },

    choosePaymentName() {
        $(document).on('change', '[data-payment-name]', function () {
            $('[data-payment-type]').empty();
            let val = '';
            $("[data-payment-name] option:selected").each(function() {
                val += $( this ).val();
            });
            if (val == '')
                return;
            spinner.start();
            $.ajax({
                url: '/ajax/load-payment-types',
                type: 'post',
                data: {
                    id: val,
                    _token: paymentDocument.csrf,
                },
                success: function (html) {
                    $('[data-payment-type]').append(html);
                    spinner.stop();
                }
            });
        }).change();
    },

    choosePayerStatus() {
        $(document).on('change', '[data-payer-statuses]', function () {
            $('[data-payment-bases]').empty();

            let val = '';
            $("[data-payer-statuses] option:selected").each(function() {
                val += $( this ).val();
            });
            if (val == '')
                return;

            spinner.start();
            $.ajax({
                url: '/ajax/load-payment-bases',
                type: 'post',
                data: {
                    id: $('[data-payer-type]').val(),
                    _token: paymentDocument.csrf,
                },
                success: function (html) {
                    $('[data-payment-bases]').append(html);
                    spinner.stop();
                }
            });
        }).change();
    },

    choosePaymentBasis() {
        $(document).on('change', '[data-payment-bases]', function () {
            $('[data-data-kind]').empty();
            let val = '';
            $("[data-payment-bases] option:selected").each(function() {
                val += $( this ).val();
            });
            if (val == '')
                return;

            spinner.start();
            $.ajax({
                url: '/ajax/load-data-kinds',
                type: 'post',
                data: {
                    id: val,
                    _token: paymentDocument.csrf,
                },
                success: function (html) {
                    console.log(html);
                    $('[data-data-kind]').append(html);
                    spinner.stop();
                }
            });
        }).change();
    },

    choosePeriod() {
        $(document).on('change', '[data-periods]', function () {
            $('[data-period-items]').empty();
            let val = '';
            $("[data-periods] option:selected").each(function() {
                val += $( this ).val();
            });
            spinner.start();
            console.log(val);
            $.ajax({
                url: '/ajax/load-period-items',
                type: 'post',
                data: {
                    id: val,
                    _token: paymentDocument.csrf,
                },
                success: function (html) {
                    $('[data-period-items]').append(html);
                    spinner.stop();
                }
            });
        }).change();
    },

    removeErrors() {
        $(document).on('focusin', 'input, select', function () {
            $(this).closest('.form-group').find('label').removeClass('text-danger');
        });
    },

    loadKbkCode() {
        $(document).on('keydown', '[data-kbk]', function(event){
            event.preventDefault();
            if(event.keyCode === 8) {
                return false;
            }
        });

        $(document).on('change', '[data-payment-type]', function(event) {
            if ($(this).val())
            {
                let paymentNameId = $('[data-payment-name]').val();
                let paymentTypeId = $('[data-payment-type]').val();
                $.ajax({
                    url: '/ajax/load-kbk',
                    type: 'post',
                    data: {
                        paymentNameId: paymentNameId,
                        paymentTypeId: paymentTypeId,
                        _token: paymentDocument.csrf,
                    },
                    success: function (json) {
                        let response = JSON.parse(json);
                        let kbkCode = response.code;
                        let kbkId = response.id;
                        $('[data-kbk]').val(kbkCode).attr('data-value', kbkId).focus();
                    }
                });
            }
        });
    },

    scrollDown() {
        let scrollHeight = document.documentElement.scrollHeight;
        let clientHeight = document.documentElement.clientHeight;
        scrollHeight = Math.max(scrollHeight, clientHeight);
        window.scrollTo(0, scrollHeight - document.documentElement.clientHeight)
    },

    savePaymentDocument() {
        $(document).on('click', '[data-save-payment-document]', function(e) {
            let formData = new FormData();

            // поле ddate
            let periodItem = $('[data-date="period-item"]').val();
            if (periodItem)
                formData.append('periodItem', periodItem);
            let year = $('[data-date="year"]').val();
            if (year)
                formData.append('year', year);
            let datepicker = $('[data-date="datepicker"]').val();
            if (datepicker)
                formData.append('datepicker', datepicker);

            // поле kbk_id
            let kbkId = $('[data-kbk]').attr('data-value');
            if (kbkId)
                formData.append('kbkId', kbkId);

            // поле payer_status_id
            let payerStatusId = $('[data-payer-statuses]').val();
            if (payerStatusId)
                formData.append('payerStatusId', payerStatusId);

            // поле oktmo_id
            let oktmoId = $('[data-oktmo-select]').val();
            if (oktmoId)
                formData.append('oktmoId', oktmoId);

            // поле ifns_id
            let ifnsId = $('[data-hidden-ifns-field]').val();
            if (ifnsId)
                formData.append('ifnsId', ifnsId);

            // данные о лице
            let firstname = $('[data-firstname]').val();
            if (firstname)
                formData.append('firstname', firstname);
            let surname = $('[data-surname]').val();
            if (surname)
                formData.append('surname', surname);
            let patronymic = $('[data-patronymic]').val();
            if (patronymic)
                formData.append('patronymic', patronymic);
            let inn = $('[data-inn]').val();
            if (inn)
                formData.append('inn', inn);
            let address = $('[data-address]').val();
            if (address)
                formData.append('address', address);

            formData.append('_token', paymentDocument.csrf);
            spinner.start();
            $.ajax({
                url: '/store/',
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    let json = JSON.parse(response);
                    if (json.success)
                        alert('zaebis');
                    else
                        alert(json.error_code);
                }
            });
        });
    }
};

module.exports = paymentDocument;
