<div class="row">
    <div class="col-md-12">
        <h3>.: Editar Produto :.</h3>
        <form class="form-horizontal" method="POST">
            <div class="form-group">
                <label class="control-label col-md-2">Nome:</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="nome" value="<?php echo $produto['nome']; ?>" <?php echo $produto_usado? "disabled" : "required" ?> />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Preço Venda:</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="preco_venda" value="<?php echo $produto['preco_venda']; ?>" <?php echo $produto_usado? "disabled" : "required" ?> />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Preço Custo:</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="preco_custo" value="<?php echo $produto['preco_custo']; ?>" <?php echo $produto_usado? "disabled" : "required" ?> />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Descrição:</label>
                <div class="col-md-5">
                    <textarea class="form-control" rows="4" name="descricao" <?php echo $produto_usado? "disabled" : "" ?>><?php echo $produto['descricao']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Status:</label>
                <div class="col-md-5">
                    <select class="form-control" name="ativo">
                        <option value="1" <?php echo ($produto['status'] == '1')? "selected" : ""; ?>>Ativo</option>
                        <option value="2" <?php echo ($produto['status'] == '2')? "selected" : ""; ?>>Inativo</option>
                    </select>
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
