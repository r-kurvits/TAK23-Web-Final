<h2>Lisa uus isik</h2>
<div class="container">
    <form action="index.php?page=common&action=add_user" method="post" autocomplete="off">
        <div class="mb-3">
            <label for="name" class="form-label">Nimi</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="name">
        </div>
        <div class="mb-3">
            <label for="birth" class="form-label">Sünniaeg</label>
            <input type="text" class="form-control datepicker" name="birth" id="birth">
        </div>
        <div class="mb-3">
            <label for="salary" class="form-label">Palk</label>
            <input type="text" class="form-control" name="salary" id="salary">
        </div>
        <div class="mb-3">
            <label for="height" class="form-label">Pikkus</label>
            <input type="text" class="form-control" name="height" id="height">
        </div>
        <a class="btn btn-primary" href="index.php" role="button">&laquo; Tagasi</a>
        <button type="submit" class="btn btn-primary">Salvesta</button>
    </form>
</div>