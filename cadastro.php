<!DOCTYPE HTML>
<html>
<?php include("head.php")?>


<script language="javascript" type = "text/javascript">
    function formatarMoeda(){
        var elemento = document.getElementByID('preco');
        var valor= preco.value;

        valor = valor +'';
        valor = parseInt(valor.replace(/[\D]+/g, ''));
        valor = valor + '';
        valor = valor.replace(/([0-9]{2})$/g, ",$1");

    if(valor.length > 6) {
        valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g,".$1,$2");
    }

    elemento.value = valor;
    }

    function validar(formulario){
    var quantidade = form.quantidade.value;
    var preco = form.preco.value;
    for (i = 0; i <= formulario.length - 2; i ++) {
        if (( formulario[i].value =="")){
        alert("Preencha o campo" + formulario[i].name);
        formulario[i].focus();
        return false;
        }
    }
    if (quantidade <= 0 ){
        alert("A quantidade de páginas não pode ser igual ou inferior a zero");
    form.quantidade.focus();
    return false;
    }
    if (preco <=0){
        alert('O preço do libro não pode ser igual ou inferior a zero');
        form.preco.focus();
        return false;
    }
    formulario.submit();
    }

</script>

<body>
<?php include("menu.php") ?>
    <div class = "row">
        <form method="post" action="../controller/ControllerCadastro.php"id="form" name="form" onsubmit="validar"(document.form); return false;"class="col-10">
        <div class="form-group">
            <div class="form-group">
                <div class="mx-auto" style="width: 500px;">
                    <label for="nome">Nome do Livro</label>
                    <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome do Livro"required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="mx-auto" style="width: 500px;">
                        <label for="autor">Nome do Autor</label>
                        <input class="form-control" type="text" id="autor" name="autor" placeholder="Autor do Livro"required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mx-auto" style="width: 500px;">
                            <label for="quantidade">Quantidade de paginas</label>
                            <input class="form-control" type="number" id="quantidade" name="quantidade" placeholder="Quantidade de Paginas"required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mx-auto" style="width: 500px;">
                            <label for="number">Valor unitário do livro</label>
                            <input class="form-control" type="text" id="preco" name="preco" placeholder="Preço do Livro" onkeypress="formatarMoeda();" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mx-auto" style="width: 500px;">
                            <label for="date">Data de lançamento do livro</label>
                            <input class="form-control" type="date" id="data" name="data" placeholder="Data de Publicação"required>
                        </div>
                    </div>
                    
                     <div class="form-group">
                        <div class="col-lg-10" style="text-align: right;">
                                <button tyype="submit" class="btn btn-success" id="cadastrar">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
        
    </body>
</html>