<!DOCTYPE html>
<html lang="pt-BR">
    <br>
    <div class="container">
        <div class="row">
        <title>Lista de usuários comuns.</title>
            <h1>Usuários.<h1>
            <hr>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Login</th>
                        <th>Permissão</th>
                        <th><button type="button" class="btn btn-light" onclick="window.location.href='index.php'">Novo</button></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('../controller/UsuarioController.php');
                        $usuarios = call_user_func(array('UsuarioController', 'listarTodos'));
                        var_dump($usuarios);
                        if(isset($usuarios) && !empty($usuarios)){
                            foreach($usuarios as $usuario){
                                ?>
                                    <tr>
                                        <td><?php echo $usuario->getLogin(); ?></td>
                                        <td><?php echo $usuario->getPermissao() == 'A'?'Administrador':'Comum'; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick="window.location.href='index.php?action=usuarioEditar&id=<?php echo $usuario->getId();?>'">Editar</button>
                                            <button type="button" class="btn btn-danger"  onclick="window.location.href='index.php?action=usuarioExcluir&id=<?php echo $usuario->getId();?>'">Excluir</button>
                                            
                                        </td>
                                    </tr>
                                <?php
                            }
                        } else {
                            ?>
                                <tr>
                                    <td colspan="5">Nenhum registro encontrado!</td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</html>