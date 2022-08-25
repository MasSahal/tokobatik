<div class="container">
<div><div class="row"><br></div></div>

        <form class="form-horizontal" role="form" action="<?=BASE_URL() ?>simulasibayar/bayar" method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label">Total Bayar</label>

                <div class="col-sm-10">
                    <input type="hidden" name="no_va" value="<?= $va_number; ?>">
                    <input type="hidden" name="channel" value="<?= $channel; ?>">
                    <input type="hidden" name="no_order" value="<?= $dataCek->no_order; ?>">
                    <input type="hidden" name="total_bayar" value="<?= $dataCek->total_bayar; ?>">
                    <input name="total_amount" readonly value="<?= $dataCek->total_bayar; ?>" type="text"/>&nbsp;
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Konsumen</label>
                <div class="col-sm-10">
                    <p class="form-control-static"><?= $dataCek->no_va; ?> - <?= $dataCek->nama_penerima; ?></p>
                </div>
            </div> 

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </div>
            </div>
        </form>

    </div>