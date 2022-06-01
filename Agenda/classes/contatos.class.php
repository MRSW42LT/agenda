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
        $sql->bindParam(':email, $email, PDO::PARAM_STR');
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }else {
            $array = array();
        }
        return $array;
    }

    public function adicionar(
    $email,
    $nome,
    $ddd,
    $celular,
    $endereco,
    $profissao,
    $formacao,
    $facebook,
    $instagram,
    $data_nasc,
    $url_foto){

        $emailExistente = $this->existeEmail($email);
        if (count($emailExistente) == 0){
            try{
                
            }catch(PDOEXception $ex){
                return 'Erro: ' .$ex->getMessage();
            }
        }else{
            return FALSE;
        }
    }

}