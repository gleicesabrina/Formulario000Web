<?php

require_once("../model/banco.php");

class editarController
{

    private $editar;
    private $nome;
    private $autor;
    private $quantidade;
    private $preco;
    private $data;
    private $flag;


    public function __construct($id)
    {
        $this->editar = new Banco();
        $this->criarFormulario($id);
    }
    private function criarFormulario($id)
    {


        if ($id != null) {
            # chama o método pesquisaLivro para montar o formulário com os dados vindo do banco de dados
            $row = $this->editar->pesquisaLivro($id);
            $this->nome         = $row['nome'];
            $this->autor        = $row['autor'];
            $this->quantidade   = $row['quantidade'];
            $this->preco        = $row['preco'];
            $this->data         = $row['data'];
            $this->flag         = $row['flag'];
        }
    }
    #Depois de carregado os dados no formulário o método editarFromulario  
    public function editarFormulario($nome, $autor, $quantidade, $preco, $data, $flag, $id)
    {
        #Atribuir os novos valores no atributo editar no métodos __construct chamando o métodos updateLivro da classe banco
        if ($this->editar->updateLivro($nome, $autor, $quantidade, $preco, $flag, $data, $id) == TRUE) {
            echo "<script>alert('Registro atualizado com sucesso!');document.location='../view/index.php'</script>";
        } else {
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }

    /*As função Get significa pegar, acessar... informação de uma variável de um objeto*/
    # Ou seja, get le o valor na variável vindas do formulário    

    public function getNome()
    {
        return $this->nome;
    }
    public function getAutor()
    {
        return $this->autor;
    }
    public function getQuantidade()
    {
        return $this->quantidade;
    }
    public function getPreco()
    {
        return $this->preco;
    }
    public function getData()
    {
        return $this->data;
    }
    public function getFlag()
    {
        return $this->flag;
    }
}
$id = filter_input(INPUT_GET, 'id');
$editar = new editarController($id);
if (isset($_POST['submit'])) {
    $editar->editarFormulario($_POST['nome'], $_POST['autor'], $_POST['quantidade'], $_POST['preco'], $_POST['data'], $_POST['flag'], $_POST['id']);
}
