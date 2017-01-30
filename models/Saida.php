<?php
class Saida extends model {
    
    public function getSaidas() {
        $array = array();
        $sql = "SELECT * FROM saida";
        $sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }      
        
        return $array;
    }
    
    public function add($dt_saida, $valor, $descricao, $responsavel) {
        $sql = "INSERT INTO saida SET dt_saida = '$dt_saida', valor = '$valor', descricao = '$descricao', responsavel = '$responsavel'";      
        $this->db->query($sql);
    }
}