<?php

class Pedido extends model {
    
    public function getPedidosAbertos() {
        /*
         * Status Aberto = 1
         * Status Fechado = 2
         */
        $array = array();
        $sql = "SELECT * FROM pedido WHERE status = '1'";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function newPedido($nome) {
        $sql = "INSERT INTO pedido SET nome = '$nome', dt_pedido = NOW(), status = '1'";
        $this->db->query($sql);
    }
}