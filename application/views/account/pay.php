<?echo $header?>
<?if($paygatehosted == 1):?>
<div class="col-lg-4">
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <center><img src="/application/public/img/pay/paygatehosted.png" style="max-width:100%;height:65px;" alt=""></center>
        </div>
        <div class="card-footer">
            <button data-toggle="modal" data-target="#paygatehosted" class="btn btn-primary btn-lg btn-block">Пополнить</button>
        </div>
    </div>
</div>

<div class="modal fade" id="paygatehosted" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Пополнение баланса</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="paygatehosted" method="POST" class="form_0" style="padding:0px; margin:0px;">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Введите сумму</label>
                        <input class="form-control" id="ammount" name="ammount" placeholder="100">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Пополнить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#paygatehosted').ajaxForm({ 
        url: '/account/pay/paygatehosted',
        dataType: 'text',
        success: function(data) {
            console.log(data);
            data = $.parseJSON(data);
            switch(data.status) {
                case 'error':
                    toastr.error(data.error);
                    $('button[type=submit]').prop('disabled', false);
                    break;
                case 'success':
                    redirect(data.url);
                break;
            }
        },
        beforeSubmit: function(arr, $form, options) {
            $('button[type=submit]').prop('disabled', true);
        }
    });
</script>
<?endif;?>
<?if($moonpay == 1):?>
<div class="col-lg-4">
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <center><img src="/application/public/img/pay/moonpay.png" style="max-width:100%;height:65px;" alt=""></center>
        </div>
        <div class="card-footer">
            <button data-toggle="modal" data-target="#moonpay" class="btn btn-primary btn-lg btn-block">Пополнить</button>
        </div>
    </div>
</div>

<div class="modal fade" id="moonpay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Пополнение баланса</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="moonpay" method="POST" class="form_0" style="padding:0px; margin:0px;">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Введите сумму</label>
                        <input class="form-control" id="ammount" name="ammount" placeholder="100">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Пополнить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#moonpay').ajaxForm({ 
        url: '/account/pay/moonpay',
        dataType: 'text',
        success: function(data) {
            console.log(data);
            data = $.parseJSON(data);
            switch(data.status) {
                case 'error':
                    toastr.error(data.error);
                    $('button[type=submit]').prop('disabled', false);
                    break;
                case 'success':
                    redirect(data.url);
                break;
            }
        },
        beforeSubmit: function(arr, $form, options) {
            $('button[type=submit]').prop('disabled', true);
        }
    });
</script>
<?endif;?>
<?if($mercuryo == 1):?>
<div class="col-lg-4">
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <center><img src="/application/public/img/pay/mercuryo.png" style="max-width:100%;height:65px;" alt=""></center>
        </div>
        <div class="card-footer">
            <button data-toggle="modal" data-target="#mercuryo" class="btn btn-primary btn-lg btn-block">Пополнить</button>
        </div>
    </div>
</div>

<div class="modal fade" id="mercuryo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Пополнение баланса</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="mercuryo" method="POST" class="form_0" style="padding:0px; margin:0px;">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Введите сумму</label>
                        <input class="form-control" id="ammount" name="ammount" placeholder="100">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Пополнить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#mercuryo').ajaxForm({ 
        url: '/account/pay/mercuryo',
        dataType: 'text',
        success: function(data) {
            console.log(data);
            data = $.parseJSON(data);
            switch(data.status) {
                case 'error':
                    toastr.error(data.error);
                    $('button[type=submit]').prop('disabled', false);
                    break;
                case 'success':
                    redirect(data.url);
                break;
            }
        },
        beforeSubmit: function(arr, $form, options) {
            $('button[type=submit]').prop('disabled', true);
        }
    });
</script>
<?endif;?>
<?if($alchemypay == 1):?>
<div class="col-lg-4">
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <center><img src="/application/public/img/pay/alchemypay.png" style="max-width:100%;height:65px;" alt=""></center>
        </div>
        <div class="card-footer">
            <button data-toggle="modal" data-target="#alchemypay" class="btn btn-primary btn-lg btn-block">Пополнить</button>
        </div>
    </div>
</div>

<div class="modal fade" id="alchemypay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Пополнение баланса</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="alchemypay" method="POST" class="form_0" style="padding:0px; margin:0px;">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Введите сумму</label>
                        <input class="form-control" id="ammount" name="ammount" placeholder="100">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Пополнить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#alchemypay').ajaxForm({ 
        url: '/account/pay/alchemypay',
        dataType: 'text',
        success: function(data) {
            console.log(data);
            data = $.parseJSON(data);
            switch(data.status) {
                case 'error':
                    toastr.error(data.error);
                    $('button[type=submit]').prop('disabled', false);
                    break;
                case 'success':
                    redirect(data.url);
                break;
            }
        },
        beforeSubmit: function(arr, $form, options) {
            $('button[type=submit]').prop('disabled', true);
        }
    });
</script>
<?endif;?>
<?echo $footer?>

