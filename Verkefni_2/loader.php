<?php
    function __autoload($class) {
        include "$class.php";
    }

    function initialise_site(csite $site) {
        $site->addHeader("inc/header.php");
        $site->addFooter("inc/footer.php");
    }
?>