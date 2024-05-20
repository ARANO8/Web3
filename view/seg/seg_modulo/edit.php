<?php
include ROOT_VIEW . "/template/header.php";

$moduleId = $_GET['cod_mod'] ?? null;
$moduleData = null;



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $updateData = [
        'cod_mod' => $_POST['cod_mod'],
        'dsc_mod' => $_POST['dsc_mod'],
        'estado' => $_POST['estado'],
    ];
    $context = stream_context_create([
        'http' => [
            'method' => 'PUT',
            'header' => "Content-Type: application/json",
            'content' => json_encode($updateData),
        ]
    ]);
    $response = file_get_contents(HTTP_BASE . '/controller/Seg_moduloController.php', false, $context);
    $result = json_decode($response, true);
    if ($result["ESTADO"]) {
        echo '<script>alert("Registro Guardado  Exitosamente.");</script>';
    } else {
        echo '<script>alert("No se Puede Guardar.");</script>';
    }
}
if ($moduleId) {

    $url = HTTP_BASE . '/controller/Seg_moduloController.php?ope=filterId&cod_mod=' . $moduleId;
    $response = file_get_contents($url);
    $responseData = json_decode($response, true);

    if ($responseData && $responseData['ESTADO'] == 1 && !empty($responseData['DATA'])) {
        $moduleData = $responseData['DATA'][0];
    } else {
        $moduleData = null;
    }
}

?>
</br>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Modificar Modulo</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Editar Módulo</h3>
                            </div>
                            <form action="" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="cod_mod">Código del Módulo</label>
                                        <input type="hidden" class="form-control" id="cod_mod" name="cod_mod" value="<?php echo $moduleData['cod_mod'] ?? ''; ?>">
                                        <input type="text" class="form-control" value="<?php echo $moduleData['cod_mod'] ?? ''; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="dsc_mod">Descripción</label>
                                        <input type="text" class="form-control" id="dsc_mod" name="dsc_mod" required value="<?php echo $moduleData['dsc_mod'] ?? ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <select class="form-control" id="estado" name="estado">
                                            <option value="ACTIVO" <?php echo (isset($moduleData['estado']) && $moduleData['estado'] == 'ACTIVO') ? 'selected' : ''; ?>>ACTIVO</option>
                                            <option value="INACTIVO" <?php echo (isset($moduleData['estado']) && $moduleData['estado'] == 'INACTIVO') ? 'selected' : ''; ?>>INACTIVO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                                    <a class="btn btn-default" href="<?php echo HTTP_BASE; ?>/seg/seg_modulo/list">Volver</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php
include ROOT_VIEW . "/template/footer.php";
?>