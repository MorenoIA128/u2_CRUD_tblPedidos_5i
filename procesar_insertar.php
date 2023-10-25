<?php
include("./config.php");


if (isset($_POST['agregar'])) { // verifica si ya se envio el formulario
    // Se obtienen los datos atraves de POST
    $idPedido = $_POST['idPedido'];
    $idCliente = $_POST['idCliente'];
    $idEmpleado = $_POST['idEmpleado'];
    $fecha = $_POST['fecha'];
    $total = $_POST['total'];
    $metodoDePago = $_POST['metodoDePago'];
    $direccion = $_POST['direccion'];
    $numeroDeSeguimiento = $_POST['numeroDeSeguimiento'];
    $fechaDeEntrega = $_POST['fechaDeEntrega'];

    // Se insertan los datos en la tabla pedidos
    $sql = "INSERT INTO tbl_pedidos(idPedido, idCliente, idEmpleado, fecha, total, metodoDePago ,direccion ,numeroDeSeguimiento ,fechaDeEntrega)
    VALUES('$idPedido', '$idCliente', '$idEmpleado', '$fecha', '$total', '$metodoDePago', '$direccion', '$numeroDeSeguimiento', '$fechaDeEntrega')";
    $query = mysqli_query($db, $sql);

    //redirecciona al index
    if ($query)
        header('Location: ./index.php?status=sukses');
    else
        header('Location: ./index.php?status=gagal');
} else
    die("Acceso prohibido...");
