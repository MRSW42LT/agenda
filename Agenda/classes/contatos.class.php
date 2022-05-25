<?php
require 'conexao.class.php';
class Contatos{
    private $id;
    private $nome;
    private $ddd;

    private $con;

    public function __construct(){
        $this->con = new Connection();
    }
    public function __set($atributo, $valor){
        $this->atributo = $valor;
    }
    public function __get($atributo){
        return $this->atributo;
    }
}