<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <title>Inovatech</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">Mi Negocio Equipo de computo: Inovatech</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" aria-current="page" href="#">Inicio</a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- agregar formulario de tabla pedidos -->
        <div class="card mb-5">
            <!-- <div class="card-header">
                Latihan CRUD PHP & MySQL
            </div> -->
            <!-- agregar datos del alumno -->
            <div class="card-body">
                <h3 class="card-title">Moreno Cabral Irvin Alonso 5-I</h3>
                <h3 class="card-text">Tabla Pedidos</h3>

                <p class="card-text"></p>

                <!-- mostrar mensaje de éxito agregado -->
                <?php if (isset($_GET['status'])): ?>
                    <?php
                    if ($_GET['status'] == 'sukses')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>¡Éxito!</strong> ¡Datos agregados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong>¡Error al agregar datos!
                        
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>

                <form class="row g-3" action="procesar_insertar.php" method="POST">
                    <!-- No incluimos el campo idPedido en el formulario -->
                    <div class="col-md-4">
                        <label for="idCliente" class="form-label">idCliente</label>
                        <input type="number" name="idCliente" class="form-control" placeholder="idCliente" required>
                    </div>

                    <div class="col-md-4">
                        <label for="idEmpleado" class="form-label">idEmpleado</label>
                        <input type="number" name="idEmpleado" class="form-control" placeholder="idEmpleado" required>
                    </div>

                    <div class="col-md-4">
                        <label for="fecha" class="form-label">Fecha de compra</label>
                        <input type="date" name="fecha" class="form-control" placeholder="fecha" required>
                    </div>

                    <div class="col-md-4">
                        <label for="total" class="form-label">total</label>
                        <input type="number" step="0.01" name="total" class="form-control" placeholder="total" required>
                    </div>

                    <div class="col-md-4">
                        <label for="metodoDePago" class="form-label">Metodo de pago</label>
                        <select class="form-select" name="metodoDePago" aria-label="Default select example">
                            <option value="Efectivo">Efectivo</option>
                            <option value="Transferencia">Transferencia</option>
                            <option value="Deposito">Deposito</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input type="text" name="direccion" class="form-control" placeholder="direccion" required>
                    </div>

                    <div class="col-md-4">
                        <label for="numeroDeSeguimiento" class="form-label">Numero de Seguimiento</label>
                        <input type="text" name="numeroDeSeguimiento" class="form-control"
                            placeholder="numeroDeSeguimiento" required>
                    </div>

                    <div class="col-md-6">
                        <label for "fechaDeEntrega" class="form-label">Fecha de Entrega</label>
                        <input type="date" name="fechaDeEntrega" class="form-control" placeholder="fechaDeEntrega"
                            required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="agregar">
                            <i class="fa fa-plus"></i><span class="ms-2">Agregar</span>
                        </button>
                    </div>
                </form>



                <!-- título de el option -->
                <h5 class="mb-3">Mi lista</h5>

                <div class="row my-3">
                    <div class="col-md-2 mb-3">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Mostrar entradas</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="col-md-3 ms-auto">
                        <div class="input-group mb-3 ms-auto">
                            <input type="text" class="form-control" placeholder="Buscar..." aria-label="cari"
                                aria-describedby="button-addon2">
                            <button class="btn btn-primary" type="button" id="button-addon2"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>


                <!-- mostrar mensaje de eliminación exitosa -->
                <?php if (isset($_GET['hapus'])): ?>
                    <?php
                    if ($_GET['hapus'] == 'sukses')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Éxito!</strong>¡Datos eliminados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Data gagal dihapus!
                    k='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
    <button type='button' class='btn-close' onclic                      </div>";
                    ?>
                <?php endif; ?>

                <!-- mostrar un mensaje de edición exitosa -->
                <?php if (isset($_GET['update'])): ?>
                    <?php
                    if ($_GET['update'] == 'sukses')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Éxito</strong>¡Datos actualizados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> ¡Los datos no se pudieron actualizar!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>
                <!-- Se muestra la tabla pedidos con los campos -->
                <div class="table-responsive mb-5 card">
                <center><h2 class="card-text">Tabla Pedidos</h2></center>

                    <?php
                    echo "<div class='card-body'>";

                    echo "<table class='table table-hover align-middle bg-white'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th scope='col' class='text-center'>idPedido</th>";
                    echo "<th scope='col'>idCliente</th>";
                    echo "<th scope='col'>idEmpleado</th>";
                    echo "<th scope='col'>fecha</th>";
                    echo "<th scope='col'>total</th>";
                    echo "<th scope='col'>metodoDePago</th>";
                    echo "<th scope='col'>direccion</th>";
                    echo "<th scope='col'>numeroDeSeguimiento</th>";
                    echo "<th scope='col'>fechaDeEntrega</th>";
                    echo "<th scope='col' class='text-center'>Opciones</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    $batas = 10; // Establecemos cuántos elementos se mostrarán por página.
                    // Verificamos si se proporciona un parámetro "halaman" a través de la URL, si no, asumimos 1 como valor predeterminado.
                    $halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
                    // Calculamos el índice del primer elemento a mostrar en la página actual.
                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
                    // Calculamos los números de página anterior y siguiente.
                    $previous = $halaman - 1;
                    $next = $halaman + 1;
                    // Ejecutamos una consulta SQL para seleccionar todos los registros de la tabla "tbl_pedidos" desde la base de datos representada por $db.
                    $data = mysqli_query($db, "SELECT * FROM tbl_pedidos");
                    // Obtenemos el número total de registros devueltos por la consulta.
                    $jumlah_data = mysqli_num_rows($data);
                    // Calculamos el número total de páginas necesarias para mostrar todos los registros.
                    $total_halaman = ceil($jumlah_data / $batas);


                    // Cambia el siguiente código para mostrar los datos del formulario si se ha enviado un formulario.
                    if (isset($_POST['tambah'])) {
                        // Recoge los datos del formulario
                        $idPedido = $_POST['idPedido'];
                        $idCliente = $_POST['idCliente'];
                        $idEmpleado = $_POST['idEmpleado'];
                        $fecha = $_POST['fecha'];
                        $total = $_POST['total'];
                        $metodoDePago = $_POST['metodoDePago'];
                        $direccion = $_POST['direccion'];
                        $numeroDeSeguimiento = $_POST['numeroDeSeguimiento'];
                        $fechaDeEntrega = $_POST['fechaDeEntrega'];

                        // Realiza la inserción en la base de datos
                        $sql = "INSERT INTO tbl_pedidos(idPedido, idCliente, idEmpleado, fecha, total, metodoDePago ,direccion ,numeroDeSeguimiento ,fechaDeEntrega)
                        VALUES('$idPedido', '$idCliente', '$idEmpleado', '$fecha', '$total', '$metodoDePago', '$direccion', '$numeroDeSeguimiento', '$fechaDeEntrega')";
                        $query = mysqli_query($db, $sql);
                    }
                        // se muestran los datos segun el limite
                    $data_mhs = mysqli_query($db, "SELECT * FROM tbl_pedidos LIMIT $halaman_awal, $batas");
                    $no = $halaman_awal + 1;
                        //se utiliza para mostrar los datos de la tabla
                    while ($row_tblpedido = mysqli_fetch_array($data_mhs)) {
                        echo "<tr>";
                        echo "<td>" . $row_tblpedido['idPedido'] . "</td>";
                        echo "<td>" . $row_tblpedido['idCliente'] . "</td>";
                        echo "<td>" . $row_tblpedido['idEmpleado'] . "</td>";
                        echo "<td>" . $row_tblpedido['fecha'] . "</td>";
                        echo "<td>" . $row_tblpedido['total'] . "</td>";
                        echo "<td>" . $row_tblpedido['metodoDePago'] . "</td>";
                        echo "<td>" . $row_tblpedido['direccion'] . "</td>";
                        echo "<td>" . $row_tblpedido['numeroDeSeguimiento'] . "</td>";
                        echo "<td>" . $row_tblpedido['fechaDeEntrega'] . "</td>";

                        echo "<td class='text-center'>";
                        
                        // Boton editar
                        echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                        // Boton de eliminar
                        echo "
                    <!-- Button trigger modal -->
                    <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                        echo "</td>";

                        echo "</tr>";
                    }
                    //Se muestra un mensaje que dice que no hay datos cuando no hay ningun registro
                    echo "</tbody>";
                    echo "</table>";
                    if ($jumlah_data == 0) {
                        echo "<p class='text-center'>No hay datos disponibles en esta tabla.</p>";
                    } else {
                        echo "<p>Total $jumlah_data entradas</p>";
                    }

                    echo "</div>";
                    ?>
                </div>


                <!-- paginacion sirve para el funcionamiento de el cambio de pagina -->
                <nav class="mt-5 mb-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" <?php echo ($halaman > 1) ? "href='?halaman=$previous'" : "" ?>><i
                                    class="fa fa-chevron-left"></i></a>
                        </li>
                        <?php
                        for ($x = 1; $x <= $total_halaman; $x++) {
                            ?>
                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>">
                                    <?php echo $x; ?>
                                </a></li>
                            <?php
                        }
                        ?>
                        <li class="page-item">
                            <a class="page-link" <?php echo ($halaman < $total_halaman) ? "href='?halaman=$next'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>

                <!-- Editar los datos de un registro-->
                <div class='modal fade' style="top:58px !important;" id='editModal' tabindex='-1'
                    aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog' style="margin-bottom:100px !important;">
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Editar datos tabla pedidos</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal'
                                    aria-label='Close'></button>
                            </div>

                            <?php
                            $sql = "SELECT * FROM tbl_pedidos";
                            $query = mysqli_query($db, $sql);
                            $row_tblpedido = mysqli_fetch_array($query);
                            ?>

                            <form action='edit.php' method='POST'>
                                <div class='modal-body text-start'>
                                    <input type='hidden' name='edit_idPedido' id='edit_idPedido'>


                                    <div class="col-12 mb-3">
                                        <label for="edit_idCliente" class="form-label">idCliente</label>
                                        <input type="number" name="edit_idCliente" id="edit_idCliente"
                                            class="form-control" placeholder="edit_idCliente">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="edit_idEmpleado" class="form-label">idEmpleado"</label>
                                        <input type="text" name="edit_idEmpleado" id="edit_idEmpleado"
                                            class="form-control" placeholder="edit_idEmpleado">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="edit_fecha" class="form-label">fecha"</label>
                                        <input type="date" name="edit_fecha" id="edit_fecha" class="form-control"
                                            placeholder="edit_idEmpleado">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="edit_total" class="form-label">total"</label>
                                        <input type="number" step="0.01" name="edit_total" id="edit_total"
                                            class="form-control" placeholder="edit_idEmpleado">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="edit_metodoDePago" class="form-label">metodoDePago"</label>
                                        <select class="form-select" name="edit_metodoDePago"
                                            aria-label="Default select example">
                                            <option value="Efectivo">Efectivo</option>
                                            <option value="Transferencia">Transferencia</option>
                                            <option value="Deposito">Deposito</option>
                                        </select>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="edit_direccion" class="form-label">direccion"</label>
                                        <input type="text" name="edit_direccion" id="edit_direccion"
                                            class="form-control" placeholder="edit_idEmpleado">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="edit_numeroDeSeguimiento"
                                            class="form-label">numeroDeSeguimiento"</label>
                                        <input type="text" name="edit_numeroDeSeguimiento" id="edit_numeroDeSeguimiento"
                                            class="form-control" placeholder="edit_idEmpleado">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="edit_fechaDeEntrega" class="form-label">fechaDeEntrega"</label>
                                        <input type="date" name="edit_fechaDeEntrega" id="edit_fechaDeEntrega"
                                            class="form-control" placeholder="edit_idEmpleado">
                                    </div>


                                </div>

                                <div class='modal-footer'>
                                    <button type='submit' name='edit_data' class='btn btn-primary'>Cambiar</button>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>


                <!-- Eliminar datos de una tabla pedidos-->
                <div class='modal fade' style="top:58px !important;" id='deleteModal' tabindex='-1'
                    aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Confirmacion</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal'
                                    aria-label='Close'></button>
                            </div>


                            <form action='procesar_eliminar.php' method='POST'>
                                      <!-- Confirmacion para eliminar un registro -->
                                <div class='modal-body text-start'>
                                    <input type='hidden' name='delete_idPedido' id='delete_idPedido'><!--  Se manda el dato a traves de post -->
                                    <p>¿Estás seguro de que deseas eliminar estos datos?</p>
                                </div>

                                <div class='modal-footer'>
                                    <button type='submit' name='deletedata' class='btn btn-primary'>Si, estoy seguro
                                        (:</button>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>


                <!-- tutup container -->
            </div>


            <!-- Jquery -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <!-- Javascript bule with popper bootstrap -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
                crossorigin="anonymous"></script>

            <!-- sweet alert -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

            <!-- edit function -->
            <script>
                $(document).ready(function () {
                    $('.editButton').on('click', function () {
                        $('#editModal').modal('show');

                        $tr = $(this).closest('tr');

                        var data = $tr.children("td").map(function () {
                            return $(this).text();
                        }).get();

                        console.log(data);
                        $('#edit_idPedido').val(data[0]); //Asigna el dato de idPedido
                        $('#edit_idCliente').val(data[1]); // Asigna valor al campo idCliente
                        $('#edit_idEmpleado').val(data[2]); // Asigna valor al campo idEmpleado
                        $('#edit_fecha').val(data[3]); // Asigna valor al campo fecha
                        $('#edit_total').val(data[4]); // Asigna valor al campo total

                        // Selecciona el valor del campo select 'edit_metodoDePago'
                        $('#edit_metodoDePago').val(data[5]);

                        $('#edit_direccion').val(data[6]); // Asigna valor al campo direccion
                        $('#edit_numeroDeSeguimiento').val(data[7]); // Asigna valor al campo numeroDeSeguimiento
                        $('#edit_fechaDeEntrega').val(data[8]); // Asigna valor al campo fechaDeEntrega
                    });
                });
            </script>


            <!-- dFuncion eliminar -->
            <script>
                $(document).ready(function () {
                    $('.deleteButton').on('click', function () {
                        $('#deleteModal').modal('show');

                        $tr = $(this).closest('tr');

                        var data = $tr.children("td").map(function () {
                            return $(this).text();
                        }).get();

                        console.log(data);
                        $('#delete_idPedido').val(data[0]);// sirve para mandar el dato de la posicion de array 0 
                                                           //que es idPedido
                    });
                });
            </script>

            <script>
                function clicking() {
                    window.location.href = './index.php';
                }
            </script>
</body>

</html>