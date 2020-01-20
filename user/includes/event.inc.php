<?php
if (isset($_POST['date'])) {
    var_dump($_POST);
    var_dump($_FILES["eventimage"]["name"]);
} else {
    echo "you are ecccessing here the worong way";
}
