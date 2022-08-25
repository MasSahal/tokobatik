<div class="container">
<div><div class="row"><br></div></div>
        <div class="page-header">
            <h1><?php echo strtoupper($_GET['channel']); ?> Virtual Account</h1>
        </div>

        <form class="form-horizontal" role="form" action="<?=BASE_URL() ?>simulasibayar/cekdata" method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label">Virtual Account Number</label>

                <div class="col-sm-10">
                    <input name="va_number" type="text" class="form-control" id="inputMerchantId"
                           placeholder="Virtual Account Number" required>

                    <input type="hidden" name="channel" value="<?= $_GET['channel']; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Cek Data</button>
                </div>
            </div>
        </form>

    </div>