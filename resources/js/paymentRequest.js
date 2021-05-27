require('suggestions-jquery');
let spinner = require('./spinner');

let paymentRequest = {
    run() {
        this.csrf = $('meta[name=csrf-token]').attr('content');

        this.setSuggestions();
        this.switchAccept();
        this.addSum();
        this.addNds();

        this.savePaymentRequest();
        this.downloadPaymentRequest();
    },

    setSuggestions() {
        $('#company_name, #company_inn').suggestions({
            token: "ba1c9a4de95a60345108025a6bfb8204f2b09a3a",
            type: "PARTY",
            /* Вызывается, когда пользователь выбирает одну из подсказок */
            onSelect: function(suggestion) {
                $('#company_name').val(suggestion.value);
                $('#company_inn').val(suggestion.data.inn);
            }
        });

        $('#company_bank_bik, #company_bank_name, #company_corr_account').suggestions({
            token: "ba1c9a4de95a60345108025a6bfb8204f2b09a3a",
            type: "BANK",
            /* Вызывается, когда пользователь выбирает одну из подсказок */
            onSelect: function(suggestion) {
                $('#company_bank_bik').val(suggestion.data.bic);
                $('#company_bank_name').val(suggestion.value);
                $('#company_corr_account').val(suggestion.data.correspondent_account);
            }
        });

        $('#payer_name, #payer_inn').suggestions({
            token: "ba1c9a4de95a60345108025a6bfb8204f2b09a3a",
            type: "PARTY",
            /* Вызывается, когда пользователь выбирает одну из подсказок */
            onSelect: function(suggestion) {
                $('#payer_name').val(suggestion.value);
                $('#payer_inn').val(suggestion.data.inn);
            }
        });

        $('#payer_bank_bik, #payer_bank_name, #payer_corr_account').suggestions({
            token: "ba1c9a4de95a60345108025a6bfb8204f2b09a3a",
            type: "BANK",
            /* Вызывается, когда пользователь выбирает одну из подсказок */
            onSelect: function(suggestion) {
                $('#payer_bank_bik').val(suggestion.data.bic);
                $('#payer_bank_name').val(suggestion.value);
                $('#payer_corr_account').val(suggestion.data.correspondent_account);
            }
        });
    },

    switchAccept() {
        $(document).on('click', '#with', function () {
            $('[data-payment-condition]').hide();
            $('#payment_condition').prop('required', false);
            $('[data-accept-period]').show();
            $('#accept_period').prop('required', true);
        });
        $(document).on('click', '#without', function () {
            $('[data-payment-condition]').show();
            $('#payment_condition').prop('required', true);
            $('[data-accept-period]').hide();
            $('#accept_period').prop('required', false);
        });
    },

    addSum() {
        $(document).on('click', '[data-fill-sum]', function () {
            $('#description').val($('#description').val() + ' СУММА: ' + $('#sum').val())
        });
    },

    addNds() {
        $(document).on('click', '[data-fill-nds]', function () {
            $('#nds_string').val($('#nds_string').val() + ' В т.ч. НДС (' + $('#nds option:selected').text().trim() + ')')
        });
    },

    savePaymentRequest() {
        $(document).on('click', '[data-save-payment-request]', function () {
            if(paymentRequest.validate()) {
                let formData = new FormData(document.getElementById('paymentRequest'));
                spinner.start();
                $.ajax({
                    url: '/payment-request/',
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (html) {
                        spinner.stop();
                        if (html === 'error') {
                            $('[data-show-error]').click();
                        } else {
                            $('[data-show-success]').click();
                            $('[data-save-payment-request]').hide();
                        }
                    }
                })
            }
        });
    },

    downloadPaymentRequest() {
        $(document).on('click', '[data-download-payment-request]', function () {
            if (paymentRequest.validate()) {
                $('#paymentRequest').submit();
            } else {
                $('[data-show-error]').click();
            }
        });
    },

    validate() {
        let empty = false;
        $('#paymentRequest input[type=text]:required, #paymentRequest input[type=date]:required, #paymentRequest textarea:required').each(function () {
            if (!$(this).val())
            {
                empty = true;
                $(this).closest('.form-group').find('label').addClass('text-danger');
            }

        });
        $('#paymentRequest select:required').each(function () {
            if (!$(this).val())
            {
                empty = true;
                $(this).closest('.form-group').find('label').addClass('text-danger');
            }
        });
        return !empty;
    },
};

module.exports = paymentRequest;
