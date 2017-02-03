<?php
class saidaController extends controller {
    
    public function __construct() {
        parent::__construct();
        $u = new Usuario();
        if (!$u->isLogged()){
            header("Location: ".BASE_URL."/login");
        }
    }
    
    public function index() {
        $dados = array(
            'saidas' => array()
        );
        
        $caixa = new Caixa();
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y-m-d');
        //Verifica se existe Caixa aberto, se não tiver redireciona para abertura
        if (!$caixa->caixaAberto($data)) {
            header("Location: ".BASE_URL."/caixa/abrirCaixa");
        }
        
        $saida = new Saida();
        $dados['saidas'] = $saida->getSaidas();
        $this->loadTemplate('saida', $dados);
    }
    
    public function add() {
        $dados = array();
        if (isset($_POST['dt_saida']) && !empty($_POST['dt_saida'])) {
            $dt_saida = new DateTime();
            $dt_saida = DateTime::createFromFormat("d/m/Y", $_POST['dt_saida']);
            $dt_saida = $dt_saida->format("Y-m-d");
            $valor = str_replace(',','.',addslashes($_POST['valor']));
            $descricao = addslashes($_POST['descricao']);
            $responsavel = addslashes($_POST['responsavel']);
            
            $saida = new Saida();
            $saida->add($dt_saida, $valor, $descricao, $responsavel);
            
            header("Location: ".BASE_URL."/saida");
        }
        $this->loadTemplate('saidaAdd', $dados);
    }
    
    public function excluir($id) {
        if (!empty($id)) {
            $saida = new Saida();
            $saida->remover($id);
        }
        header("Location: ".BASE_URL."/saida");
    }
    
    public function editar($id) {
        $dados = array(
            'saida' => array()
        );
        $id = addslashes($id);
        $saida = new Saida();
        $dados['saida'] = $saida->getSaida($id);
        
        if (isset($_POST['dt_saida']) && !empty($_POST['dt_saida'])) {
            $dt_saida = new DateTime();
            $dt_saida = DateTime::createFromFormat("d/m/Y", $_POST['dt_saida']);
            $dt_saida = $dt_saida->format("Y-m-d");
            $valor = str_replace(',','.',addslashes($_POST['valor']));
            $descricao = addslashes($_POST['descricao']);
            $responsavel = addslashes($_POST['responsavel']);
            
            $saida = new Saida();
            $saida->editar($dt_saida, $valor, $descricao, $responsavel, $id);
            
            header("Location: ".BASE_URL."/saida");
        }
        
        $this->loadTemplate('saidaEditar', $dados);
    }
    
}
?>