

<?php
require 'init.php';


    {//sets thesession id of the user
        if (isset($_SESSION['user_id'])) {
            exit(json_encode(true));
        } else {
            exit(json_encode(false));
        }
    }