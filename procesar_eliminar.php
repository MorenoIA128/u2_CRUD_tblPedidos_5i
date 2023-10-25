<?php
include("./config.php");

if (isset($_POST['deletedata'])) {
    // Obtén el id desde el formulario
    $id = $_POST['delete_idPedido']; 

    // Agregar un mensaje de depuración para verificar el valor del ID
    echo "Valor de ID a eliminar: " . $id;

    // Consulta para eliminar el registro
    $sql = "DELETE FROM tbl_pedidos WHERE idPedido = '$id'"; 

    // Ejecuta la consulta
    $query = mysqli_query($db, $sql);

    // Verifica si la consulta de eliminación se realizó con éxito
    if ($query) {
        header('Location: ./index.php?hapus=sukses');
    } else {
        header('Location: ./index.php?hapus=gagal');
    }
} else {
    die("Acceso prohibido...");
}
?>
