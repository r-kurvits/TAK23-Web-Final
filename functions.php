<?php
    function sanitizeInput($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    function convertDate($value, $targetFormat) {
        $date = new DateTime($value);
        return $date->format($targetFormat);
    }

    function commaToDot($value) {
        return str_replace(',', '.', $value);
    }

    function buildPaginationLink($page, $filterParams = array()) {
        $queryString = http_build_query(array_merge($_GET, $filterParams, array('pg' => $page)));
        return "index.php?" . $queryString;
    }
?>