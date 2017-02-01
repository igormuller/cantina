<?php

class Produto extends model {
    
    private $produto;
    
    public function add($nome, $preco_venda, $preco_custo, $descricao) {
        $sql = "INSERT INTO produto SET nome = '$nome', preco_venda = '$preco_venda', preco_custo = '$preco_custo', status = '1' descricao = '$descricao'";
        $this->db->query($sql);        
    }
    
    public function getProdutos() {
        $array = array();
        $sql = "SELECT * FROM produto";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function getProdutosAtivos() {
        $array = array();
        $sql = "SELECT * FROM produto WHERE status = '1'";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function remove($id) {
        $sql = "DELETE FROM produto WHERE id = '$id'";
        $this->db->query($sql);        
    }
    
    public function edit($nome, $preco_venda, $preco_custo, $status, $descricao, $id) {
        $sql = "UPDATE produto SET nome = '$nome', preco_venda = '$preco_venda', preco_custo = '$preco_custo', status = '$status', descricao = '$descricao' WHERE id = '$id'";
        $this->db->query($sql);
    }


    public function getProduto($id) {
        $array = array();
        $sql = "SELECT * FROM produto WHERE id = '$id'";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getProdutosPedido($id_pedido){
        $array = array();
        $sql = "SELECT "
                . "pedido_produto.id, "
                . "pedido_produto.id_pedido, "
                . "pedido_produto.id_produto, "
                . "pedido_produto.qtde, "
                . "produto.nome, "
                . "produto.preco_venda, "
                . "produto.preco_custo, "
                . "produto.status, "
                . "produto.descricao "
                . "FROM pedido_produto "
                . "JOIN produto ON pedido_produto.id_produto = produto.id "
                . "WHERE pedido_produto.id_pedido = '$id_pedido'";
        $sql = $this->db->query($sql);

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
}