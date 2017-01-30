<?php
class saidaController extends controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $dados = array(
            'saidas' => array()
        );
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
            $produto = new Produto();
            $produto->remove($id);
        }
        header("Location: ".BASE_URL."/produto");
    }
    
    public function editar($id) {
        $dados = array(
            'produto' => array()
        );
        $id = addslashes($id);
        $produto = new Produto();
        $dados['produto'] = $produto->getProduto($id);
        
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $preco_venda = str_replace(',','.',addslashes($_POST['preco_venda']));
            $preco_custo = str_replace(',','.',addslashes($_POST['preco_custo']));
            $descricao = addslashes($_POST['descricao']);
            
            $produto = new Produto();
            $produto->edit($nome, $preco_venda, $preco_custo, $descricao, $id);
            header("Location: ".BASE_URL."/produto");
        }
        
        $this->loadTemplate('produtoEditar', $dados);
    }
    
}
?>