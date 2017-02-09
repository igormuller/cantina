<div class="row">
    <div class="col-md-12">
        <a href="<?php echo BASE_URL."/caixa/abrir"; ?>" class="btn btn-success">Abrir Caixa</a>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-danger">
            <div class="panel-heading">Caixas</div>
            <div class="panel-body">
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>Data Caixa</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($caixas as $caixa): ?>
                        <tr>
                            <td>
                                <a href="<?php echo BASE_URL."/caixa/ver/".$caixa['id']; ?>"><?php echo date('d/m/Y',strtotime($caixa['dt_aberto'])); ?></a>
                            </td>
                            <td><?php echo $caixa['status']==0? "Aberto" : "Fechado"; ?></td>   
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>