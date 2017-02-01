<div class="row">
    <div class="col-md-12">
        <a href="<?php echo BASE_URL; ?>/caixa/novo" class="btn btn-success">Novo Pedido</a>
    </div>
</div>
<br/>
<div class="row">
    <?php foreach ($pedidos as $pedido): ?>
    <a href="#">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">Pedido <?php echo $pedido['nome']; ?></div>
                <div class="panel-body">Produtos</div>
                <div class="panel-footer">Total: R$ <?php echo $pedido['valor_total']; ?></div>
            </div>
        </div>
    </a>
    <?php endforeach; ?>
</div>