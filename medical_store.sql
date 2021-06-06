-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 06, 2021 at 05:59 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `feedback` text NOT NULL,
  `tim_stp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `username`, `name`, `feedback`, `tim_stp`) VALUES
(1, 21, 'sample', 'sgg', 'gsg', '2021-02-18 19:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `tim_stp` timestamp NOT NULL DEFAULT current_timestamp(),
  `delivery_status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `price`, `quantity`, `total_price`, `user_id`, `username`, `fname`, `lname`, `mobile`, `email`, `address`, `pincode`, `city`, `state`, `tim_stp`, `delivery_status`) VALUES
(1, 1, 254, 1, 254, 21, 'sample', 'lnkl', 'lklv', '111111111', 'knv@kdnf.f', 'somewhere on earth', '4', 'gsg', 'srggr', '2021-02-18 19:11:54', 0),
(2, 1, 254, 3, 762, 21, 'sample', 'lnkl', 'lklv', '111111111', 'knv@kdnf.f', 'somewhere on earth', '5', '55', '5', '2021-02-18 20:18:44', 0),
(3, 1, 254, 2, 508, 22, 'Varun', 'Varun', 'Nagaraju', '9482892438', 'varun596varun@gmail.com', 'Some address', '2', 'Mysuru', 'Karnataka', '2021-06-05 13:18:27', 0),
(4, 1, 254, 3, 762, 22, 'Varun', 'Varun', 'Nagaraju', '9482892438', 'varun596varun@gmail.com', 'Some address', '123', 'Toronto', 'Ontario', '2021-06-06 07:43:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `prescription_name` varchar(100) NOT NULL,
  `tim_stp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `user_id`, `username`, `prescription_name`, `tim_stp`) VALUES
(1, 21, 'sample', '3a.jpg', '2021-02-18 19:22:10'),
(2, 21, 'sample', '4a.jpg', '2021-02-18 20:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `formulation` varchar(50) NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `pack_type` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `in_stock` int(11) NOT NULL DEFAULT 1,
  `category` varchar(50) NOT NULL,
  `sub_category` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `picture`, `formulation`, `manufacturer`, `pack_type`, `price`, `view_count`, `in_stock`, `category`, `sub_category`) VALUES
(3, 'Ashokarishta', 'ashokarishta_helps_treat_menstrual_problems_450ml.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'household', 'speciality'),
(4, 'Dashmalarista', 'dashmularist_general_tonic_and_restorative_for_women_450ml.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'household', 'speciality'),
(2, 'Amritarishta', 'amritarishta_asava_arishta_450ml.jpg', 'default', 'Cipla', 'Box', '100', 3, 1, 'household', 'speciality'),
(1, 'Air wick frshmatic automatic refill spray', 'air_wick_freshmatic_automatic_refill_spray_lavender_dew_essential_oils_250ml.jpg', 'defailt', ' Reckitt Benckiser', 'Box', '254', 20, 1, 'household', 'hc'),
(5, 'Pushyanug Churna', 'pushyanug_churna_60g.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'household', 'speciality'),
(6, 'Huggies dry pants', 'huggies_dry_pants_s_30.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Baby', 'bi'),
(7, 'Huggies new born diapers', 'huggies_new_born_24s.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Baby', 'bi'),
(8, 'Pampers baby diapers', 'pampers_baby_dry_l_38_s.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Baby', 'bi'),
(9, 'Pediasure', 'pediasure_complete_and_balance.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Baby', 'mmc'),
(10, 'Mother’s Horlicks', 'mother_s_horlicks_500g_refill_pack.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Baby', 'mmc'),
(11, 'Threptin Biscuit', 'threptin_biscuit_1kg.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Diabetes', 'fb'),
(12, 'Threptin Disket Chocolate', 'threptin_disket_chocolate_275g.jpg', 'default', 'Cipla', 'Box', '100', 3, 1, 'Diabetes', 'fb'),
(13, 'Whey Protein', '405629.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Wellness', 'ss'),
(14, 'GNC Chromium Picolinate', 'gnc_chromium_picolinate_tab_500mcg_90_s.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Diabetes', 'ns'),
(15, 'GNC Green Tea Complex', 'gnc_green_tea_complex_500mg_100_s.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'household', 'bfc'),
(16, 'GNC Vitamin E Gel', 'gnc_vitamin_e_gel_57g.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'household', 'speciality'),
(17, 'Anibur Adult Diapers', 'anibur_adult_diapers_xl_10_s.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Wellness', 'sck'),
(18, 'Comfrey Adult Diapers', 'comfrey_adult_diapers_xl_10_s.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Wellness', 'sck'),
(19, 'Omron BP Monitor', 'omron_hem_7130_bp_monitor.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Wellness', 'hme'),
(20, 'One Touch Ultra Easy', 'one_touch_ultra_easy.jpg', 'default', 'Cipla', 'Box', '100', 4, 1, 'Wellness', 'hme'),
(21, 'Iko Premiuim Sugar Free', 'iko_premium_sugar_free_oatmeal_crackers_oat_bran_200g.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'otc', 'health'),
(22, 'Iko Sugar Free Oatmeal', 'iko_sugar_free_oatmeal_crackers_original_200g.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'otc', 'health'),
(23, 'Sugar Free Gold', 'sugar_free_gold_100_pellets.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Diabetes', 'ns'),
(24, 'Sugar Free Nature', 'sugar_free_natura_500_pellets.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Diabetes', 'ns'),
(25, 'Band Aid Washproof', 'band_aid_washproof_100_s.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'otc', 'first_aid'),
(26, 'Band Aid', 'band_aid.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'otc', 'first_aid'),
(28, 'All Out Ultra Liquid', 'all_out_ultra_liquid_electric.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'household', 'hc'),
(29, 'Original Protinex', 'original_protinex_400g.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Wellness', 'fitness'),
(30, 'Protinex Vanilla', 'protinex_vanilla_400g.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Wellness', 'fitness'),
(31, 'B Protein Chocolate powder', 'b_protin_chocolate_powder_500gm.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Wellness', 'fitness'),
(32, 'Boost', 'boost.jpg', 'default', 'Boost', 'Box', '100', 1, 1, 'household', 'bfc'),
(33, 'Dabur Honey', 'dabur_honey.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'household', 'bfc'),
(34, 'Horlicks Light Badam Flavour', 'horlicks_lite_badam_flavour_450g_refill_pack.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'household', 'bfc'),
(35, 'Kids Pro Vanilla Powder', 'kids_pro_vanilla_powder_500gm.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Baby', 'bi'),
(36, 'Macprot Chocolate powder', 'macprot_chocolate_powder_200gm.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'household', 'bfc'),
(37, 'Nestle Lactogen 2', 'nestle_lactogen_2_400g_box.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Baby', 'bi'),
(38, 'Biotique Bio Almond Oil Cleanser', 'biotique_bio_almond_oil_soothing_face_and_eye_makeup_cleanser_120ml.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Personal', 'cosmetics'),
(39, 'Fogg men body spray', 'fogg_men_body_spray_bleu_island_100g_120ml.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'otc', 'mc'),
(40, 'Head and Shoulders Lemon Fresh', 'head_and_shoulders_leman_fresh_170ml.jpg', 'default', 'Cipla', 'Bottle', '100', 1, 1, 'household', 'hc'),
(41, 'Himalaya Almond Rose Soap', 'himalaya_almond_rose_soap_125g.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'household', 'hc'),
(42, 'Himalaya Hair Fall Cream', 'himalaya_ani_hair_fall_cream_175ml.jpg', 'default', 'Cipla', 'Tube', '100', 1, 1, 'Personal', 'hair'),
(43, 'Himalaya Kajal Extra Smooth', 'himalaya_kajal_extra_smooth_1g.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Personal', 'eye'),
(44, 'Himalaya Lip Balm', 'himalaya_lip_balm_10g.jpg', 'default', 'Cipla', 'Tube', '100', 1, 1, 'Personal', 'lip'),
(45, 'Loreal Paris Kajal', 'l_oreal_paris_kajal_magique_supreme_me_black_0_35g.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Personal', 'eye'),
(46, 'Lotus Herbals Acnegel', 'lotus_herbals_acnegel_tea_tree_anti_pimple_and_acne_gel_100g.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Personal', 'facial'),
(47, 'Lotus herbals Strawberry lip balm', 'lotus_herbals_stawberry_lip_balm_5g.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'Personal', 'lip'),
(48, 'Nufeel Facial Spray for Women', 'nufeel_facial_spray_for_women_60g_60ml.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'otc', 'wc'),
(49, 'Olay Total Effects', 'olay_total_effects_7_in_one_day_cream_touch_of_foundation_spf_15_50g.jpg', 'default', 'Cipla', 'Box', '100', 1, 1, 'otc', 'wc'),
(50, 'Pigmento Ointment', 'pigmento_ointment_50g.jpg', 'default', 'Cipla', 'Tube', '100', 2, 1, 'personal', 'body');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `tim_stp` timestamp NOT NULL DEFAULT current_timestamp(),
  `fname` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `lname` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `mobile` varchar(20) COLLATE latin1_general_ci DEFAULT 'To be updated',
  `address` text COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
