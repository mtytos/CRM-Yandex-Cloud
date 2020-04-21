<?php

require_once "Db.php";

class Data extends Db {

    public function getTopProducts() {
        $st = $this->db->query("SELECT product_id, COUNT(*) FROM Transaction_details GROUP BY product_id ORDER BY COUNT(*) DESC LIMIT 10");
        $st = $st->fetchAll(PDO::FETCH_ASSOC);
        $data = [];
        for ($i = 0; $i<count($st); $i++) {
            $find = $st[$i]['product_id'];
            $tmp = $this->db->query("SELECT title FROM Products WHERE id = $find");
            $title = $tmp->fetchColumn();
            array_push($data, $title);
        }
        return $data;
    }
}