-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 29, 2020 lúc 06:25 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idRoom` int(11) NOT NULL,
  `checkin` datetime NOT NULL,
  `checkout` datetime DEFAULT NULL,
  `mota` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `loai` varchar(200) NOT NULL,
  `gia` int(11) NOT NULL,
  `isFree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`id`, `loai`, `gia`, `isFree`) VALUES
(1, 'first class', 220, 1),
(2, 'first class', 220, 1),
(3, 'first class', 220, 1),
(4, 'first class', 220, 1),
(5, 'first class', 220, 1),
(6, 'deluxue room', 150, 1),
(7, 'deluxue room', 150, 1),
(8, 'deluxue room', 150, 1),
(9, 'deluxue room', 150, 1),
(10, 'deluxue room', 150, 1),
(11, 'suite room', 180, 1),
(12, 'suite room', 180, 1),
(13, 'suite room', 180, 1),
(14, 'suite room', 180, 1),
(15, 'suite room', 180, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dateRegister` datetime DEFAULT NULL,
  `profileImage` varchar(200) DEFAULT NULL,
  `ngaysinh` datetime DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `password`, `dateRegister`, `profileImage`, `ngaysinh`, `gender`, `role`) VALUES
(3, 'Quang', 'Đỗ Thanh', 'admin@gmail.com', '123456', NULL, './assets/profile/82248513_768009157046055_5236067980005081088_o.jpg', NULL, NULL, NULL),
(4, 'Nam', 'Lê Quang', 'visccnam@gmail.com', '123456', NULL, './assets/profile/75246808_492124404725226_6450206980626710528_n.jpg', '2020-07-17 00:00:00', 'Nam', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idRoom` (`idRoom`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`idRoom`) REFERENCES `room` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
