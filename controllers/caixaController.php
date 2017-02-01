<?php
class caixaController extends controller {
    
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $dados = array(
            'pedidos' => array()
        );
        $pedido = new Pedido();
        $dados['pedidos'] = $pedido->getPedidosAbertos();
        $this->loadTemplate('caixa', $dados);
    }
    
    public function novo() {
        $dados = array();
        $pedido = new Pedido();
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $pedido->newPedido($nome);
            header("Location: ".BASE_URL."/caixa");
        }
            
        $this->loadTemplate('novoPedido', $dados);
    }
    
}
?>