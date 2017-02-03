<div class="row">
    <div class="col-md-12">
        <a href="<?php echo BASE_URL; ?>/pedido/novo" class="btn btn-success">Novo Pedido</a>
    </div>
</div>
<br/>
<?php $i = 0; ?>
<div class="row">
<?php foreach ($pedidos as $pedido): ?>
    <?php if ($i % 3 == 0): ?>
    <div class="row">
    <?php endif; ?>

    <?php $i++; ?>
    <div class="col-md-4">
        <a href="<?php echo BASE_URL."/pedido/ver/".$pedido['id']; ?>" style="text-decoration: none">
            <div class="panel panel-info">
                <div class="panel-heading">Pedido <?php echo $pedido['nome']; ?></div>
                <div class="panel-body">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Qtde</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pedido['produtos'] as $produto): ?>
                            <tr>
                                <td><?php echo $produto['nome']; ?></td>
                                <td><?php echo $produto['qtde']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer"><b>Total: <?php echo "R$ ".number_format($pedido['valor_total'],2,',','.'); ?></b></div>
            </div>
        </a>
    </div>
    <?php if ($i % 3 == 0): ?>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
</div>