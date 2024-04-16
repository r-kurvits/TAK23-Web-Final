<h5 class="mb-4">Otsi väärtuste järgi</h5>
<form action="index.php" method="GET" autocomplete="off">
    <div class="input-group flex-nowrap mb-3 filter-input">
        <span class="input-group-text">Nimi</span>
        <div class="col-md-3">
            <input type="text" name="name" class="form-control" placeholder="Sisesta nimi" aria-label="name" aria-describedby="addon-wrapping" value="<?= $name ?>">
        </div>
    </div>
    <div class="input-group flex-nowrap mb-3 filter-input">
        <span class="input-group-text">Sünniaeg</span>
        <div class="col-md-3">
            <input type="text" name="birth" class="form-control datepicker" placeholder="Sisesta sünniaeg" aria-label="birth" aria-describedby="addon-wrapping" value="<?= $birth ?>">
        </div>
    </div>
    <div class="input-group flex-nowrap mb-3 filter-input">
        <span class="input-group-text">Palk</span>
        <div class="col-md-3">
            <input type="text" name="salary" class="form-control" placeholder="Sisesta palk" aria-label="salary" aria-describedby="addon-wrapping" value="<?= $salary ?>">
        </div>
    </div>
    <div class="input-group flex-nowrap mb-3 filter-input">
        <span class="input-group-text">Pikkus</span>
        <div class="col-md-3">
            <input type="text" name="height" class="form-control" placeholder="Sisesta pikkus" aria-label="height" aria-describedby="addon-wrapping" value="<?= $height ?>">
        </div>
    </div>
    <div class="input-group flex-nowrap mb-3 filter-input">
        <span class="input-group-text">Lisatud</span>
            <div class="col-md-auto me-3">
                <input type="text" name="added_start" class="form-control datepicker" placeholder="Sisesta algus kuupäev" aria-label="added" aria-describedby="addon-wrapping" value="<?= $addedStart ?>">
            </div>
            <div class="col-md-auto">
                <input type="text" name="added_end" class="form-control datepicker" placeholder="Sisesta lõpu kuupäev" aria-label="added" aria-describedby="addon-wrapping" value="<?= $addedEnd ?>">
            </div>
    </div>
    <div class="input-group flex-nowrap mb-3 filter-input">
        <span class="input-group-text">Ridu lehel</span>
            <div class="col-md-1 me-3">
                <input type="number" name="num_of_rows" class="form-control" aria-label="added" aria-describedby="addon-wrapping" value="<?= $num_of_rows ?>">
            </div>
    </div>
    <button type="submit" class="btn btn-primary">Otsi</button>
</form>