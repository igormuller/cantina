<?php

class Caixa extends model {
    
    public function getCaixa($data) {
        $array = array();
        
        $sql = "SELECT * FROM caixa WHERE dt_aberto = '$data'";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }

    public function caixaAberto($data) {
        $sql = "SELECT * FROM caixa WHERE dt_aberto = '$data'";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {
            return TRUE;
        }
        return FALSE;
    }
    
    public function abrirCaixa($valor) {
        $sql = "INSERT INTO caixa SET valor_aberto = '$valor', dt_aberto = NOW()";
        $this->db->query($sql);        
    }
    
    /*
     * Tipo Item
     * 1 = Entrada
     * 2 = Saida
     */
    public function incluirCaixaItem($id_caixa, $tipo_item, $id_item) {
        $sql = "INSERT INTO caixa_item SET id_caixa = '$id_caixa', tipo_item = '$tipo_item', id_item = '$id_item'";
        $this->db->query($sql);
        
    }
    
    public function getCaixaItem($id_caixa) {
        $array = array();
        $sql = "SELECT * FROM caixa_item WHERE id_caixa = '$id_caixa'";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
            
            foreach ($array as $key => $caixa_item) {
                $array[$key]['dinheiro'] = 0;
                $array[$key]['debito'] = 0;
                $array[$key]['credito'] = 0;
                if ($caixa_item['tipo_item'] == '1') {
                    $pedido = new Pedido();
                    $dados = $pedido->getValoresPedido($caixa_item['id_item']);
                    
                    foreach ($dados as $dado) {
                        if ($dado['id_pagamento'] == '1') {
                            $array[$key]['dinheiro'] = $dado['valor'];
                        }
                        if ($dado['id_pagamento'] == '2') {
                            $array[$key]['debito'] = $dado['valor'];
                        }
                        if ($dado['id_pagamento'] == '3') {
                            $array[$key]['credito'] = $dado['valor'];
                        }   
                    }
                } else {
                    $saida = new Saida();
                    $saida = $saida->getSaida($caixa_item['id_item']);
                    $array[$key]['dinheiro'] = $saida['valor'];
                }                
            }
        }
        
        return $array;
    }
}