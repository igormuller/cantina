<div class="row">
    <div class="col-md-12">
        <h3>.: Detalhe Saída :.</h3>
        <div class="row">
            <label class="col-md-3 text-right">Data da Saída:</label>
            <div class="col-md-8">
                <?php echo date('d/m/Y',strtotime($saida['dt_saida'])); ?>
            </div>
        </div>
        <div class="row">
            <label class="col-md-3 text-right">Valor:</label>
            <div class="col-md-8">
                <?php echo "R$ ".number_format($saida['valor'],2,',','.'); ?>
            </div>
        </div>
        <div class="row">
            <label class="col-md-3 text-right">Descrição:</label>
            <div class="col-md-8">
                <?php echo $saida['descricao']; ?>
            </div>
        </div>
        <div class="row">
            <label class="col-md-3 text-right">Responsável:</label>
            <div class="col-md-8">
                <?php echo $saida['responsavel']; ?>
            </div>
        </div>
    </div>
</div>