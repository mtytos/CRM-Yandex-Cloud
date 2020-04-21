<?php

require_once "Db.php";

class User extends Db {

    public function deleteUser($userId) {
        $deleted_flg = 1;
        $st = $this->db->prepare("UPDATE Customer SET deleted_flg = :deleted_flg WHERE id = :id");
        $st->bindParam(':deleted_flg', $deleted_flg);
        $st->bindParam(':id', $userId);
        $st->execute();
    }
}