<?php
if (!isset($_SESSION['obj'])) {
    $id = '';
    $descricao = '';
    $sala = '';
    $turno = '';
    $nivel = '';
    $idioma = '';
    $numeroAulas = '';
    $lotacao = '';
    $professor = '';
    $dataInicio = '';
    $op = 'I';
} else {
    $obj = $_SESSION['obj'];
    $id = $obj->__get('id');
    $descricao = $obj->__get('descricao');
    $sala = $obj->__get('sala');
    $turno = $obj->__get('turno');
    $nivel = $obj->__get('nivel');
    $idioma = $obj->__get('idioma');
    $numeroAulas = $obj->__get('numeroAulas');
    $lotacao = $obj->__get('lotacao');
    $professor = $obj->__get('professor');
    $dataInicio = $obj->__get('dataInicio');
    $op = 'U';
}
?>

<form class="form-horizontal" action="../controller/TurmaController.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <div id="legend" class="">
            <legend class="">Nova Turma</legend>
        </div>

        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="nome">Descrição:</label>
            <div class="controls">
                <input placeholder="" class="input-xlarge" type="text" name="descricao" value="<?php echo $descricao; ?>">
                <p class="help-block"></p>
            </div>
        </div>

        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="cpf">Sala:</label>
            <div class="controls">
                <input placeholder="" class="input-medium" type="text" name="sala" value="<?php echo $sala; ?>">
                <p class="help-block"></p>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="turno">Turno:</label>
            <div class="controls">
                <select placeholder="" class="input-small" name="turno" >
                    <option value=""> Selecione ...</option> 
                    <option value="M" <?php echo $turno == 'M' ? 'selected="selected":' : ''; ?>>Manhã</option> 
                    <option value="T" <?php echo $turno == 'T' ? 'selected="selected":' : ''; ?>>Tarde</option> 
                    <option value="N" <?php echo $turno == 'N' ? 'selected="selected":' : ''; ?>>Noite</option> 
                </select>
            </div>
        </div> 

        <div class="control-group">
            <label class="control-label" for="nivel">Nível:</label>
            <div class="controls">
                <select placeholder="" class="input-small" name="nivel" >
                    <option value=""> Selecione ...</option> 
                    <option value="B" <?php echo $nivel == 'B' ? 'selected="selected":' : ''; ?>>Básico</option> 
                    <option value="I" <?php echo $nivel == 'I' ? 'selected="selected":' : ''; ?>>Intermediário</option> 
                    <option value="A" <?php echo $nivel == 'A' ? 'selected="selected":' : ''; ?>>Avançado</option> 
                </select>
            </div>
        </div> 

        <div class="control-group">
            <label class="control-label" for="idioma">Idioma:</label>
            <div class="controls">
                <select placeholder="" class="input-small" name="idioma" >
                    <option value=""> Selecione ...</option> 
                    <option value="I" <?php echo $idioma == 'I' ? 'selected="selected":' : ''; ?>>Inglês</option> 
                    <option value="E" <?php echo $idioma == 'E' ? 'selected="selected":' : ''; ?>>Espanhol</option> 
                    <option value="F" <?php echo $idioma == 'F' ? 'selected="selected":' : ''; ?>>Francês</option> 
                    <option value="A" <?php echo $idioma == 'A' ? 'selected="selected":' : ''; ?>>Alemão</option> 
                    <option value="J" <?php echo $idioma == 'J' ? 'selected="selected":' : ''; ?>>Japonês</option> 
                </select>
            </div>
        </div> 
        <div class="control-group">
            <label class="control-label" for="dataInicio">Data de Início:</label>
            <div class="controls">
                <input placeholder="" class="input-medium" type="text" name="dataInicio" value="<?php echo $dataInicio; ?>">
                <p class="help-block"></p>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="numeroAulas">Número de Aulas:</label>
            <div class="controls">
                <input placeholder="" class="input-medium" type="text" name="numeroAulas" value="<?php echo $numeroAulas; ?>">
                <p class="help-block"></p>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="lotacao">Lotação:</label>
            <div class="controls">
                <input placeholder="" class="input-xlarge" type="text" name="lotacao" value="<?php echo $lotacao; ?>">
                <p class="help-block"></p>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="professor">Professor:</label>
            <div class="controls">
                <select placeholder="" class="input-small" name="professor" >
                    <option value=""> Selecione ...</option> 
                    <?php
                    $lista = ProfessorDAO::listar();
                    foreach ($lista as $obj) {
                        ?>
                        <option value="<?php echo $obj->__get('id'); ?>" <?php echo $professor == $obj->__get('id') ? 'selected="selected":' : ''; ?> ><?php echo $obj->__get('nome'); ?></option> 
<?php } ?>
                </select>
            </div>
        </div> 

        <div class="control-group">
            <!-- Button -->
            <div class="controls">
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <input type="hidden" name="op" value="<?php echo $op; ?>"/>
                <input type="submit" class="btn btn-success" value="Salvar"/>
                <input type="reset" class="btn btn-danger" value="Limpar"/>

            </div>
        </div> 

    </fieldset>
</form>

<?php
unset($_SESSION['op']);
?>
