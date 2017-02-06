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
        <a href="<?php echo BASE_URL; ?>/produto/add" class="btn btn-success">Novo Produto</a>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço Venda</th>
                    <th>Preço Custo</th>
                    <th>Descrição</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                <?php if ($produto['status'] == '1'): ?>
                <tr>
                <?php else: ?>
                <tr class="danger">
                <?php endif; ?>
                    <td><?php echo $produto['nome']; ?></td>
                    <td><?php echo "R$ ".str_replace('.', ',', $produto['preco_venda']).(strstr($produto['preco_venda'],'.')?"":",00"); ?></td>
                    <td><?php echo (isset($produto['preco_custo'])?"R$ ".str_replace('.', ',', $produto['preco_custo']).(strstr($produto['preco_custo'],'.')?"":",00"):"-"); ?></td>
                    <td><?php echo $produto['descricao']; ?></td>
                    <td>
                        <a href="<?php echo BASE_URL; ?>/produto/excluir/<?php echo $produto['id']; ?>" class="btn btn-sm btn-danger">Excluir</a>
                        <a href="<?php echo BASE_URL; ?>/produto/editar/<?php echo $produto['id']; ?>" class="btn btn-sm btn-success">Editar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>