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
                $this->email = $email;
                $this->nome = $nome;
                $this->ddd = $ddd;
                $this->celular = $celular;
                $this->endereco =  $endereco;
                $this->profissao = $profissao;
                $this->formacao =  $formacao;
                $this->facebook =  $facebook;
                $this->instagram =  $instagram;
                $this->data_nasc = $data_nasc;
                $this->url_foto = $url_foto;
                $sql = $this->con->conectar()-prepare("INSERT INTO contatos(nome, ddd, id, celular, endereco, profissao, formacao, facebook, instagram, data_nasc, url_foto) 
                                                        VALUES (:nome, :ddd, :id, :celular, :endereco, :profissao, :formacao, :facebook, :instagram, :data_nasc, :url_foto)");

                $sql->bindParam(":nome", $this->nome, PDO::PARAM_STR);
                $sql->bindParam(":ddd", $this->ddd, PDO::PARAM_STR);
                $sql->bindParam(":celular", $this->celular, PDO::PARAM_STR);
                $sql->bindParam(":email", $this->email, PDO::PARAM_STR);
                $sql->bindParam(":endereco", $this->endereco, PDO::PARAM_STR);               
                $sql->bindParam(":profissao", $this->profissao, PDO::PARAM_STR);               
                $sql->bindParam(":formacao", $this->formacao, PDO::PARAM_STR);               
                $sql->bindParam(":facebook", $this->facebook, PDO::PARAM_STR);               
                $sql->bindParam(":instagram", $this->instagram, PDO::PARAM_STR);               
                $sql->bindParam(":data_nasc", $this->data_nasc, PDO::PARAM_STR);               
                $sql->bindParam(":url_foto", $this->url_foto, PDO::PARAM_STR);     


            }catch(PDOEXception $ex){
                return 'Erro: ' .$ex->getMessage();
            }
        }else{
            return FALSE;
        }
    }

}