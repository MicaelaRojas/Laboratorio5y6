<!-- llamar a archivo crud (el archivo crud ya está llamando a la db) -->
<?php 
include_once 'crud.php'; //siempre cerrar línea de ejecución en php con ;
?>
<!-- llamar a archivo crud (el archivo crud ya está llamando a la db) -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Ejemplo CRUD</title>
</head>
<body>
<center>
    <br>
    <br>
    <div id="form">
        <form method="post">
            <table width="100%" border="1" cellpadding="15">
                <tr>
                    <td>
                        <input type="text" name="fn" placeholder="Nombre" value="<?php
                        if(isset($_GET['edit'])) echo $getROW['fn']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                    <input type="text" name="ln" placeholder="Apellido"value="<?php
                        if(isset($_GET['edit'])) echo $getROW['ln']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                       <?php 
                       if (isset($_GET['edit'])){
                           ?>
                           <button type="submit" name="update">Editar</button>
                           <?php
                       }else{
                           ?>
                           <button type="submit" name="save">Registrar</button>
                           <?php
                       }
                       ?>
                    </td>
                </tr>
            </table>
        </form>
        <br><br>
        <table width="100%" border="1" cellpadding="15" align="center"> <!--tabla para listar los registros de la db -->
            <?php 
            $res = $MySQLiconn->query("SELECT * FROM data"); //Si al 
            pasar al fetch_array se genera una fila 
            (en la tabla) que se esriba en row
            //n° registros = n°filas
            while ($row=$res->fetch_array()){
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['fn']; ?></td>
                <td><?php echo $row['ln']; ?></td>
                <!-- Se envia por $GET la "variable edit" 
                del valor del row id (posisión donde se encuentra la data a editar)  -->  
                <td><a href="?edit=<?php echo $row ['id']; 
                ?>" onclick="return confirm('Confirmar edicion')">Editar</a></td> 
                <!-- Se envia por $GET la "variable del" 
                del valor del row id (posisión donde se encuentra la data a eliminar)  -->
                <td><a href="?del=<?php echo $row ['id']; 
                ?>" onclick="return confirm('Confirmar eliminación')">Eliminar</a></td> 
                
                
            </tr>
            <?php   
            }
            ?>
        </table>
    </div>
</center>
</body>
</html>