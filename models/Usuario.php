<?php

class Usuario extends model {
    
    public function isLogged() {
        if (isset($_SESSION['uLogado']) && !empty($_SESSION['uLogado'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function getUsuarioLoginSenha($login, $senha) {
        $array = array();
        $sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }
}