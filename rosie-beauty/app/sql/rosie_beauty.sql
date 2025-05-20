-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 05:32 PM
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
-- Database: `rosie_beauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img_url` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `title`, `content`, `img_url`, `created_at`, `updated_at`) VALUES
(1, 'Bổ sung dưỡng chất tinh chất chuyên sâu', 'Lúc tóc đã khô hoàn toàn, bạn dùng tay (hoặc lược) xới nhẹ mái tóc để từng sợi tóc bung rời đem lại cảm giác bồng bềnh. Trước khi đi ngủ, bạn nên “ru êm” mái tóc bằng chút dầu dưỡng hoặc serum chuyên sâu sẽ giúp mái tóc suôn mượt và mềm mại. Bạn cũng có thể bổ sung các sản phẩm nuôi dưỡng và phục hồi tế bào mầm tóc chuyên biệt (điển hình như Qik Hair) để giúp tóc khỏe mạnh từ sâu bên trong.\r\n\r\nChính tinh chất này cũng đang được áp dụng trên rất nhiều phương pháp chăm sóc mái tóc chắc khỏe hiện nay.', '../../uploads/content_02.jpg', '2024-11-02 04:34:41', '2024-11-02 09:05:54'),
(3, 'Bảo vệ tóc cẩn thận', 'Nếu như da cần bôi chống nắng trước khi ra ngoài, thì tóc cũng cần được săn sóc cẩn thận nhằm giảm bớt ảnh hưởng của các yếu tố gây hại từ môi trường như khói bụi, ánh nắng mặt trời… Do đó, bạn hãy nhớ thoa dầu dưỡng bảo vệ lên tóc (có thể dạng xịt, dạng gel hoặc dầu dưỡng) mỗi sáng nhé!\r\n\r\nThực hiện đầy đủ các bước chăm sóc tóc đúng cách như đã hướng dẫn, mái tóc của bạn sẽ óng ả và tràn đầy sức sống. Nghe có vẻ rắc rối, nhưng bắt tay vào hành động, bạn sẽ thấy cách chăm sóc tóc khỏe tự nhiên này thật sự đơn giản và dễ dàng.', '../../uploads/khac-phuc-rung-toc-thumb-1000x600-f8df040e-7f86-4801-952f-c82f3b362e8b.jpg', '2024-11-05 01:29:20', '2024-11-05 01:29:20'),
(4, 'Tẩy tế bào chết cho da đầu', 'Dầu nhờn, bụi bẩn, vảy chết hay tàn dư của sản phẩm tạo kiểu tóc bám ở da đầu, bưng bít chân tóc lâu ngày không chỉ khiến bạn cảm thấy ngứa ngáy mà còn là nguyên nhân làm suy yếu tóc. Do đó, tẩy tế bào chết cho da đầu là bước đầu tiên trong bí quyết dưỡng tóc đẹp tại nhà chuẩn chỉnh.\r\n\r\nBạn có thể sử dụng các nguyên liệu tự nhiên như muối, nước cốt chanh, mật ong, dầu oliu… hoặc sản phẩm tẩy tế bào chết cho da đầu sẵn có ngoài thị trường để loại bỏ tế bào chết cho da đầu. Công đoạn này bạn chỉ cần áp dụng 1 hoặc 2 lần mỗi tuần, không nên làm mỗi ngày vì có thể gây tổn thương da đầu và chân tóc.', '../../uploads/content_03.jpg', '2024-11-05 01:31:22', '2024-11-05 01:31:22'),
(5, 'Thoa dầu xả dưỡng ẩm cho tóc', 'Sau bước gội đầu sạch sẽ là đến công đoạn xả tóc. Dầu xả cung cấp độ ẩm giúp mái tóc bóng mượt tức thì và quan trọng hơn, dưỡng chất trong dầu xả giúp phục hồi lớp biểu bì (cutin) - phần ngoài cùng của sợi tóc, từ đó giảm bớt tác động độc hại từ môi trường đến kết cấu bên trong sợi tóc.\r\n\r\nMỗi loại tóc sẽ phù hợp với một loại dầu xả nhất định. Nếu tóc khô xơ, bạn cần dầu xả có khả năng cấp ẩm cao, còn nếu tóc nhờn thì bạn cần dầu xả ít dầu. Bạn nên thoa dầu xả từ ngọn tóc (phần bị hư tổn rõ nhất) đến phần cách da đầu khoảng 1 đốt ngón tay, không nên thoa sát chân tóc vì có thể khiến da đầu bết và xuất hiện gàu nhiều hơn. \r\n\r\nĐể dầu xả thẩm thấu vào sâu bên trong lớp biểu bì, bạn hãy xoa bóp nhẹ nhàng mái tóc và ủ dầu xả bằng mũ ủ tóc cá nhân khoảng 5 - 7 phút.', '../../uploads/content_01.jpg', '2024-11-05 01:43:28', '2024-11-05 01:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `name`, `logo_url`) VALUES
(17, 'MAC', '../../uploads/img_brand_138f3.jpg'),
(18, 'pond\'s', '../../uploads/img_brand_338f3.png'),
(19, 'innisfree', '../../uploads/img_brand_438f3.png'),
(20, 'moschino', '../../uploads/img_brand_538f3.png'),
(21, 'shiseido', '../../uploads/img_brand_238f3.png'),
(22, 'thefaceshop', '../../uploads/img_brand_638f3.png');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Kem dưỡng da'),
(2, 'Sữa rửa mặt'),
(3, 'Dầu gội'),
(4, 'Sữa tắm');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(11) NOT NULL,
  `order_id` int(100) NOT NULL,
  `product_ids` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `province` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `commune` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `payment_method` varchar(50) NOT NULL,
  `coupon_code` varchar(10) DEFAULT NULL,
  `temp_total` decimal(10,2) NOT NULL,
  `ship_fee` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkout_id`, `order_id`, `product_ids`, `username`, `phone_number`, `Address`, `province`, `district`, `commune`, `note`, `payment_method`, `coupon_code`, `temp_total`, `ship_fee`, `total`, `status`, `create_at`) VALUES
(59, 47, '[\"5\",\"12\"]', 'Vũ Xuân Hiệp', '0981736522', 'uy', 'Tỉnh Cao Bằng', 'Thành phố Cao Bằng', 'Phường Duyệt Trung', '', 'Thanh toán khi nhận hàng', '', 90000.00, 10000.00, 100000.00, 1, '2024-11-23 13:57:47'),
(60, 47, '[\"5\"]', 'Vũ Xuân Hiệp', '0981736522', 'uy', 'Tỉnh Cao Bằng', 'Huyện Trùng Khánh', 'Xã Đình Phong', '', 'Thanh toán khi nhận hàng', '', 10000.00, 10000.00, 20000.00, 1, '2024-11-23 14:01:11'),
(64, 47, '[\"6\"]', 'Vũ Xuân Hiệp', '0981736522', 'uy', 'Tỉnh Cao Bằng', 'Huyện Hà Quảng', 'Xã Cải Viên', '', 'Thanh toán khi nhận hàng', '', 120000.00, 10000.00, 130000.00, 1, '2024-11-23 15:02:05'),
(65, 47, '[\"2\"]', 'Vũ Xuân Hiệp', '0981736522', 'gt', 'Tỉnh Vĩnh Phúc', 'Huyện Lập Thạch', 'Xã Tiên Lữ', '', 'Thanh toán khi nhận hàng', '', 150000.00, 10000.00, 160000.00, 1, '2024-11-23 15:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`) VALUES
(47, 31);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_id`, `quantity`, `create_at`) VALUES
(7, 47, 10, 1, '2024-11-23 14:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` varchar(10) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `category_id`, `image_url`, `created_at`, `updated_at`) VALUES
(2, 'Kem dưỡng da Collagen A23', '2', '../../uploads/product_001.jpg', '2024-11-05 03:24:29', '2024-11-05 03:24:29'),
(3, 'Dầu gội Nerman Black Tone', '3', '../../uploads/dau_goi.jpg', '2024-11-05 03:24:55', '2024-11-23 16:05:21'),
(4, 'Dầu gội Nerman Black Tone', '4', '../../uploads/sua_tam.jpg', '2024-11-05 03:26:02', '2024-11-23 16:05:38'),
(5, 'Sữa rửa mặt Senka', '1', '../../uploads/product_100.jpg', '2024-11-06 09:00:00', '2024-11-23 16:06:33'),
(6, 'Sữa rửa mặt Senka', '1', '../../uploads/pd_101.jpg', '2024-11-06 09:00:57', '2024-11-23 16:06:46'),
(7, 'Kem dưỡng da Collagen A23', '1', '../../uploads/pd_102.jpg', '2024-11-06 09:01:10', '2024-11-06 09:01:10'),
(8, 'Kem dưỡng da Collagen A23', '1', '../../uploads/pd_103.jpg', '2024-11-06 09:01:36', '2024-11-06 09:01:36'),
(9, 'Kem dưỡng da Collagen A23', '1', '../../uploads/pd_106.jpg', '2024-11-06 09:02:04', '2024-11-06 09:02:04'),
(10, 'Kem dưỡng da Collagen A23', '1', '../../uploads/pd_106.jpg', '2024-11-06 09:02:04', '2024-11-06 09:02:04'),
(12, 'Sữa rửa mặt Senka', '2', '../../uploads/sua_rua_mat_senka.jpg', '2024-11-18 07:41:42', '2024-11-18 07:41:42'),
(13, 'Sữa rửa mặt Clinic', '2', '../../uploads/kem_duong.jpg', '2024-11-23 16:14:22', '2024-11-23 16:14:22'),
(14, 'Sữa rửa mặt Clinic', '2', '../../uploads/kem_duong_002.jpg', '2024-11-23 16:14:57', '2024-11-23 16:14:57'),
(15, 'Sữa rửa mặt Clinic', '2', '../../uploads/kem_duong_0065.jpg', '2024-11-23 16:18:24', '2024-11-23 16:18:24'),
(16, 'Sữa rửa mặt Clinic', '2', '../../uploads/kem_duong_005.jpg', '2024-11-23 16:19:59', '2024-11-23 16:19:59'),
(17, 'Sữa rửa mặt Clinic', '2', '../../uploads/dau_goi_001.jpg', '2024-11-23 16:20:33', '2024-11-23 16:20:33'),
(18, 'Sữa rửa mặt Clinic', '2', '../../uploads/kem_duong_002.jpg', '2024-11-23 16:21:45', '2024-11-23 16:21:45'),
(19, 'Sữa rửa mặt Clinic', '3', '../../uploads/dau_goi.jpg', '2024-11-23 16:22:06', '2024-11-23 16:22:06'),
(20, 'Dầu gội', '3', '../../uploads/dau_goi_003.jpg', '2024-11-23 16:22:47', '2024-11-23 16:22:47'),
(21, 'Dầu gội', '3', '../../uploads/dau_hoi_002.jpg', '2024-11-23 16:23:15', '2024-11-23 16:23:15'),
(22, 'Dầu gội', '3', '../../uploads/pd_101.jpg', '2024-11-23 16:23:58', '2024-11-23 16:23:58'),
(23, 'Dầu gội', '3', '../../uploads/sua_tam.jpg', '2024-11-23 16:24:22', '2024-11-23 16:24:22'),
(24, 'Sữa tắm', '4', '../../uploads/sua_tam_0010.jpg', '2024-11-23 16:24:58', '2024-11-23 16:24:58'),
(25, 'Sữa tắm', '4', '../../uploads/sua_tam_001.jpg', '2024-11-23 16:25:19', '2024-11-23 16:25:19'),
(26, 'Sữa tắm', '4', '../../uploads/product_100.jpg', '2024-11-23 16:25:40', '2024-11-23 16:25:40'),
(27, 'Sữa tắm', '4', '../../uploads/pd_103.jpg', '2024-11-23 16:25:58', '2024-11-23 16:25:58'),
(28, 'Sữa tắm', '4', '../../uploads/dau_goi_003.jpg', '2024-11-23 16:26:23', '2024-11-23 16:26:23'),
(29, 'Sữa tắm', '4', '../../uploads/kem_duong_002.jpg', '2024-11-23 16:26:51', '2024-11-23 16:26:51'),
(30, 'Sữa tắm', '4', '../../uploads/kem_duong_0065.jpg', '2024-11-23 16:27:08', '2024-11-23 16:27:08'),
(31, 'Sữa tắm', '4', '../../uploads/pd_103.jpg', '2024-11-23 16:27:30', '2024-11-23 16:27:30'),
(32, 'Sữa tắm', '4', '../../uploads/kem_duong_006.jpg', '2024-11-23 16:27:52', '2024-11-23 16:27:52'),
(33, 'Sữa tắm', '4', '../../uploads/dau_goi_008.jpg', '2024-11-23 16:29:10', '2024-11-23 16:29:10'),
(34, 'Sữa tắm', '1', '../../uploads/pd_103.jpg', '2024-11-23 16:32:08', '2024-11-23 16:32:08'),
(35, 'Sữa tắm', '2', '../../uploads/pd_103.jpg', '2024-11-23 16:32:08', '2024-11-23 16:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `detail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `sold` int(100) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`detail_id`, `product_id`, `description`, `stock_quantity`, `price`, `sold`, `created_at`, `update_at`) VALUES
(2, 2, 'sữa rửa mặt', 1, 30000, 5, '2024-11-09 03:27:20', '2024-11-23 15:03:44'),
(3, 3, 'Dầu gội', 8, 4000, 0, '2024-11-09 03:30:27', '2024-11-20 16:07:44'),
(4, 4, 'sữa tắm', 10, 10, 0, '2024-11-09 03:31:09', '2024-11-09 03:31:09'),
(5, 5, 'Kem dưỡng da', 10, 10000, 0, '2024-11-09 03:31:46', '2024-11-09 03:31:46'),
(6, 7, 'Kem dưỡng da', 10, 5000, 0, '2024-11-15 04:29:24', '2024-11-15 04:29:24'),
(7, 8, 'Kem dưỡng da', 10, 6000, 0, '2024-11-15 04:29:40', '2024-11-15 04:29:40'),
(8, 6, 'Kem dưỡng da', 14, 40000, 5, '2024-11-15 16:15:05', '2024-11-23 15:02:05'),
(9, 9, 'Kem dưỡng ', 20, 1000, 0, '2024-11-15 17:17:52', '2024-11-15 17:17:52'),
(10, 12, 'Sữa rửa mặt Senka', 10, 80000, 0, '2024-11-18 07:45:33', '2024-11-18 07:45:33'),
(11, 10, 'Kem dưỡng da', 10, 10000, 0, '2024-11-18 07:46:25', '2024-11-18 07:46:25'),
(12, 14, 'Sữa rửa mặt Clinic', 20, 50000, 0, '2024-11-23 16:16:00', '2024-11-23 16:17:42'),
(13, 13, 'Sữa rửa mặt Clinic', 19, 30000, 0, '2024-11-23 16:16:53', '2024-11-23 16:17:49'),
(14, 15, 'Sữa rửa mặt Clinic', 30, 100000, 0, '2024-11-23 16:18:39', '2024-11-23 16:18:39'),
(15, 16, 'Sữa rửa mặt Clinic', 20, 120000, 0, '2024-11-23 16:20:11', '2024-11-23 16:20:11'),
(16, 17, 'Sữa rửa mặt Clinic', 12, 90000, 0, '2024-11-23 16:20:43', '2024-11-23 16:20:43'),
(17, 18, 'Sữa rửa mặt Clinic', 12, 40000, 0, '2024-11-23 16:21:54', '2024-11-23 16:21:54'),
(18, 19, 'Dầu gội', 12, 40000, 0, '2024-11-23 16:22:20', '2024-11-23 16:22:20'),
(19, 20, 'Dầu gội', 20, 60000, 0, '2024-11-23 16:23:02', '2024-11-23 16:23:02'),
(20, 21, 'Dầu gội', 12, 70000, 0, '2024-11-23 16:23:26', '2024-11-23 16:23:26'),
(21, 22, 'Dầu gội', 12, 60000, 0, '2024-11-23 16:24:08', '2024-11-23 16:24:08'),
(22, 23, 'Dầu gội', 12, 40000, 0, '2024-11-23 16:24:31', '2024-11-23 16:24:31'),
(23, 24, 'Sữa tắm', 10, 100000, 0, '2024-11-23 16:25:10', '2024-11-23 16:25:10'),
(24, 25, 'Sữa tắm', 10, 60000, 0, '2024-11-23 16:25:29', '2024-11-23 16:25:29'),
(25, 26, 'Sữa tắm', 30, 90000, 0, '2024-11-23 16:25:49', '2024-11-23 16:25:49'),
(26, 27, 'Sữa tắm', 10, 80000, 0, '2024-11-23 16:26:09', '2024-11-23 16:26:09'),
(27, 28, 'Sữa tắm', 100, 90000, 0, '2024-11-23 16:26:35', '2024-11-23 16:26:35'),
(28, 29, 'Sữa tắm', 10, 50000, 0, '2024-11-23 16:26:59', '2024-11-23 16:26:59'),
(29, 30, 'Sữa tắm', 21, 90000, 0, '2024-11-23 16:27:19', '2024-11-23 16:27:19'),
(30, 31, 'Aka rồng xanh', 10, 98000, 0, '2024-11-23 16:27:41', '2024-11-23 16:27:41'),
(31, 32, 'Sữa tắm', 10, 89000, 0, '2024-11-23 16:28:06', '2024-11-23 16:28:06'),
(32, 33, 'dfbfba', 12, 1233333, 0, '2024-11-23 16:29:21', '2024-11-23 16:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_promotions`
--

CREATE TABLE `product_promotions` (
  `promotion_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_promotions`
--

INSERT INTO `product_promotions` (`promotion_id`, `product_id`) VALUES
(1, 7),
(1, 6),
(1, 4),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotion_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `discount_type` enum('percentage','fixed_amount') NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotion_id`, `name`, `discount_type`, `value`, `start_date`, `end_date`, `is_active`) VALUES
(1, 'Chào đón giáng sinh', 'percentage', 10.00, '2024-11-16', '2024-12-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `role`, `created_at`, `is_active`) VALUES
(31, 'a13', 'a13@gmail.com', '$2y$10$z4nZHudxP.nNKE8RtGQM0uOE/hodT0aRRBGv7dibH4.FcSXGYdLbK', 1, '2024-11-21 00:50:09', 1),
(32, 'nva', 'nva@gmail.com', '$2y$10$TdkoiUmf/z.aW.Wgcb6OneGG.gxqVoefeH9erU6DFBab5pCTqByJK', 0, '2024-11-21 15:10:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `detail_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `profile_picture_url` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `phone_number` varchar(11) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`detail_id`, `user_id`, `full_name`, `profile_picture_url`, `birthday`, `gender`, `phone_number`, `update_at`) VALUES
(1, 1, 'Vũ Xuân Hiệp', '../../admin/uploads/user/anh_dep_zai.jpg', '2003-09-17', 'male', '0981736522', '2024-11-15 03:40:51'),
(4, 30, 'Vũ Xuân Hiệp', NULL, NULL, NULL, '0981736522', '2024-11-21 00:36:02'),
(5, 31, 'Vũ Xuân Hiệp', NULL, NULL, NULL, '0981736522', '2024-11-21 00:50:09'),
(6, 32, 'Nguyễn Văn A', NULL, NULL, NULL, '0987654212', '2024-11-21 15:10:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_Category_id` (`category_id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `FK_Product_id_detail` (`product_id`);

--
-- Indexes for table `product_promotions`
--
ALTER TABLE `product_promotions`
  ADD KEY `FK_productID_PP` (`product_id`),
  ADD KEY `FK_promotionID_PP` (`promotion_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `FK_product_id_review` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `idx_username` (`username`),
  ADD UNIQUE KEY `idx_email` (`email`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `FK_Product_id_detail` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_promotions`
--
ALTER TABLE `product_promotions`
  ADD CONSTRAINT `FK_productID_PP` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_promotionID_PP` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`promotion_id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_product_id_review` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
