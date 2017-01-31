<?php
class produtoController extends controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $dados = array(
            'produtos' => array()
        );
        $produto = new Produto();
        $dados['produtos'] = $produto->getProdutos();
        $this->loadTemplate('produto', $dados);
    }
    
    public function add() {
        $dados = array();
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $preco_venda = str_replace(',','.',addslashes($_POST['preco_venda']));
            $preco_custo = str_replace(',','.',addslashes($_POST['preco_custo']));
            $descricao = addslashes($_POST['descricao']);
            
            $produto = new Produto();
            $produto->add($nome, $preco_venda, $preco_custo, $descricao);
            header("Location: ".BASE_URL."/produto");
        }
        $this->loadTemplate('produtoAdd', $dados);
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