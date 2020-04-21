<?php

require_once "core/Data.php";
require_once "core/Transaction.php";
require_once "core/User.php";


if (isset($_GET['req']) && $_GET['req'] === 'top') {
    $st = new Data();
    $data = $st->getTopProducts();

    echo json_encode(
        array(
            'data' => $data
        )
    );
}
else if (isset($_GET['req']) && isset($_GET['id']) && $_GET['req'] === 'del') {
    $st = new User();
    $iduser = $_GET['id'];
    $st->deleteUser($iduser);
}
else if (isset($_GET['req']) && isset($_GET['id']) && isset($_GET['product']) && $_GET['req'] === 'transaction') {
    $st = new Transaction();
    $id = $_GET['id'];
    $products = $_GET['product'];
    $st->addTransaction($id, $products);
}
else {
    echo json_encode(
        array(
            'error' => 'Bad request'
        )
    );
}

?>