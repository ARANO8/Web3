<?php
include ROOT_VIEW . "/template/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cod_mod = $_POST['cod_mod'] ?? '';
    $dsc_mod = $_POST['dsc_mod'] ?? '';
    $estado = $_POST['estado'] ?? '';

    try {
        $createdData = [
            'cod_mod' => $cod_mod,
            'dsc_mod' => $dsc_mod,
            'estado' => $estado,
        ];
        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/json",
                'content' => json_encode($createdData),
            ]
        ]);
        $response = file_get_contents(HTTP_BASE . '/controller/Seg_moduloController.php', false, $context);
        $result = json_decode($response, true);
        if ($result["ESTADO"]) {
            echo '<script>alert("Registro Guardado Exitosamente.");</script>';
        }else{
            echo '<script>alert("No se Puede Guardar.");</script>';
        }
    } catch (Exception $e) {
        echo '<script>alert("Ocurrió un error al guardar.");</script>';
    }
}

?>
<div class="wrapper">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Crear Nuevo Módulo</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Card de Formulario -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Detalles del Módulo</h3>
                            </div>
                            <div class="card-body">
                                <form id="moduleForm" action="" method="POST">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="cod_mod">Código del Módulo</label>
                                            <input type="text" class="form-control" id="cod_mod" name="cod_mod" placeholder="Ingrese el código" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="dsc_mod">Descripción</label>
                                            <input type="text" class="form-control" id="dsc_mod" name="dsc_mod" placeholder="Descripción del módulo" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="estado">Estado</label>
                                            <select class="form-control" id="estado" name="estado">
                                                <option value="ACTIVO">ACTIVO</option>
                                                <option value="INACTIVO">INACTIVO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a class="btn btn-default" href="<?php echo HTTP_BASE; ?>/seg/seg_modulo/list">Volver</a>
                                    </div>
                                </form>


                            </div>

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
</div>

<?php
include include ROOT_VIEW . "/template/footer.php";
?>