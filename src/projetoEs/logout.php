<?php
require "inc/Acesso.php";

session_destroy();
unset($_SESSION);
header("Location:login.php");