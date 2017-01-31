<div class="row">
    <div class="col-md-12">
        <h3>.: Editar Saída :.</h3>
        <form class="form-horizontal" method="POST">
            <div class="form-group">
                <label class="control-label col-md-2">Data da Saída:</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="dt_saida" id="data"  value="<?php echo $saida['dt_saida']; ?>" required />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Valor:</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="valor" value="<?php echo $saida['valor']; ?>" required />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Descrição:</label>
                <div class="col-md-5">
                    <textarea class="form-control" rows="2" name="descricao"><?php echo $saida['descricao']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Responsável:</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="responsavel" value="<?php echo $saida['responsavel']; ?>" />
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