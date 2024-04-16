<?php
    $id = sanitizeInput($_REQUEST['id']);
    if(isset($id)) {
        $sql = "SELECT * FROM simple WHERE id = ?";
        $params = [$id];
        $res = $conn->dbQuery($sql, $params);
        $name = $res[0]['name'];
        $birth = convertDate($res[0]['birth'], 'd.m.Y');
        $salary = $res[0]['salary'];
        $height = $res[0]['height'];
        if (isset($_REQUEST['edit_success'])) {
            $success = sanitizeInput($_REQUEST['edit_success']);
        }
        
    }
?>
<h2>Muuda isikut <?= $name ?></h2>
<div class="container">
    <?php if(isset($success) && $success): ?>
        <div class="alert alert-success">
            Sissekanne on uuendatud tabelis!
        </div>
    <?php elseif (isset($success) && !$success): ?>
        <div class="alert alert-danger">
            Sissekande uuendamisel tekkis tõrge!
        </div>
    <?php endif; ?>
    <form action="index.php?page=common&action=edit_user" method="post" autocomplete="off">
    <div class="mb-3">
        <label for="name" class="form-label">Nimi</label>
        <input type="text" class="form-control" name="name" id="name" value="<?= $name ?>" aria-describedby="name">
    </div>
    <div class="mb-3">
        <label for="birth" class="form-label">Sünniaeg</label>
        <input type="text" class="form-control datepicker" name="birth" id="birth" value="<?= $birth ?>">
    </div>
    <div class="mb-3">
        <label for="salary" class="form-label">Palk</label>
        <input type="text" class="form-control" name="salary" id="salary" value="<?= $salary ?>">
    </div>
    <div class="mb-3">
        <label for="height" class="form-label">Pikkus</label>
        <input type="text" class="form-control" name="height" id="height" value="<?= $height ?>">
    </div>
    <a class="btn btn-primary" href="index.php" role="button">&laquo; Tagasi</a>
    <button type="submit" class="btn btn-primary">Salvesta</button>
    <input type="hidden" name="id" value="<?= $id ?>">
    </form>
</div>