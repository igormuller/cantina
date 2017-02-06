<div class="col-md-12">
    <h3>.: Cadastro de Produto :.</h3>
    <form class="form-horizontal" method="POST">
        <div class="form-group">
            <label class="control-label col-md-2">Nome:</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="nome" placeholder="Nome do produto" required />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2">Preço Venda:</label>
            <div class="col-md-5">
                <input type="text" class="form-control" name="preco_venda" placeholder="0,00" required />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2">Preço Custo:</label>
            <div class="col-md-5">
                <input type="text" class="form-control" placeholder="0,00" name="preco_custo" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2">Descrição:</label>
            <div class="col-md-5">
                <textarea class="form-control" rows="4" placeholder="Descrição do produto" name="descricao"></textarea>
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