CREATE DATABASE IF NOT EXISTS `cbrf-quotes`;
USE `cbrf-quotes`;

CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valuteID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `currencies` (`id`, `valuteID`, `value`, `date_update`) VALUES
	(1, 'R01235', '60,3982', '2022-11-15'),
	(2, 'R01235', '60,3116', '2022-11-16'),
	(3, 'R01235', '60,3484', '2022-11-17'),
	(4, 'R01235', '60,3894', '2022-11-18'),
	(5, 'R01235', '60,3741', '2022-11-19'),
	(6, 'R01235', '60,7379', '2022-11-22'),
	(7, 'R01235', '60,6566', '2022-11-23'),
	(8, 'R01235', '60,5043', '2022-11-24'),
	(9, 'R01235', '60,3866', '2022-11-25'),
	(10, 'R01235', '60,4797', '2022-11-26'),
	(11, 'R01235', '60,7520', '2022-11-29'),
	(12, 'R01235', '61,0742', '2022-11-30'),
	(13, 'R01235', '60,8803', '2022-12-01'),
	(14, 'R01235', '61,1479', '2022-12-02'),
	(15, 'R01235', '61,7749', '2022-12-03'),
	(16, 'R01235', '62,1849', '2022-12-06'),
	(17, 'R01235', '62,9103', '2022-12-07'),
	(18, 'R01235', '62,9372', '2022-12-08'),
	(19, 'R01235', '62,5722', '2022-12-09'),
	(20, 'R01235', '62,3813', '2022-12-10'),
	(21, 'R01235', '62,7674', '2022-12-13'),
	(22, 'R01235', '63,2120', '2022-12-14'),
	(23, 'R01235', '63,3590', '2022-12-15');

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int NOT NULL AUTO_INCREMENT,
  `valuteID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numCode` int DEFAULT NULL,
  `charCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `currency` (`id`, `valuteID`, `numCode`, `charCode`, `name`, `value`, `date_update`) VALUES
	(1, 'R01010', 36, 'AUD', 'Австралийский доллар', '42,3694', '2022-12-10'),
	(2, 'R01020A', 944, 'AZN', 'Азербайджанский манат', '36,6949', '2022-12-10'),
	(3, 'R01035', 826, 'GBP', 'Фунт стерлингов Соединенного королевства', '76,2237', '2022-12-10'),
	(4, 'R01060', 51, 'AMD', 'Армянских драмов', '15,7807', '2022-12-10'),
	(5, 'R01090B', 933, 'BYN', 'Белорусский рубль', '25,2362', '2022-12-10'),
	(6, 'R01100', 975, 'BGN', 'Болгарский лев', '33,5510', '2022-12-10'),
	(7, 'R01115', 986, 'BRL', 'Бразильский реал', '11,9761', '2022-12-10'),
	(8, 'R01135', 348, 'HUF', 'Венгерских форинтов', '15,8727', '2022-12-10'),
	(9, 'R01200', 344, 'HKD', 'Гонконгских долларов', '80,3055', '2022-12-10'),
	(10, 'R01215', 208, 'DKK', 'Датских крон', '88,2188', '2022-12-10'),
	(11, 'R01235', 840, 'USD', 'Доллар США', '62,3813', '2022-12-10'),
	(12, 'R01239', 978, 'EUR', 'Евро', '65,8407', '2022-12-10'),
	(13, 'R01270', 356, 'INR', 'Индийских рупий', '76,8459', '2022-12-10'),
	(14, 'R01335', 398, 'KZT', 'Казахстанских тенге', '13,2116', '2022-12-10'),
	(15, 'R01350', 124, 'CAD', 'Канадский доллар', '45,9294', '2022-12-10'),
	(16, 'R01370', 417, 'KGS', 'Киргизских сомов', '73,4330', '2022-12-10'),
	(17, 'R01375', 156, 'CNY', 'Китайских юаней', '89,6236', '2022-12-10'),
	(18, 'R01500', 498, 'MDL', 'Молдавских леев', '32,1387', '2022-12-10'),
	(19, 'R01535', 578, 'NOK', 'Норвежских крон', '62,5213', '2022-12-10'),
	(20, 'R01565', 985, 'PLN', 'Польский злотый', '14,0698', '2022-12-10'),
	(21, 'R01585F', 946, 'RON', 'Румынский лей', '13,3822', '2022-12-10'),
	(22, 'R01589', 960, 'XDR', 'СДР (специальные права заимствования)', '82,6746', '2022-12-10'),
	(23, 'R01625', 702, 'SGD', 'Сингапурский доллар', '46,1913', '2022-12-10'),
	(24, 'R01670', 972, 'TJS', 'Таджикских сомони', '61,1180', '2022-12-10'),
	(25, 'R01700J', 949, 'TRY', 'Турецких лир', '33,4717', '2022-12-10'),
	(26, 'R01710A', 934, 'TMT', 'Новый туркменский манат', '17,8232', '2022-12-10'),
	(27, 'R01717', 860, 'UZS', 'Узбекских сумов', '55,3984', '2022-12-10'),
	(28, 'R01720', 980, 'UAH', 'Украинских гривен', '16,8930', '2022-12-10'),
	(29, 'R01760', 203, 'CZK', 'Чешских крон', '26,9734', '2022-12-10'),
	(30, 'R01770', 752, 'SEK', 'Шведских крон', '60,4863', '2022-12-10'),
	(31, 'R01775', 756, 'CHF', 'Швейцарский франк', '66,7823', '2022-12-10'),
	(32, 'R01810', 710, 'ZAR', 'Южноафриканских рэндов', '36,3506', '2022-12-10'),
	(33, 'R01815', 410, 'KRW', 'Вон Республики Корея', '47,9377', '2022-12-10'),
	(34, 'R01820', 392, 'JPY', 'Японских иен', '45,5737', '2022-12-10');

CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `auth_token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `login`, `pass`, `auth_token`) VALUES
	(1, 'admin', '$2y$10$FFC/qN7raW2OJtsRKLdsnedfcDPhibe.3c3sm60n1ZAhcDVZmboYa', 'ef8981dc3eaf9d0d23d4a4d1c0e26905e8bb2e3116931bb945');
