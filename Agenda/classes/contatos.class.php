<?php
require 'conexao.class.php';
class Contatos{
	private $id;
	private $nome;
	private $ddd;
	private $celular;
	private $email;
	private $endereco;
	private $profissao;
	private $formacao;
	private $facebook;
	private $instagram;
	private $data_nasc;
	private $url_foto;

	private $con;

	public function __construct(){
		$this->con = new Conexao();
	}
	public function __set($atributo, $valor){
		$this->atributo = $valor;
	}
	public function __get($atributo){
		return $this->atributo;
	}
    private function existeEmail($email){
        $sql = $this->con->conectar()->prepare("SELECT id FROM contatos WHERE email = :email");
    }
}