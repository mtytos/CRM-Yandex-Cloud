<?php

require_once "Db.php";

class Transaction extends Db {

    public function addTransaction($userID, $products) {

        $today = date("Y-m-d H:i:s");
        $st = $this->db->prepare("INSERT INTO Transaction (customer_id, timestamp) VALUES(?, ?)");
        $st->bindParam(1, $userID);
        $st->bindParam(2, $today);
        $st->execute();

        $st = $this->db->query("SELECT MAX(id) FROM Transaction");
        $customerId = $st->fetchColumn();
        $this->addTransactionDetail($customerId, $products);
    }

    private function addTransactionDetail($customerId, $products) {
        if (is_array($products)) {
            for ($i = 0; $i < count($products); $i++) {
                $st = $this->db->prepare("INSERT INTO Transaction_details (transaction_id, product_id) VALUES(?, ?)");
                $st->bindParam(1, $customerId);
                $st->bindParam(2, $products[$i]);
                $st->execute();
            }
        }
        else {
            $st = $this->db->prepare("INSERT INTO Transaction_details (transaction_id, product_id) VALUES(?, ?)");
            $st->bindParam(1, $customerId);
            $st->bindParam(2, $products);
            $st->execute();
        }
    }
}