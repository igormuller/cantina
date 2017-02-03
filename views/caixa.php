<div class="row">
    <div class="col-md-12">
        <div class="panel panel-danger">
            <div class="panel-heading">Fluxo de Caixa do dia <?php echo date('d/m/Y',strtotime($caixa['dt_aberto'])); ?></div>
            <div class="panel-body">
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>Tipo (Entrada/Saída)</th>
                            <th>Valor</th>
                            <th>Dinheiro</th>
                            <th>Débito</th>
                            <th>Crédito</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-3">Valor Aberto: <b>R$ <?php echo number_format($caixa['valor_aberto'], 2, ',', '.'); ?></b></div>
                    <div class="col-md-3">Saídas: </div>
                    <div class="col-md-3">Entradas: </div>
                    <div class="col-md-3">Saldo: </div>
                </div>
            </div>
        </div>
    </div>
</div>