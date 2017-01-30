<?php
class model {
    protected $db;
    public function __construct(){
        global $banco;
        $this->db = $banco;
    }
}
?>