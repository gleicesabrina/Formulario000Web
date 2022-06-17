<?php
require_once("../model/cadastroLivro.php");
class cadastroController{
    private $cadastro;
    
public function __construct(){
    $this->cadastro=newCadastro();
    $this->incluir();
}

private function incluir(){
    $this->cadastro->setNome($_POST['nome']);
    $this->cadastro->setAutor($_POST['autor']);
    $this->cadastro->setQuantidade($_POST['quantidade']);
    $this->cadastro->setPreco($_POST['preco']);
    $this->cadastro->setData(date('Y-m-d',strtotime($_POST['data'])));
    #ChamadamétodoincluirdentroclassecadastroarquivocadastroLivro.php
    $result=$this->cadastro->incluir();
    if($result>=1){
        echo"<script>alert('Registroincluídocomsucesso!');document.location='../view/cadastro.php'</script>";
        
    }else{
        echo"<script>alert('Erroaogravarregistro!,verifiqueseolivronãoestáduplicado');history.back()</script>";
        }
    }
}
new cadastroController();