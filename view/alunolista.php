
<table class="table table-striped">  
    <caption><h4>Listagem de Alunos</h4></caption>
    <thead>  
        <tr>  
            <th>Id</th>  
            <th>Nome</th>  
            <th>Cpf</th>  
            <th>Nivel</th>  
            <th colspan="2">Ações <input type="button" class="btn btn-success" 
                value="Novo" 
                onclick="window.location = '../controller/AlunoController.php?op=N'"/></th>
        </tr>  
    </thead>  
    <tbody>  
        <?php
        $lista = AlunoDAO::listar();
        foreach ($lista as $obj) {
            ?>
            <tr>
                <td><?php echo $obj->__get('id'); ?></td>
                <td><?php echo $obj->__get('nome'); ?></td>
                <td><?php echo $obj->__get('cpf'); ?></td>
                <td><?php echo $obj->getNivelExtenso(); ?></td>
                <td><a href="../controller/AlunoController.php?op=U&id=<?php echo $obj->__get('id');?>"><i class='icon-edit'></i></a></td>  
                <td><a href="../controller/AlunoController.php?op=D&id=<?php echo $obj->__get('id');?>" ><i class='icon-trash'></i></a></td>
            </tr>
        <?php } ?>	
       
    </tbody>  
</table>

