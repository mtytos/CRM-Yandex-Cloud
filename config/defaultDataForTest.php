<?php

require_once "../core/Db.php";
$st = new Db();

// данные пользователя
$st->db->query("INSERT INTO Customer (name, lastname, age, phone, deleted_flg) VALUES
    ('Stan', 'Marsh', 12, 89037774433, 0),
    ('Eric', 'Cartman', 15, 89146784422, 0)");
echo "Данные о пользователях внесены" . "<br/>";

// транзакция
$st->db->query("INSERT INTO Transaction (customer_id, timestamp) VALUES
    (1, '2020-04-20 16:32:06'),
    (2, '2020-04-20 16:32:06'),
    (3, '2020-04-20 16:32:06'),
    (4, '2020-04-20 16:32:06')");
echo "Транзакции добавлены" . "<br/>";

// данные транзакции
$st->db->query("INSERT INTO Transaction_details (transaction_id, product_id) VALUES
    (1, 1), (1, 2), (2, 1), (2, 2), (2, 3), (2, 4), (3, 1), (3, 4), (4, 1), (4, 2)");
echo "Данные о транзациях внесены" . "<br/>";

// данные продуктов
$st->db->query("INSERT INTO Products (title, description, price) VALUES
    ('dog', 'black', 100.50), ('cat', 'white', 110.66), ('pig', 'pink', 120.32), ('rat', 'grey', 130.99)");
echo "Добавлены продукты" . "<br/>";

?>