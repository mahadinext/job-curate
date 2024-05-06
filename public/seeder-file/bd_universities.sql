-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2018 at 10:01 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



-- --------------------------------------------------------

--
-- Table structure for table `bd_universities`
--

CREATE TABLE `bd_universities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bd_universities`
--

INSERT INTO `universities` (`id`, `name`, `type`) VALUES
(1, 'University of Dhaka', 'Public'),
(2, 'University of Rajshahi', 'Public'),
(3, 'Bangladesh Agricultural University', 'Public'),
(4, 'Bangladesh University of Engineering & Technology', 'Public'),
(5, 'University of Chittagong', 'Public'),
(6, 'Jahangirnagar University', 'Public'),
(7, 'Islamic University, Bangladesh', 'Public'),
(8, 'Shahjalal University of Science and Technology', 'Public'),
(9, 'Khulna University', 'Public'),
(10, 'Bangabandhu Sheikh Mujib Medical University ', 'Public'),
(11, 'Bangabandhu Sheikh Mujibur Rahman Agricultural University', 'Public'),
(12, 'Hajee Mohammad Danesh Science & Technology University', 'Public'),
(13, 'Mawlana Bhashani Science and Technology University', 'Public'),
(14, 'Patuakhali Science and Technology University', 'Public'),
(15, 'Sher-e-Bangla Agricultural University', 'Public'),
(16, 'Dhaka University of Engineering & Technology', 'Public'),
(17, 'Rajshahi University of Engineering & Technology', 'Public'),
(18, 'Chittagong University of Engineering & Technology', 'Public'),
(19, 'Khulna University of Engineering & Technology', 'Public'),
(20, 'Jagannath University', 'Public'),
(21, 'Jatiya Kabi Kazi Nazrul Islam University', 'Public'),
(22, 'Chittagong Veterinary and Animal Sciences University', 'Public'),
(23, 'Sylhet Agricultural University', 'Public'),
(24, 'Comilla University', 'Public'),
(25, 'Noakhali Science and Technology University', 'Public'),
(26, 'Jessore University of Science & Technology', 'Public'),
(27, 'Pabna University of Science and Technology', 'Public'),
(28, 'Bangladesh University of Professionals', 'Public'),
(29, 'Begum Rokeya University', 'Public'),
(30, 'Bangladesh University of Textiles', 'Public'),
(31, 'University of Barisal', 'Public'),
(32, 'Bangabandhu Sheikh Mujibur Rahman Science and Technology University', 'Public'),
(33, 'Islamic Arabic University', 'Public'),
(34, 'Bangabandhu Sheikh Mujibur Rahman Maritime University', 'Public'),
(35, 'Rangamati Science and Technology University', 'Public'),
(36, 'Dhaka International University', 'Private'),
(37, 'Ahsanullah University of Science and Technology', 'Private'),
(38, 'BRAC University', 'Private'),
(39, 'East West University', 'Private'),
(40, 'North South University', 'Private'),
(41, 'American International University-Bangladesh', 'Private'),
(42, 'Independent University, Bangladesh', 'Private'),
(43, 'Bangladesh University of Business and Technology', 'Private'),
(44, 'Gono Bishwabidyalay', 'Private'),
(45, 'Hamdard University Bangladesh', 'Private'),
(46, 'International Islamic University, Chittagong', 'Private'),
(47, 'Chittagong Independent University (CIU)', 'Private'),
(48, 'University of Science & Technology Chittagong', 'Private'),
(49, 'Begum Gulchemonara Trust University', 'Private'),
(50, 'East Delta University', 'Private'),
(51, 'Bangladesh Army University of Science and Technology', 'Private'),
(52, 'Bangladesh Army International University of Science & Technology', 'Private'),
(53, 'Britannia University', 'Private'),
(54, 'Feni University', 'Private'),
(55, 'Bangladesh Army University of Engineering & Technology', 'Private'),
(56, 'Premier University, Chittagong', 'Private'),
(57, 'Exim Bank Agricultural University Bangladesh', 'Private'),
(58, 'Southern University, Bangladesh', 'Private'),
(59, 'Port City International University', 'Private'),
(60, 'Coxs Bazar International University', 'Private'),
(61, 'Notre Dame University Bangladesh', 'Private'),
(62, 'Asian University of Bangladesh', 'Private'),
(63, 'Asa University Bangladesh', 'Private'),
(64, 'Atish Dipankar University of Science and Technology', 'Private'),
(65, 'Bangladesh Islami University', 'Private'),
(66, 'Bangladesh University', 'Private'),
(67, "Central Women's University", "Private"),
(68, 'City University, Bangladesh', 'Private'),
(69, 'Daffodil International University', 'Private'),
(70, 'Eastern University, Bangladesh', 'Private'),
(71, 'Green University of Bangladesh', 'Private'),
(72, 'IBAIS University', 'Private'),
(73, 'Sonargaon University', 'Private'),
(74, 'International University of Business Agriculture and Technology', 'Private'),
(75, 'Manarat International University', 'Private'),
(76, 'Millennium University', 'Private'),
(77, 'Northern University, Bangladesh', 'Private'),
(78, 'North Western University, Bangladesh', 'Private'),
(79, "People's University of Bangladesh", "Private"),
(80, 'Presidency University', 'Private'),
(81, 'Pundra University of Science and Technology', 'Private'),
(82, 'Prime University', 'Private'),
(83, 'European University of Bangladesh', 'Private'),
(84, 'Primeasia University', 'Private'),
(85, 'Queens University', 'Private'),
(86, 'Rajshahi Science & Technology University', 'Private'),
(87, 'Royal University of Dhaka', 'Private'),
(88, 'Shanto-Mariam University of Creative Technology', 'Private'),
(89, 'Southeast University', 'Private'),
(90, 'Stamford University Bangladesh', 'Private'),
(91, 'State University of Bangladesh', 'Private'),
(92, 'United International University', 'Private'),
(93, 'University of Asia Pacific (Bangladesh)', 'Private'),
(94, 'University of Development Alternative', 'Private'),
(95, 'University of Information Technology and Sciences', 'Private'),
(96, 'University of Liberal Arts Bangladesh', 'Private'),
(97, 'Fareast International University', 'Private'),
(98, 'University of South Asia, Bangladesh', 'Private'),
(99, 'Uttara University', 'Private'),
(100, 'Victoria University of Bangladesh', 'Private'),
(101, 'Varendra University', 'Private'),
(102, 'World University of Bangladesh', 'Private'),
(103, 'Leading University', 'Private'),
(104, 'Metropolitan University', 'Private'),
(105, 'North East University Bangladesh', 'Private'),
(106, 'Sylhet International University', 'Private'),
(107, 'Khwaja Yunus Ali University', 'Private'),
(108, 'Global University Bangladesh', 'Private'),
(109, 'University of Creative Technology Chittagong', 'Private'),
(110, 'Z H Sikder University of Science & Technology', 'Private'),
(111, 'Central University of Science and Technology', 'Private'),
(112, 'Canadian University of Bangladesh', 'Private'),
(113, 'First Capital University of Bangladesh', 'Private'),
(114, 'Ishaka International University', 'Private'),
(115, 'Northern University of Business & Technology, Khulna', 'Private'),
(116, 'North Bengal International University', 'Private'),
(117, 'Ranada Prasad Shaha University', 'Private'),
(118, 'Islamic University of Technology', 'International'),
(119, 'Asian University for Women', 'International'),
(120, 'Bangladesh Open University', 'Special'),
(121, 'National University of Bangladesh', 'Special'),
(122, 'Islamic Arabic University', 'Special');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bd_universities`
--
ALTER TABLE `bd_universities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bd_universities`
--
ALTER TABLE `bd_universities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
