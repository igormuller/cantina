<?php

class loginController extends controller {
    
    public function index() {
        $dados = array(
            'aviso' => ''
        );
        if (isset($_POST['login']) && !empty($_POST['login'])) {
            $login = addslashes($_POST['login']);
            $senha = md5($_POST['senha']);
            $u = new Usuario();
            $user = $u->getUsuarioLoginSenha($login,$senha);
            if (count($user) > 0) {
                $_SESSION['uLogado'] = $user['id'];
                header("Location: ".BASE_URL);
            } else {
                $dados['aviso'] = "Login e/ou Senha incorretos!!!";
            }
        }
        $this->loadView("login", $dados);
        
    }
    
    public function logout() {
        unset($_SESSION['uLogado']);
        header("Location: ".BASE_URL);
    }
    
}

