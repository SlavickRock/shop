<?php
include_once('bd.php');
try{
$mysqli->begin_transaction();
$category =$mysqli->query("CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8
");

$category =$mysqli->query(" INSERT INTO `category` (`id`, `name_category`) VALUES
(2, 'Овощи'),
(1, 'Фрукты')");

$customer = $mysqli->query("CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name_customer` varchar(50) NOT NULL,
  `Phone_customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8");
$customer = $mysqli->query("INSERT INTO `customer` (`id`, `name_customer`, `Phone_customer`) VALUES
(3, 'Стас', 7869555),
(4, 'Сергей', 45668),
(5, 'Миша', 46889)");
$orders =$mysqli->query("CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `category_product` varchar(50) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8
");
$orders =$mysqli->query("INSERT INTO `orders` (`id`, `customer_name`, `category_product`, `name_product`, `price`) VALUES
(8, 'Миша', 'Овощи', 'Буряк', 7);");
$product = $mysqli->query("CREATE TABLE `Products` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8");
$product = $mysqli->query("INSERT INTO `Products` (`id`, `category_name`, `product_name`, `product_price`) VALUES
(10, 'Фрукты', 'Слива', 7),
(11, 'Овощи', 'Картошка', 7),
(12, 'Фрукты', 'Виноград', 15),
(13, 'Фрукты', 'Персик', 14),
(14, 'Овощи', 'Капуста', 3),
(15, 'Фрукты', 'Яблоки', 3),
(16, 'Овощи', 'Буряк', 5)");
$mysqli->commit();
}catch(Exception $e)
{
  $mysqli->rollback();

}
$index_category = $mysqli->query("ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_category` (`name_category`),
  ADD KEY `id` (`id`)");
$index_customer = $mysqli->query("ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_customer` (`name_customer`)");
$index_orders= $mysqli->query("ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_name`),
  ADD KEY `category_id` (`category_product`),
  ADD KEY `product_id` (`name_product`),
  ADD KEY `price` (`price`)");
$index_products = $mysqli->query("ALTER TABLE `Products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_name`),
  ADD KEY `product_name` (`product_name`),
  ADD KEY `product_price` (`product_price`)");
$AI_category = $mysqli->query("ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3");
$AI_costomer = $mysqli->query("ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6");
$AI_orders =$mysqli->query("ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9");
$AI_products = $mysqli->query("ALTER TABLE `Products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17");
$key_orders = $mysqli->query("ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_name`) REFERENCES `customer`
 (`name_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`category_product`) REFERENCES
  `Products` (`category_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`name_product`) REFERENCES
  `Products` (`product_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`price`) REFERENCES `Products`
  (`product_price`) ON DELETE CASCADE ON UPDATE CASCADE");
  $key_products = $mysqli->query("ALTER TABLE `Products`
  ADD CONSTRAINT `Products_ibfk_1` FOREIGN KEY (`category_name`) REFERENCES
   `category` (`name_category`)
   ON DELETE CASCADE ON UPDATE CASCADE");


  $mysqli->close();
   ?>
