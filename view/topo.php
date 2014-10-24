<?php
session_start();
function __autoload($classe) {
    include_once "../model/$classe.php";
}
?>


<!-- HEADER -->
<header class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <h2>Escola de Idiomas</h2>
                        <?php echo $_SESSION['usuario']->__get('nome');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- / HEADER -->
