<?php

    session_name("La_chuspita_cliente");
    session_start();
        
    unset($_SESSION["s_email"]);
    unset($_SESSION["t_cliente"]);
    unset($_SESSION["t_doc"]);
    unset($_SESSION["distrito"]);
    unset($_SESSION["provincia"]);
    unset($_SESSION["region"]);
    
    session_destroy();
    
    header("location:../view/index.php");