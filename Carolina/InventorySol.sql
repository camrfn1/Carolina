--
-- Database: `inventorysol`
--

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `brand_name` varchar(200) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `unit_price` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `vendor` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `qty_sold` int(10) NOT NULL,
  `expiration` varchar(100) NOT NULL,
  `arrival` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`)
);

--
-- Table structure for table `vendors`
--

CREATE TABLE IF NOT EXISTS `vendors` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(100) NOT NULL,
  `vendor_address` varchar(100) NOT NULL,
  `vendor_city` varchar(100) NOT NULL,
  `vendor_zipcode` varchar(100) NOT NULL,
  `vendor_contact` varchar(100) NOT NULL,
  `vendor_number` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL,
  PRIMARY KEY (`vendor_id`)
);

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `amount_due` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
);

--
-- Table structure for table `sales_order`
--

CREATE TABLE IF NOT EXISTS `sales_order` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`transaction_id`)
);