<?php if (!empty($aviso)): ?>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Atenção!</strong> <?php echo $aviso; ?>.
        </div>
    </div>
</div>
<?php endif; ?>
<div class="row">
    <div class="col-md-12">
        <h3>.: Cadastro de Saída :.</h3>
        <form class="form-horizontal" method="POST">
            <div class="form-group">
                <label class="control-label col-md-2">Data da Saída:</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="dt_saida" id="data" required />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Valor:</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="valor" required />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Descrição:</label>
                <div class="col-md-5">
                    <textarea class="form-control" rows="2" name="descricao"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Responsável:</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="responsavel" />
                </div>
            </div>     
            <div class="form-group">
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <input type="submit" class="btn btn-success" value="Enviar" />
                </div>
            </div>
        </form>
    </div>
</div>