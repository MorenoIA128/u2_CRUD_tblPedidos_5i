<?php
include("./config.php");

// Verificar si el formulario de edición se ha enviado
if (isset($_POST['edit_data'])) {
    // Recoger datos del formulario
    $id = $_POST['edit_idPedido'];
    $idCliente = $_POST['edit_idCliente'];
    $idEmpleado = $_POST['edit_idEmpleado'];
    $fecha = $_POST['edit_fecha'];
    $total = $_POST['edit_total'];
    $metodoDePago = $_POST['edit_metodoDePago'];
    $direccion = $_POST['edit_direccion'];
    $numeroDeSeguimiento = $_POST['edit_numeroDeSeguimiento'];
    $fechaDeEntrega = $_POST['edit_fechaDeEntrega'];

    // Actualizar los datos en la base de datos
    $sql = "UPDATE tbl_pedidos SET 
                idCliente = '$idCliente', 
                idEmpleado = '$idEmpleado', 
                fecha = '$fecha', 
                total = '$total', 
                metodoDePago = '$metodoDePago', 
                direccion = '$direccion', 
                numeroDeSeguimiento = '$numeroDeSeguimiento', 
                fechaDeEntrega = '$fechaDeEntrega' 
            WHERE idPedido = '$id'";

    $query = mysqli_query($db, $sql);

    // Verificar si la consulta se realizó con éxito
    if ($query) {
        header('Location: ./index.php?update=sukses');
    } else {
        header('Location: ./index.php?update=gagal');
    }
} else {
    die("Akses dilarang...");
}
?>
