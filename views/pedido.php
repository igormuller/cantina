<?php $total = 0; ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">Pedido <?php echo $id_pedido; ?></div>
            <div class="panel-body">
                <a href="<?php echo BASE_URL."/pedido/adicionarProduto/".$id_pedido; ?>" class="btn btn-success">Adicionar Produto</a>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Qtde</th>
                            <th>Preço</th>
                            <th>Total</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?php echo $produto['nome']; ?></td>
                            <td><?php echo $produto['qtde']; ?></td>
                            <td><?php echo "R$ ".str_replace('.', ',', $produto['preco_venda']).(strstr($produto['preco_venda'],'.')?"":",00"); ?></td>
                            <?php 
                            $totalp = $produto['qtde'] * $produto['preco_venda'];
                            $total = $total + $totalp;
                            ?>
                            <td><?php echo "R$ ".str_replace('.', ',', $totalp).(strstr($totalp,'.')?"":",00"); ?></td>
                            <td>
                                <a href="<?php echo BASE_URL."/pedido/excluir/".$produto['id_pedido']."/".$produto['id_produto']."/".$produto['id']; ?>" class="btn btn-sm btn-danger">Excluir</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>                    
                </table>
            </div>
            <div class="panel-footer">
                <b>Total: <?php echo "R$ ".str_replace('.', ',', $total).(strstr($total,'.')?"":",00"); ?></b>
                    
            </div>
        </div>
    </div>
</div>