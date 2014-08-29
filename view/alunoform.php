<?php
if (!isset($_SESSION['obj'])) {
    $id = '';
    $nome = '';
    $cpf = '';
    $telefone = '';
    $endereco = '';
    $sexo = '';
    $email = '';
    $nivel = '';
    $op='I';
} else {
    $obj = $_SESSION['obj'];
    $id = $obj->__get('id');
    $nome = $obj->__get('nome');
    $cpf = $obj->__get('cpf');
    $telefone = $obj->__get('telefone');
    $endereco = $obj->__get('endereco');
    $sexo = $obj->__get('sexo');
    $email = $obj->__get('email');
    $nivel = $obj->__get('nivel');
    $op='U';
}
?>

<form class="form-horizontal" action="../controller/AlunoController.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <div id="legend" class="">
            <legend class="">Novo Aluno</legend>
        </div>

        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="nome">Nome:</label>
            <div class="controls">
                <input placeholder="" class="input-xlarge" type="text" name="nome" value="<?php echo $nome;?>">
                <p class="help-block"></p>
            </div>
        </div>

        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="cpf">CPF:</label>
            <div class="controls">
                <input placeholder="" class="input-medium" type="text" name="cpf" value="<?php echo $cpf;?>">
                <p class="help-block"></p>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="telefone">Telefone:</label>
            <div class="controls">
                <input placeholder="" class="input-medium" type="text" name="telefone" value="<?php echo $telefone;?>">
                <p class="help-block"></p>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="endereco">Endereço:</label>
            <div class="controls">
                <input placeholder="" class="input-xlarge" type="text" name="endereco" value="<?php echo $endereco;?>">
                <p class="help-block"></p>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="sexo">Sexo:</label>
            <div class="controls">
                <select placeholder="" class="input-small" name="sexo" >
                    <option value=""> Selecione ...</option> 
                    <option value="M" <?php echo $sexo=='M'?'selected="selected":':'';?> >Masc</option> 
                    <option value="F" <?php echo $sexo=='F'?'selected="selected":':'';?>>Fem</option> 
                </select>
            </div>
        </div> 


        <div class="control-group">
            <label class="control-label" for="email">Email:</label>
            <div class="controls">
                <input placeholder="" class="input-xlarge" type="text" name="email" value="<?php echo $email;?>">
                <p class="help-block"></p>
            </div>
        </div>


        <div class="control-group">
            <label class="control-label" for="nivel">Nível:</label>
            <div class="controls">
                <select placeholder="" class="input-small" name="nivel" >
                    <option value=""> Selecione ...</option> 
                    <option value="B" <?php echo $nivel=='B'?'selected="selected":':'';?>>Básico</option> 
                    <option value="I" <?php echo $nivel=='I'?'selected="selected":':'';?>>Intermediário</option> 
                    <option value="A" <?php echo $nivel=='A'?'selected="selected":':'';?>>Avançado</option> 
                </select>
            </div>
        </div> 


        <div class="control-group">
            <!-- Button -->
            <div class="controls">
                <input type="hidden" name="id" value="<?php echo $id;?>"/>
                <input type="hidden" name="op" value="<?php echo $op;?>"/>
                <input type="submit" class="btn btn-success" value="Salvar"/>
                <input type="reset" class="btn btn-danger" value="Limpar"/>

            </div>
        </div> 

    </fieldset>
</form>

<?php
unset($_SESSION['op']);
?>
