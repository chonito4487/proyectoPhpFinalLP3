<?php
require "config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
} else if ($_GET['module'] == 'start') {
    include "modules/start/view.php";
}else if ($_GET['module'] == 'password') {
    include "modules/password/view.php";
}