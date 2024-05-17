<?php
$page = 1;
$ope = "filterSearch";
$filter = "";
$items_per_page = 10;
$total_pages = 1;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $filter =  isset($_POST['filter']) ? $_POST['filter'] : '';
}
$url = HTTP_BASE . "/controller/Seg_moduloController.php?ope=filterSearch&page=" . $page . "&filter=" . $filter;

$response = file_get_contents($url);
$responseData = json_decode($response, true);
$records = $responseData['DATA'];
$totalItems = $responseData['LENGTH'];
try {
    $total_pages = ceil($totalItems / $items_per_page);
} catch (Exception $e) {
    $total_pages = 1;
}
include ROOT_VIEW . "/template/header.php";
//Paginacion 
$max_links = 5; 
$half_max_links = floor($max_links / 2);

$start_page = $page - $half_max_links;
$end_page = $page + $half_max_links;

if ($start_page < 1) {
    $end_page += abs($start_page) + 1;
    $start_page = 1;
}

if ($end_page > $total_pages) {
    $start_page -= ($end_page - $total_pages);
    $end_page = $total_pages;
    if ($start_page < 1) {
        $start_page = 1;
    }
}
?>
<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Modulos</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Seguridad</a></li>
                                <li class="breadcrumb-item active">Modulos</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="m-0">Adminsitración de Modulos </h1>
                        </div>
                        <div class="card-header">
                            <form action="" method="POST">
                                <div class="input-group">
                                    <input type="filter" name="filter" class="form-control form-control-lg" placeholder="Buscar" value="<?php echo $filter; ?>">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="bd-example">
                                <a href="<?= HTTP_BASE . '/seg/seg_modulo/create' ?>" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Nuevo</a>
                                <a href="<?= HTTP_BASE . '/report/rpt_pdf_seg_modulo.php' ?>" class="btn btn-success btn-sm" target="_blank"> <i class="fas fa-file-pdf"></i> Reporte</a>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Codigo</th>
                                            <th>Descripción</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($records as $module) : ?>
                                            <tr>
                                                <td>
                                                    <a href="<?= HTTP_BASE . '/seg/seg_modulo/edit/' . $module['cod_mod'] ?>" class="btn btn-primary btn-sm">Editar</a>
                                                    <a href="<?= HTTP_BASE . '/seg/seg_modulo/delete/' . $module['cod_mod'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                                </td>
                                                <td><?= htmlspecialchars($module['cod_mod']) ?></td>
                                                <td><?= htmlspecialchars($module['dsc_mod']) ?></td>
                                                <td><?= htmlspecialchars($module['estado']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix">
                                <ul class="pagination">
                                    <?php if ($page > 1) : ?>
                                        <li class="page-item">
                                            <form action="" method="POST">
                                                <input type="hidden" name="page" value="1">
                                                <button type="submit" class="page-link">Primera</button>
                                            </form>
                                        </li>
                                        <li class="page-item">
                                            <form action="" method="POST">
                                                <input type="hidden" name="page" value="<?= $page - 1 ?>">
                                                <button type="submit" class="page-link">&laquo;</button>
                                            </form>
                                        </li>
                                    <?php endif; ?>

                                    <?php for ($i = $start_page; $i <= $end_page; $i++) : ?>
                                        <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
                                            <form action="" method="POST">
                                                <input type="hidden" name="page" value="<?= $i ?>">
                                                <button type="submit" class="page-link"><?= $i ?></button>
                                            </form>
                                        </li>
                                    <?php endfor; ?>

                                    <?php if ($page < $total_pages) : ?>
                                        <li class="page-item">
                                            <form action="" method="POST">
                                                <input type="hidden" name="page" value="<?= $page + 1 ?>">
                                                <button type="submit" class="page-link">&raquo;</button>
                                            </form>
                                        </li>
                                        <li class="page-item">
                                            <form action="" method="POST">
                                                <input type="hidden" name="page" value="<?= $total_pages ?>">
                                                <button type="submit" class="page-link">Última</button>
                                            </form>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
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