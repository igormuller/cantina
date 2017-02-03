<?php
class caixaController extends controller {
    
    public function __construct() {
        parent::__construct();
        $u = new Usuario();
        if (!$u->isLogged()){
            header("Location: ".BASE_URL."/login");
        }
    }
    
    public function index() {
        $dados = array(
            'caixa' => array()
        );
        $caixa = new Caixa();
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y-m-d');
        
        //Verifica se existe Caixa aberto, se não tiver redireciona para abertura
        if (!$caixa->caixaAberto($data)) {
            header("Location: ".BASE_URL."/caixa/abrirCaixa");
        }
        
        $dados['caixa'] = $caixa->getCaixa($data);
        
        $this->loadTemplate('caixa', $dados);
    }
    
    public function abrirCaixa() {
        $dados = array();
        $caixa = new Caixa();
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y-m-d');
        
        //Verifica se já tem caixa aberto, se tiver retorna para o Caixa
        if ($caixa->caixaAberto($data)) {
            header("Location: ".BASE_URL."/caixa");
        }
        
        //Verifica se foi enviado informações de valor para abertura do caixa
        if (isset($_POST['valorAbrirCaixa']) && !empty($_POST['valorAbrirCaixa'])) {
            //Substitui a vírgula pelo ponto caso tenha sido digitado vírgula
            $valor = str_replace(',','.',addslashes($_POST['valorAbrirCaixa']));
            //verifica se o valor digitado é um número
            if (is_numeric($valor)) {
                $caixa->abrirCaixa($valor);
                header("Location: ".BASE_URL."/caixa");
            }            
        }
        $this->loadTemplate('abrirCaixa');
    }
    
}
?>