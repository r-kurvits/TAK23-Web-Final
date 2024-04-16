<?php
    $sql = "SELECT COUNT(id) AS total FROM simple";
    $filterConditions = [];

    $name = isset($_GET['name']) ? sanitizeInput($_GET['name']) : '';
    $birth = isset($_GET['birth']) ? sanitizeInput($_GET['birth']) : '';
    $salary = isset($_GET['salary']) ? sanitizeInput($_GET['salary']) : '';
    $height = isset($_GET['height']) ? sanitizeInput($_GET['height']) : '';
    $addedStart = isset($_GET['added_start']) ? sanitizeInput($_GET['added_start']) : '';
    $addedEnd = isset($_GET['added_end']) ? sanitizeInput($_GET['added_end']) : '';
    $num_of_rows = isset($_GET['num_of_rows']) ? sanitizeInput($_GET['num_of_rows']) : '5';

    $successMessage = '';
    $alertClass = '';
    if (isset($_REQUEST['add_success'])) {
        $add_success = (sanitizeInput($_REQUEST['add_success']) === 'false') ? false : true;
        $successMessage = $add_success ? 'Sissekanne on edukalt tabelisse lisatud!' : 'Sissekande lisamisel tekkis tõrge!';
        $alertClass = $add_success ? 'alert-success' : 'alert-danger';
    } elseif (isset($_REQUEST['delete_success'])) {
        $delete_success = (sanitizeInput($_REQUEST['delete_success']) === 'false') ? false : true;
        $successMessage = $delete_success ? 'Sissekanne on edukalt tabelist kustutatud!' : 'Sissekande kustutamisel tekkis tõrge!';
        $alertClass = $delete_success ? 'alert-success' : 'alert-danger';
    }

    if (!empty($name)) {
        $filterConditions[] = "name LIKE '%$name%'";
    }
    
    if (!empty($birth)) {
        $filterConditions[] = "birth = '".convertDate($birth, 'Y-m-d')."'";
    }
    
    if (!empty($salary)) {
        $filterConditions[] = "salary = '$salary'";
    }
    
    if (!empty($height)) {
        $filterConditions[] = "height = '$height'";
    }
    
    if (!empty($addedStart) && !empty($addedEnd)) {
        $filterConditions[] = "added BETWEEN '".convertDate($addedStart, 'Y-m-d')." 00:00:00' AND '".convertDate($addedEnd, 'Y-m-d')." 23:59:59'";
    } elseif (!empty($addedStart)) {
        $filterConditions[] = "added >='".convertDate($addedStart, 'Y-m-d')." 00:00:00'";
    } elseif (!empty($addedEnd)) {
        $filterConditions[] = "added <='".convertDate($addedEnd, 'Y-m-d')." 23:59:59'";
    }
    
    if (!empty($filterConditions)) {
        $sql .= " WHERE " . implode(" AND ", $filterConditions);
    }
    $resTotal = $conn->dbQuery($sql);
    $total = $resTotal[0]['total'];

    if($total > 0) {
        $pg = isset($_GET['pg']) ? max(1, sanitizeInput($_GET['pg'])) : 1;
    } else {
        $pg = 1;
    }
    if(!empty($num_of_rows)) {
        $maxPerPage =  $num_of_rows;
    } else {
        $maxPerPage = 5;
    }
    $pageCount = ceil($total / $maxPerPage);
    $pg = min($pg, $pageCount);
    $start = max(0, ($pg - 1) * $maxPerPage);

    $sort_by = isset($_GET['sort_by']) ? sanitizeInput($_GET['sort_by']) : 'added';
    $sort_dir = isset($_GET['sort_dir']) ? sanitizeInput($_GET['sort_dir']) : 'DESC';

    $sql = "SELECT * FROM simple";

    if (!empty($filterConditions)) {
        $sql .= " WHERE " . implode(" AND ", $filterConditions);
    }
    $sql .= " ORDER BY $sort_by $sort_dir LIMIT $start, $maxPerPage;";
    
    $res = $conn->dbQuery( $sql );
    $header = ["#" => "#", "name"=>"Nimi", "birth"=>"Sünniaeg", "salary" => "Palk", "height" => "Pikkus", "added" => "Lisatud", "" => ""];
    
?>
<h2 class="mt-5">Avaleht</h2>
<div class="container px-0 mb-4">
    <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#filter" aria-expanded="false" aria-controls="filter">Filter</button>
    <a class="btn btn-warning" href="index.php?page=main" role="button">Algväärtused</a>
    <a class="btn btn-primary" href="index.php?page=add" role="button">Uus isik</a>
</div>
<div class="collapse mb-2" id="filter">
    <div class="card card-body">
        <?php include('assets/filter.php'); ?>
    </div>
</div>
<?php if($successMessage): ?>
    <div class="alert <?= $alertClass ?>">
        <?= $successMessage ?>
    </div>
<?php endif; ?>
<?php if($total > 0): ?>
    <table class="table table-hover table-bordered mb-0">
        <thead>
            <tr class="text-center">
                <?php foreach($header as $key => $h): ?>
                    <?php
                        if($key == "#") {
                            $style = "width: 50px;";
                        } elseif ($key == "") {
                            $style = "width: 100px;";
                        } else if ($key == "name") {
                            $style = "width: 200px";
                        }
                    ?>
                    <?php if ($key == "#" || $key == "" ): ?>
                        <th style="<?= $style ?>"><?= $h ?></th>
                    <?php else: ?>
                        <th style="<?= $style ?>">
                            <?php
                                if ($sort_by == $key && $sort_dir == "DESC") {
                                    $icon = '<i class="fa-solid fa-sort-down"></i>';
                                } elseif ($sort_by == $key && $sort_dir == "ASC") {
                                    $icon = '<i class="fa-solid fa-sort-up"></i>';
                                } else {
                                     $icon = '<i class="fa-solid fa-sort"></i>';
                                }
                            ?>
                            <a class="text-decoration-none text-reset table-header" href="index.php?pg=<?= $pg ?>&sort_by=<?= $key ?>&sort_dir=<?= ($sort_by == $key && $sort_dir == 'ASC') ? 'DESC' : 'ASC' ?>"><?= $h ?> <?= $icon ?></a>
                        </th>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = ($pg - 1) * $maxPerPage + 1;
                foreach($res as $key => $val) {
                    $birth = convertDate($val['birth'], 'd.m.Y');
                    $added = convertDate($val['added'], 'd.m.Y H:i:s');
            ?>
                    <tr>
                        <td class="text-end"><?= $i ?></td>
                        <td><?= $val['name'] ?></td>
                        <td class="text-center"><?= $birth ?></td>
                        <td class="text-end"> <?= $val['salary'] ?></td>
                        <td class="text-end"> <?= $val['height'] ?></td>
                        <td class="text-end"> <?= $added ?></td>
                        <td>
                            <a class="text-decoration-none text-reset" href="index.php?page=edit&id=<?= $val['id'] ?>"><i class="fas fa-edit"></i></a>
                            <a class="text-decoration-none text-reset" href="index.php?page=index.php&action=delete_user&id=<?= $val['id'] ?>" onclick="if(confirm('Kas oled kindel, et soovid isiku nimega <?= $val['name'] ?> kustutada?')) { return true; } else { return false;}"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
            <?php
                    $i++;
                }
            ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        <span class="mb-4 text-muted"><i>Ridu kokku: <?= $total ?></i></span>
    </div>
    <?php include('assets/pagination.php'); ?>
<?php else: ?>
    <div class="alert alert-danger">Sobivaid kirjeid ei leitud.</div>
<?php endif; ?>