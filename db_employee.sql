-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Sep 2024 pada 12.46
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_employee`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `hire_date` date NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `salary` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `last_name`, `email`, `gender`, `phone_number`, `hire_date`, `job_title`, `salary`, `department_name`, `address`, `date_of_birth`, `foto`) VALUES
(8, 'Angga', 'Yunanda', 'angga@gmail.com', 'Laki-laki', '083646237462', '2024-09-20', 'FullStack Developer', 2147483647, 'IT Infrastructure', '', '2000-02-07', ''),
(11, 'Shinta', 'Nursobah', 'shintanursobah79@gmail.com', 'Perempuan', '08526397492', '2024-09-20', 'FullStack Developer', 20000000, 'Software Development', 'Yogyakarta', '2024-09-19', 'https://tse1.mm.bing.net/th?id=OIP.2RVxmUXNM99swdRA0khnIQHaFf&pid=Api&P=0&h=220');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `dateBirth` date NOT NULL,
  `jenisKelamin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstName`, `lastName`, `phoneNumber`, `dateBirth`, `jenisKelamin`) VALUES
(1, 'adminUsername', 'adminPassword102030', '0', '0', '0', '0000-00-00', ''),
(2, 'shinta', 'nbjhjhj', 'Shinta', 'Nursobah', '08526397492', '2024-09-13', 'Perempuan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
