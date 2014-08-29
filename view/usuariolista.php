
<table class="table table-striped">  
    <caption><h4>Listagem de Alunos</h4></caption>
    <thead>  
        <tr>  
            <th>Id</th>  
            <th>Nome</th>  
            <th>Username</th>  
            <th>Email</th>  
            <th colspan="2">Ações <input type="button" class="btn btn-success" 
                value="Novo" 
                onclick="window.location = '../controller/UsuarioController.php?op=N'"/></th>
        </tr>  
    </thead>  
    <tbody>  
        <?php
        $lista = UsuarioDAO::listar();
        foreach ($lista as $obj) {
            ?>
            <tr>
                <td><?php echo $obj->__get('id'); ?></td>
                <td><?php echo $obj->__get('nome'); ?></td>
                <td><?php echo $obj->__get('username'); ?></td>
                <td><?php echo $obj->__get('email'); ?></td>
                <td><a href="../controller/UsuarioController.php?op=U&id=<?php echo $obj->__get('id');?>"><i class='icon-edit'></i></a></td>  
                <td><a href="../controller/UsuarioController.php?op=D&id=<?php echo $obj->__get('id');?>" ><i class='icon-trash'></i></a></td>
            </tr>
        <?php } ?>	
       
    </tbody>  
</table>

