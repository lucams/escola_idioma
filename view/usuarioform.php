<?php
if (!isset($_SESSION['obj'])) {
    $id = '';
    $nome = '';
    $username = '';
    $password = '';
    $email = '';
    $op = 'I';
} else {
    $obj = $_SESSION['obj'];
    $id = $obj->__get('id');
    $nome = $obj->__get('nome');
    $username = $obj->__get('username');
    $password = $obj->__get('password');
    $email = $obj->__get('email');
    $op = 'U';
}
?>

<form class="form-horizontal" action="../controller/UsuarioController.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <div id="legend" class="">
            <legend class="">Novo Usuário</legend>
        </div>

        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="nome">Nome:</label>
            <div class="controls">
                <input placeholder="" class="input-xlarge" type="text" name="nome" value="<?php echo $nome; ?>">
                <p class="help-block"></p>
            </div>
        </div>

        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="username">Username:</label>
            <div class="controls">
                <input placeholder="" class="input-medium" type="text" name="username" value="<?php echo $username; ?>">
                <p class="help-block"></p>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="password">Password:</label>
            <div class="controls">
                <input placeholder="" class="input-medium" type="password" name="password" value="<?php echo $password; ?>">
                <p class="help-block"></p>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="email">Email:</label>
            <div class="controls">
                <input placeholder="" class="input-xlarge" type="text" name="email" value="<?php echo $email; ?>">
                <p class="help-block"></p>
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
