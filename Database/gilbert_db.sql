-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 11:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gilbert_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(6, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@gmail.com', '', '2022-03-20 09:36:18'),
(9, 'arima123', '0192023a7bbd73250516f069df18b500', 'aaa@gmail.com', 'QFE6ZM', '2023-05-28 14:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `admin_codes`
--

CREATE TABLE `admin_codes` (
  `id` int(222) NOT NULL,
  `codes` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_codes`
--

INSERT INTO `admin_codes` (`id`, `codes`) VALUES
(1, 'QX5ZMN'),
(2, 'QFE6ZM'),
(3, 'QMZR92'),
(4, 'QPGIOV'),
(5, 'QSTE52'),
(6, 'QMTZ2J');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(22, 67, 'Glass Door with Aluminum Frame', 'This exceptional product seamlessly blends the timeless beauty of glass with the sleekness and durability of an aluminum frame. The expansive glass panels allow for abundant natural light, creating a bright and inviting at', 6000.00, '6473cd1dd27d8.jpg'),
(23, 67, 'Aluminum Door with Grills', 'This exceptional product combines the strength and durability of aluminum with the added security and aesthetic appeal of integrated grills. Crafted with precision, the aluminum frame ensures long-lasting performance while', 3000.00, '6473cc841551f.jpg'),
(61, 67, 'Folding Glass Door with Aluminum Frame', 'Experience the versatility, beauty, and practicality of the Folding Glass Door with Aluminum Frame, elevating your living or working environment to new heights of sophistication. This innovative product seamlessly merges s', 3000.00, '6473caa12efc8.jpg'),
(62, 51, 'Built-in Glass Windows', ' Built-in Glass Windows elevate the architectural appeal, creating a visually stunning and light-filled ambiance. Experience the perfect fusion of design, functionality, and natural beauty with these exceptional built-in w', 3000.00, '6473ce8e02410.jpg'),
(63, 52, 'Round Glass Table with Aluminum Stand', 'The round glass tabletop elegantly showcases its smooth surface and allows for a clear view of the base, creating an illusion of floating elegance. Whether used in a dining room, office, or living space, this table effortl', 3000.00, '6473cf413c0ea.jpg'),
(64, 52, 'Rectangle Glass Table', 'A sleek and modern addition to your living space. With its clean lines and transparent glass surface, this table effortlessly combines style and functionality, providing an elegant focal point for any room.', 5000.00, '6473cffe09d9e.jpg'),
(65, 51, 'Sliding Window with Aluminum Frame', 'This innovative window seamlessly combines the durability and strength of an aluminum frame with the functionality and space-saving benefits of a sliding mechanism, allowing for effortless operation and maximizing natural ', 3100.00, '6473da8f38187.jpg'),
(66, 51, 'Awning Window with Aluminum Frame', 'This window features a sleek aluminum frame that not only adds a modern touch but also ensures exceptional strength and longevity. With its unique design, the awning window opens outward from the bottom, allowing for incre', 4200.00, '6473db255344f.jpg'),
(67, 68, 'Solid Glass Stairs Railing', 'Elevate your staircase to new heights of elegance with the Solid Glass Stairs Railing. Crafted with precision, this railing seamlessly combines the timeless beauty of glass with the strength and durability of solid constru', 10000.00, '6473dc6c6afb6.jpg'),
(68, 68, 'Aluminum Stair Railing', 'With its clean lines and versatile design, the Aluminum Stair Railing offers both safety and aesthetics, making it a perfect choice for residential and commercial spaces seeking a sleek and reliable railing solution.', 7000.00, '6473dcde0ceb4.jpg'),
(69, 70, 'Solid Glass Stairs Railing', 'Elevate your staircase to new heights of elegance with the Solid Glass Stairs Railing. Crafted with precision, this railing seamlessly combines the timeless beauty of glass with the strength and durability of solid constru', 10000.00, '6473e83a5047b.jpg'),
(70, 70, 'Aluminum Stair Railing', 'With its clean lines and versatile design, the Aluminum Stair Railing offers both safety and aesthetics, making it a perfect choice for residential and commercial spaces seeking a sleek and reliable railing solution.', 7500.00, '6473e88852c64.jpg'),
(71, 70, 'Aluminum Stair Railing', 'With its clean lines and versatile design, the Aluminum Stair Railing offers both safety and aesthetics, making it a perfect choice for residential and commercial spaces seeking a sleek and reliable railing solution.', 7500.00, '6473ea379e695.jpg'),
(72, 70, 'Aluminum Stair Railing', 'With its clean lines and versatile design, the Aluminum Stair Railing offers both safety and aesthetics, making it a perfect choice for residential and commercial spaces seeking a sleek and reliable railing solution.', 7500.00, '6473ea3a58e25.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(71, 39, 'in process', 'Dispatching...', '2022-03-17 12:31:14'),
(72, 39, 'closed', 'Order delivered.', '2022-03-17 12:35:00'),
(73, 42, 'closed', 'Order delivered & payment received successfully.', '2022-03-23 13:53:20'),
(74, 47, 'rejected', 'Order Cancelled by User.', '2022-03-23 13:54:08'),
(75, 43, 'in process', 'Expected Delivery: 25th March, Friday ', '2022-03-23 14:07:03'),
(76, 51, 'in process', 'Order Processing', '2023-05-28 14:43:45'),
(77, 51, 'closed', 'Received by AM', '2023-05-28 14:44:23'),
(78, 52, 'in process', 'Still working', '2023-05-28 17:22:05'),
(79, 52, 'closed', 'Received by AM', '2023-05-28 17:22:30'),
(80, 55, 'closed', 'Order Delivered', '2023-05-28 23:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(12, 'Stairs', '2023-05-28 20:52:38'),
(18, 'Table', '2023-05-28 16:02:10'),
(19, 'Doors', '2023-05-28 15:59:41'),
(20, 'Windows', '2023-05-28 15:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`rs_id`, `c_id`, `title`, `image`, `date`) VALUES
(51, 20, 'Create Windows', '6473d9c52fb6e.jpg', '2023-05-28 22:46:29'),
(52, 18, 'Create Table', '6473d9b4996ad.jpg', '2023-05-28 22:46:12'),
(67, 19, 'Create Door', '6473d99c78bfb.jpg', '2023-05-28 22:45:48'),
(70, 12, 'Create Stairs', '6473e6adf0b5a.jpg', '2023-05-28 23:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(39, 'santhosh', 'Santhosh', 'Kumar', 'santhosh@gmail.com', '9347217890', '3a2b7ec8152a0b869cbc6ef54cedae98', 'No:3/21, lakshmi nagar, Thoothukudi.', 1, '2022-03-23 13:25:08'),
(40, 'joe27', 'Joshua', 'D', 'joshua@gmail.com', '7629313490', '18275a3df7a93d896d3179c612d92fe1', 'No: 9/43, Floor No - 2, Vivekanandha street, Eswaran nagar, Trichy.', 1, '2022-03-23 13:30:04'),
(41, 'prakash', 'Prakash', 'M', 'prakash@gmail.com', '7456003256', '707641143ca679250a50483673fa9393', 'No: 12/56, Ponniyamman street, Kumaran nagar, Kanyakumari.', 1, '2022-03-23 13:34:54'),
(42, 'fathima', 'Fathima', 'S', 'fathima@gmail.com', '9821430976', 'f618e982479c744645088c75babb70b3', 'No: 20/54, Pillayar kovil street, Pattur, Kanchipuram.', 1, '2022-03-23 13:37:50'),
(43, 'nancy', 'Nancy', 'Rani', 'nancy@gmail.com', '7900238167', 'a16627318ba6668dd95068109caa2490', 'No: 124, Kumaran street, Dhanalakshmi nagar, Madurai.', 1, '2022-03-23 13:42:52'),
(44, 'vinoth36', 'Vinoth', 'Kumar', 'vinoth@gmail.com', '7357700216', 'fa57148e32465b50adc70642be7ac76e', 'No: 2/17, Illayaraja nagar, Porur, Chennai.', 1, '2022-03-23 13:50:29'),
(45, 'arima123', 'ari', 'mal', 'aaa@gmail.com', '09123456789', '0192023a7bbd73250516f069df18b500', 'PH', 1, '2023-05-28 14:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(55, 45, 'Built-in Glass Windows', 1, 3000.00, 'closed', '2023-05-28 23:07:39'),
(56, 45, 'Glass Door with Aluminum Frame', 1, 6000.00, NULL, '2023-05-28 23:06:40'),
(58, 45, 'Built-in Glass Windows', 1, 3000.00, NULL, '2023-05-28 23:57:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `admin_codes`
--
ALTER TABLE `admin_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_codes`
--
ALTER TABLE `admin_codes`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
