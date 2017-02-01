<?php
class pedidoController extends controller {
    
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        header("Location: ".BASE_URL."/caixa");
    }
    
    public function ver($id_pedido) {
        $dados = array(
            'id_pedido' => $id_pedido
        );
        $produto = new Produto();
        $dados['produtos'] = $produto->getProdutosPedido($id_pedido);
        
        $this->loadTemplate('pedido', $dados);
    }
    
    public function adicionarProduto($id_pedido) {
        $dados = array();
        $produto = new Produto();
        $dados['produtos'] = $produto->getProdutosAtivos();
        
        if (isset($_POST['produto']) && !empty($_POST['produto'])) {
            $id_produto = addslashes($_POST['produto']);
            $qtde = addslashes($_POST['qtde']);
            $pedido = new Pedido();
            $pedido->addProduto($id_pedido, $id_produto, $qtde);
            
            header("Location: ".BASE_URL."/pedido/ver/".$id_pedido);
        }
        
        $this->loadTemplate('adicionarProduto', $dados);
    }
    
    public function excluir($id_pedido, $id_produto, $id) {
        $pedido = new Pedido();
        $pedido->excluirProdutoPedido($id_pedido, $id_produto, $id);
        header("Location: ".BASE_URL."/pedido/ver/".$id_pedido);
    }
    
}
?>