<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form method="POST">
            <div class="form-group">
                <label for="produto">Produto</label>
                <select class="form-control" id="produto" name="produto">
                    <?php foreach ($produtos as $produto): ?>
                    <option value="<?php echo $produto['id']; ?>"><?php echo $produto['nome']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="qtde">Quantidade:</label>
                <input type="number" class="form-control" id="qtde" name="qtde" required />
            </div>
            <div class="form-group">
                <input type="submit" value="Enviar" class="btn btn-success" />
            </div>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>