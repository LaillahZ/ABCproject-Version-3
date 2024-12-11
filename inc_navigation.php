<?php
$navigation = ["Home", "Products", "Contact"];

foreach ($navigation as $link) {
    echo "<a href='#'>" . $link . "</a> ";
}
