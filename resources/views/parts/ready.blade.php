<div class="row form-group">
    <div class="col-md-12">
        <div class="alert alert-success mt-5" role="alert">
            <p><strong>Уважаемый пользователь!</strong></p>
            <p>Все необходимые сведения успешно заполнены. Нажмите кнопку "Сформировать", чтобы сформировать платежный документ.</p>
        </div>
    </div>
</div>
<div class="row form-group">
    <div class="col-md-12">
        <a href='javascript:void(0)' class="btn btn-primary float-right" data-save-payment-document>Сформировать</a>
    </div>
</div>
<form action="{{ route('store') }}" style="display: none" id="saveForm" method="post">
    @csrf
</form>
