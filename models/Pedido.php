<?php

class Pedido extends model {
    
    public function getPedidosAbertos() {
        /*
         * Status Aberto = 1
         * Status Fechado = 2
         */
        $array = array();
        $sql = "SELECT * FROM pedido WHERE status = '1' ORDER BY nome";
        $sql = $this->db->query($sql);
        $produto = new Produto();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
            for ($i=0; $i < count($array); $i++) {
                $array[$i]['produtos'] = $produto->getProdutosPedido($array[$i]['id']);
            }
        }        
        return $array;
    }
    
    public function getPedido($id_pedido) {
        $array = array();
        $sql = "SELECT * FROM pedido WHERE id = '$id_pedido'";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }


    public function newPedido($nome) {
        $sql = "INSERT INTO pedido SET nome = '$nome', dt_pedido = NOW(), status = '1'";
        $this->db->query($sql);
    }
    
    public function addProduto($id_pedido, $id_produto, $qtde) {
        $sql = "INSERT INTO pedido_produto SET id_pedido = '$id_pedido', id_produto = '$id_produto', qtde = '$qtde'";
        $this->db->query($sql);
        $produto = new Produto();
        $produto = $produto->getProduto($id_produto);
        $pedido = new Pedido();
        $pedido = $pedido->getPedido($id_pedido);
        $total = $pedido['valor_total'];
        
        $total = $total + ($produto['preco_venda'] * $qtde);
        $sql = "UPDATE pedido SET valor_total = '$total' WHERE id = '$id_pedido'";
        $this->db->query($sql);
    }
    
    public function getQtdeProduto($id) {
        $qtde = 0;
        $sql = "SELECT * FROM pedido_produto WHERE id = '$id'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            $qtde = $array['qtde'];
        }
        return $qtde;
    }
    
    public function excluirProdutoPedido($id_pedido, $id_produto, $id) {
        $produto = new Produto();
        $produto = $produto->getProduto($id_produto);
        $pedido = $this->getPedido($id_pedido);
        $qtde = $this->getQtdeProduto($id);
        $total = $pedido['valor_total'];
        $total = $total - ($produto['preco_venda'] * $qtde );
        $sql = "UPDATE pedido SET valor_total = '$total' WHERE id = '$id_pedido'";
        $this->db->query($sql);
        
        $sql = "DELETE FROM pedido_produto WHERE id = '$id'";
        $this->db->query($sql);
    }
    
    public function finaliza($id_pedido) {
        $sql = "UPDATE pedido SET status = '2', dt_fechado = NOW() WHERE id = '$id_pedido'";
        $this->db->query($sql);
    }
    
    public function inserirPagamento($id_pedido, $id_pagamento, $valor) {
        $sql = "INSERT INTO pedido_pagamento SET id_pedido = '$id_pedido', id_pagamento = '$id_pagamento', valor = '$valor'";
        $this->db->query($sql);
    }
    
    public function getValoresPedido($id_pedido){
        $array = array();
        $sql = "SELECT * FROM pedido_pagamento WHERE id_pedido = '$id_pedido'";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
}