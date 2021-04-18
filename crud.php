<?php
include_once 'db.php';
/* code for data insert */
if(isset($_POST['save']))
{
    $fn = $MySQLiconn->real_escape_string($_POST['fn']);
    $ln = $MySQLiconn->real_escape_string($_POST['ln']);
    $SQL = $MySQLiconn->query("INSERT INTO data(fn,ln) VALUES('$fn','$ln')");

    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }
}
/* code for data insert */

/* code for data delete */
if(isset($_GET['del']))
{
    $SQL=$MySQLiconn->query("DELETE FROM data WHERE id=".$_GET['del']);
    header("Location: index.php");
}
/* code for data delete */

/*  code for data update*/

if(isset($_GET['edit'])) // Selecciona/muestra el id
{
    $SQL=$MySQLiconn->query("SELECT * FROM data WHERE id=".$_GET['edit']);
    $getROW = $SQL->fetch_array(); //vuelve el la data a string para trabajar en html
}

if(isset($_POST['update'])) //representa al boton editar // actualiza los datos en la db
{
    $SQL = $MySQLiconn->query("UPDATE data SET fn='".$_POST['fn']."'
    , ln='".$_POST['ln']."' WHERE id=".$_GET['edit']);
    header("Location: index.php");
}
/*  code for data update */







