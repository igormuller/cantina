<?php
class pedidoController extends controller {
    
    public function __construct() {
        parent::__construct();
        $u = new Usuario();
        if (!$u->isLogged()){
            header("Location: ".BASE_URL."/login");
        }
    }
    
    public function index() {
        $dados = array(
            'pedidos' => array()
        );
        $pedido = new Pedido();
        $dados['pedidos'] = $pedido->getPedidosAbertos();
        $this->loadTemplate('pedido', $dados);
    }
    
    public function novo() {
        $dados = array();
        $pedido = new Pedido();
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $pedido->newPedido($nome);
            header("Location: ".BASE_URL."/pedido");
        }
            
        $this->loadTemplate('novoPedido', $dados);
    }
    
    public function ver($id_pedido) {
        $dados = array(
            'id_pedido' => $id_pedido
        );
        $produto = new Produto();
        $dados['produtos'] = $produto->getProdutosPedido($id_pedido);
        
        $this->loadTemplate('pedidoVer', $dados);
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
    
    public function finalizar($id_pedido) {
        $dados = array(
            'pedido' => array(),
        );
        $pedido = new Pedido();
        $dados['pedido'] = $pedido->getPedido($id_pedido);
        if ((isset($_POST['dinheiro']) && !empty($_POST['dinheiro'])) || (isset($_POST['debito']) && !empty($_POST['debito'])) || (isset($_POST['credito']) && !empty($_POST['credito']))) {
            $dinheiro = addslashes($_POST['dinheiro']);
            $debito = addslashes($_POST['debito']);
            $credito = addslashes($_POST['credito']);
            $soma = $dinheiro + $debito + $credito;
            if ($soma == $dados['pedido']['valor_total']){
                $pedido->finaliza($id_pedido);
                header("Location: ".BASE_URL."/pedido");
            } else {
                $dados['aviso'] = "A soma dos pagamentos deve ser igual ao valor total do pedido (R$ ".$dados['pedido']['valor_total'].")";
            }
            
            
        }
        $this->loadTemplate('finalizarPedido', $dados);
    }
    
}
?>