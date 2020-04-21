## CRM на Яндекс Облаке.
- `PHP`
- `MySQL`

##### `config/setup.php`  - инициализация БД и основных таблиц<br/>

##### `http://84.201.167.176` - адрес VM (если упадет, ip не статический, поменяется)<br/>


## API:

- основные параметры API: `req`  =  `top` / `del` / `transaction`<br/>

- `top`<br/>
пример запроса - `http://84.201.167.176/?req=top`<br/>
данный `get` запрос возвращает в `json` топ-10 продаваемых товаров<br/>

- `del`<br/>
пример запроса - `http://84.201.167.176/?req=del&id=1`<br/>
данный `get` запрос изменяет флаг логического удаления<br/>
дополнительно необходимо указать id юзера<br/>

- `transaction`<br/>
пример запроса - `http://84.201.167.176/?req=transaction&id=1&product=1`<br/>
данный `get` запрос добавляет транзакцию <br/>
дополнительно необходимо указать `id`  юзера и `id` продукта <br/>
параметр `product` может принимать как просто `int` так и массив интов с существующими `id` продуктов<br/>


для тестирования была дефолтная загрузка данных в БД<br/>
<b>`config/defaultDataForTest.php`</b>


### Условие задачи

В данной задаче вам предстоит разработать CRM систему для небольшого магазинчика. Для этого вам необходимо использовать один из типов БД, предлагаемых Яндекс Облаком и написать небольшую обертку, которая в итоге позволит обращаться к базе определенным набором методов.

### **Методы обертки должны решать следующий список задач**

- Инициализация таблиц:

    В базе должно быть несколько таблиц, которые создаются вызовом метода инициализации. 
    Таблицы должны быть со следующим DDL:

    **Customer** (id, name, lastname, age, phone, deleted_flg)

    **Transaction** (id, customer_id,  timestamp)

    **Transaction_details** (id, transaction_id, product_id)

    **Products** (id, title, description, price)

    где: deleted_flg - флаг логического удаления

- **Проведение продажи.** Метод принимает список id товаров и id клиента
- **Удаление клиента из CRM.** Логическое удаление
- **Аналитика топ-10 продаваемых товаров.** Метод не принимает аргументов. ****Возвращается список картежей со значениями (ключ: title товара, значение: кол-во продаж за весь период)

### **Дополнительное задание**

- Реализуйте API, которое позволит обращаться к этим методам со стороны.


<b><em>Какие сервисы Яндекс.Облака использовали?</b></em><br/>
Виртуальная машина с внешним `ip`, `ubuntu`, облачная бд `mysql`
