<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Finalizar Pedido: <?php echo $pedido['nome']; ?></div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST">
                    <div class="form-group text-right">
                        <label class="col-sm-3 control-label">Dinheiro:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="dinheiro" id="dinheiro" placeholder="0,00" />
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <label class="col-sm-3 control-label">Débito:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="debito" id="debito" placeholder="0,00" />
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <label class="col-sm-3 control-label">Crédito:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="credito" id="credito" placeholder="0,00" />
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <label class="col-sm-3 control-label">Soma:</label>
                        <div class="col-sm-9 text-left" id="soma">
                            <input type="text" class="form-control" value="" disabled />
                        </div>
                    </div>
                    <hr>
                    <div class="form-group text-center">
                        <b>Pedido: <?php echo (isset($pedido['valor_total'])?"R$ ".str_replace('.', ',', $pedido['valor_total']).(strstr($pedido['valor_total'],'.')?"":",00"):"-"); ?></b>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-block btn-success" value="Finalizar" />
                        </div>
                    </div>
                </form>
            </div>
            <?php if (!empty($aviso)): ?>
            <div class="panel-footer">
                <div class="alert alert-danger text-center"><?php echo $aviso; ?></div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>