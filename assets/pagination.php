<nav aria-label="Page navigation">
    <ul class="pagination pagination-color">
        <li class="page-item">
            <a class="page-link <?= $pg == 1 ? 'disabled' : null ?>" href="<?= buildPaginationLink(1) ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link <?= $pg == 1 ? 'disabled' : null; ?>" href="<?= buildPaginationLink($pg - 1) ?>" aria-label="Previous">
                <span aria-hidden="true">&lsaquo;</span>
            </a>
        </li>
        <?php for($x=0; $x < $pageCount;  $x++): ?>
            <li class="page-item">
                <a class="page-link <?= (($x + 1) == $pg) ? 'active' : null; ?>" href="<?= buildPaginationLink($x + 1) ?>"><?= $x + 1; ?></a>
            </li>
        <?php endfor; ?>
        <li class="page-item">
            <a class="page-link <?= $pg == $pageCount ? 'disabled' : null; ?>" aria-current="page" href="<?= buildPaginationLink($pg + 1) ?>">
                <span aria-hidden="true">&rsaquo;</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link <?= $pg == $pageCount ? 'disabled' : null; ?>" href="<?= buildPaginationLink($pageCount) ?>">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>