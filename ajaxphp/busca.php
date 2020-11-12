<?php header('Content-Type: text/html; iso-8859-1');?>
<?php
$conecta =new PDO('mysql:host=localhost;dbname=system;charset=utf8mb4', 'root', '');

//fim da conexão com o banco de dados

$palavra = $_POST['palavra'];

$sql = "SELECT * FROM usuario WHERE nome LIKE '%$palavra%'";
$query =$conecta->prepare($sql);
$query->execute();
$qtd=$query->fetch();

?>
<section class="panel col-lg-9">

    <header class="panel-heading">
        Dados da busca:
    </header>
    
    <table class="table table-striped table-advance table-hover">
        <tbody>
            <tr>
                <th><i class="icon_profile"></i> Id</th>
                <th><i class="icon_profile"></i> Nome</th>
                <th><i class="icon_mail_alt"></i> E-mail</th>
            </tr>
            <?php 
                foreach ($query->fetchAll() as $linha){
            ?>
            <tr>
                <td><?=$linha['id'];?></td>
                <td><?=$linha['nome'];?></td>
                <td><?=$linha['email'];?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
   
  
  
</section>