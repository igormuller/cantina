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
        $sql = $this->db->query($sql);        
    }
}