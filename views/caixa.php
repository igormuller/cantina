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
                        <?php foreach ($caixa_itens as $caixa_item): ?>
                        <tr>
                            <?php if ($caixa_item['tipo_item'] == '1'): ?>
                            <td><a href="<?php echo BASE_URL."/pedido/ver/".$caixa_item['id_item']; ?>">Pedido</a></td>
                            <td><?php echo "R$ ".number_format($caixa_item['dinheiro']+$caixa_item['debito']+$caixa_item['credito'],2,',','.'); ?></td>
                            <td><?php echo "R$ ".number_format($caixa_item['dinheiro'],2,',','.'); ?></td>
                            <td><?php echo "R$ ".number_format($caixa_item['debito'],2,',','.'); ?></td>
                            <td><?php echo "R$ ".number_format($caixa_item['credito'],2,',','.'); ?></td>
                            <?php else: ?>
                            <td><a href="<?php echo BASE_URL."/saida/ver/".$caixa_item['id_item']; ?>">Saida</a></td>
                            <td><?php echo "R$ ".number_format($caixa_item['dinheiro'],2,',','.'); ?></td>
                            <td><?php echo "R$ ".number_format($caixa_item['dinheiro'],2,',','.'); ?></td>
                            <td>-</td>
                            <td>-</td>
                            <?php endif; ?>                            
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-3">Valor Aberto: <b><?php echo "R$ ".number_format($caixa['valor_aberto'], 2, ',', '.'); ?></b></div>
                    <div class="col-md-3">Saídas: </div>
                    <div class="col-md-3">Entradas: </div>
                    <div class="col-md-3">Saldo: </div>
                </div>
            </div>
        </div>
    </div>
</div>