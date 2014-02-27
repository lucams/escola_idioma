
<table class="table table-striped">  
    <caption><h4>Listagem de Turmas</h4></caption>
    <thead>  
        <tr>  
            <th>Id</th>  
            <th>Descrição</th>  
            <th>Sala</th>  
            <th>Idioma</th>  
            <th>Data Início</th>  
            <th>Professor</th>  
            <th colspan="2">Ações <input type="button" class="btn btn-success" 
                value="Novo" 
                onclick="window.location = '../controller/TurmaController.php?op=N'"/></th>
        </tr>  
    </thead>  
    <tbody>  
        <?php
        $lista = TurmaDAO::listar();

        foreach ($lista as $obj) {
            ?>
            <tr>
                <td><?php echo $obj->__get('id'); ?></td>
                <td><?php echo $obj->__get('descricao'); ?></td>
                <td><?php echo $obj->__get('sala'); ?></td>
                <td><?php echo $obj->__get('idioma'); ?></td>
                <td><?php echo $obj->__get('dataInicio'); ?></td>
                <td><?php echo $obj->__get('professor')->__get('nome'); ?></td>
                <td><a href="../controller/TurmaController.php?op=U&id=<?php echo $obj->__get('id');?>"><i class='icon-edit'></i></a></td>  
                <td><a href="../controller/TurmaController.php?op=D&id=<?php echo $obj->__get('id');?>" ><i class='icon-trash'></i></a></td>
            </tr>
        <?php } ?>	
       
    </tbody>  
</table>

