<div class="row">
    <div class="col-md-12">
        <a href="<?php echo BASE_URL; ?>/saida/add" class="btn btn-success">Nova Saída</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3>Registro de Saídas do Caixa</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Data Saída</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Responsável</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($saidas as $saida): ?>
                <tr>
                    <td><?php echo $saida['dt_saida']; ?></td>
                    <td><?php echo "R$ ".str_replace('.', ',', $saida['valor']).(strstr($saida['valor'],'.')?"":",00"); ?></td>
                    <td><?php echo $saida['descricao']; ?></td>
                    <td><?php echo $saida['responsavel']; ?></td>
                    <td>
                        <a href="<?php echo BASE_URL; ?>/saida/excluir/<?php echo $saida['id']; ?>" class="btn btn-sm btn-danger">Excluir</a>
                        <a href="<?php echo BASE_URL; ?>/saida/editar/<?php echo $saida['id']; ?>" class="btn btn-sm btn-success">Editar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>
</div>