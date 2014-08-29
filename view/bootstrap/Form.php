

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <fieldset>
        <div id="legend" class="">
            <legend class="">Exemplo</legend>
        </div>

        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="nome">Campo1</label>
            <div class="controls">
                <input placeholder="" class="input-xlarge" type="text" name="campo1" value="">
                <p class="help-block"></p>
            </div>
        </div>

        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="cpf">Campo2</label>
            <div class="controls">
                <input placeholder="" class="input-xlarge" type="text" name="campo2" value="">
                <p class="help-block"></p>
            </div>
        </div>

        <div class="control-group">

            <!-- Textarea -->
            <label class="control-label" for="telefone">Campo3</label>
            <div class="controls">
                <input placeholder="" class="input-large" type="text" name="campo3" value="">
                <p class="help-block"></p>

            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="sexo">Campo4</label>
            <div class="controls">
            <select placeholder="" class="input-small" name="campo4" >
                <option value=""> Selecione ...</option> 
                <option value="">Opcao</option> 
		<option value="">Opcao</option> 

            </select>
            </div>
        </div> 
        <div class="control-group">
            <!-- Button -->
            <div class="controls">
                <input type="submit" class="btn btn-success" value="Salvar"/>
                <input type="reset" class="btn btn-danger" value="Limpar"/>

            </div>
        </div> 

    </fieldset>
</form>


