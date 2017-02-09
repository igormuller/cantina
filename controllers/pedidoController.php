<?php
class pedidoController extends controller {
    
    public function __construct() {
        parent::__construct();
        $u = new Usuario();
        if (!$u->isLogged()){
            header("Location: ".BASE_URL."/login");
        } else {
            $caixa = new Caixa();
            date_default_timezone_set('America/Sao_Paulo');
            $data = date('Y-m-d');
            //Verifica se existe Caixa aberto, se não tiver redireciona para abertura
            if (!$caixa->caixaAberto($data)) {
                header("Location: ".BASE_URL."/caixa/abrir");
            }
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
            'pedido' => array()
        );
        $produto = new Produto();
        $dados['produtos'] = $produto->getProdutosPedido($id_pedido);
        $pedido = new Pedido();
        $dados['pedido'] = $pedido->getPedido($id_pedido);
        
        $this->loadTemplate('pedidoVer', $dados);
    }
    
    public function pedidoAddProduto($id_pedido) {
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
        
        $this->loadTemplate('pedidoAddProduto', $dados);
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
            $dinheiro = str_replace(',','.',addslashes($_POST['dinheiro']));
            $debito = str_replace(',','.',addslashes($_POST['debito']));
            $credito = str_replace(',','.',addslashes($_POST['credito']));
            $soma = $dinheiro + $debito + $credito;
            if ($soma == $dados['pedido']['valor_total']){
                if ($dinheiro > '0') {
                    $pedido->inserirPagamento($id_pedido, '1', $dinheiro);
                }
                if ($debito > '0') {
                    $pedido->inserirPagamento($id_pedido, '2', $debito);
                }
                if ($credito > '0') {
                    $pedido->inserirPagamento($id_pedido, '3', $credito);
                }
                
                
                $caixa = new Caixa();
                $c = $caixa->getCaixaData($dados['pedido']['dt_pedido']);
                if (!empty($c)) {
                    $id_caixa = $c['id'];

                    $pedido->finaliza($id_pedido);

                    $caixa->incluirCaixaItem($id_caixa,'1', $id_pedido);
                    header("Location: ".BASE_URL."/pedido");
                } else {
                    $dados['aviso'] = "Nenhum caixa aberto para a data do pedido, ".date('d/m/Y',strtotime($dados['pedido']['dt_pedido']));
                }

            } else {
                $dados['aviso'] = "A soma dos pagamentos deve ser igual ao valor total do pedido (R$ ".number_format($dados['pedido']['valor_total'],2,',','.').")";
            }
            
            
        }
        $this->loadTemplate('pedidoFinalizar', $dados);
    }
    
}
?>