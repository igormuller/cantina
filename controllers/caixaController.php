<?php
class caixaController extends controller {
    
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $dados = array();
        $this->loadTemplate('caixa', $dados);
    }
    
}
?>