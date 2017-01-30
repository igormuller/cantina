<?php

class Produto extends model {
    
    private $produto;
    
    public function add($nome, $preco_venda, $preco_custo, $descricao) {
        $sql = "INSERT INTO produto SET nome = '$nome', preco_venda = '$preco_venda', preco_custo = '$preco_custo', descricao = '$descricao'";
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
    
    public function remove($id) {
        $sql = "DELETE FROM produto WHERE id = '$id'";
        $this->db->query($sql);        
    }
    
    public function edit($nome, $preco_venda, $preco_custo, $descricao, $id) {
        $sql = "UPDATE produto SET nome = '$nome', preco_venda = '$preco_venda', preco_custo = '$preco_custo', descricao = '$descricao' WHERE id = '$id'";
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
}