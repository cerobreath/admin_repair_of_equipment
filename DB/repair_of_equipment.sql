-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Січ 05 2024 р., 19:50
-- Версія сервера: 10.4.28-MariaDB
-- Версія PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `repair_of_equipment`
--

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Принтери'),
(2, 'Ноутбуки'),
(3, 'Моноблоки'),
(4, 'Монітори'),
(5, 'Телевізори'),
(6, 'Сканери'),
(7, 'Настільні комп\'ютери'),
(8, 'Колонки');

-- --------------------------------------------------------

--
-- Структура таблиці `clients`
--

CREATE TABLE `clients` (
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `patronymic` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `clients`
--

INSERT INTO `clients` (`client_id`, `name`, `surname`, `patronymic`, `email`, `phone`, `address`, `password`) VALUES
(1, 'Денис', 'Лисенок', 'Віталійович', 'wwitaliy1@gmail.com', '+380945156781', 'вулиця 77-ї Гвардійської Дивізії, 1В, Чернігів, Чернігівська область, 14000', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(2, 'Петро', 'Щур', 'Борисович', 'petrochyr@gmail.com', '+380993262617', 'вулиця Котляревського, 15, Чернігів, Чернігівська область, 14000', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(3, 'Руслан', 'Зіновенко', 'Дмитрович', 'ryslandmitrovich@gmail.com', '+380915253741', 'проспект Миру, 80, Чернігів, Чернігівська область, 14005', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(4, 'Софія', 'Артюх', 'Борисівна', 'sofiaartyh@gmail.com', '+380983244624', 'Любецька вулиця, 28, Чернігів, Чернігівська область, 14000', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(5, 'Марія', 'Козлова', 'Олександрівна', 'mariia@gmail.com', '+380987654325', 'вулиця Івана Мазепи, 25, Чернігів, Чернігівська область, 14017', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(6, 'Євген', 'Мельников', 'Ігорович', 'yevgen@yahoo.com', '+380987654326', 'проспект Перемоги, 18, Чернігів, Чернігівська область, 14017', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(7, 'Ольга', 'Шевченко', 'Володимирівна', 'olga@hotmail.com', '+380987654327', 'вулиця Івана Мазепи, 45, Чернігів, Чернігівська область, 14000', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(8, 'Павло', 'Григоренко', 'Васильович', 'pavlo@gmail.com', '+380987654328', 'вулиця Івана Мазепи, 67, Чернігів, Чернігівська область, 14000', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(9, 'Анастасія', 'Савченко', 'Сергіївна', 'anastasia@yahoo.com', '+380987654329', NULL, '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(10, 'Владислав', 'Іванов', 'Віталійович', 'vladislav@hotmail.com', '+380987654330', 'вулиця 1 Травня, 170, Чернігів, Чернігівська область, 14039', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(11, 'Юлія', 'Павлова', 'Ігорівна', 'yulia@gmail.com', '+380987654331', 'вулиця Генерала Бєлова, 8, Чернігів, Чернігівська область, 14032', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(12, 'Максим', 'Степанов', 'Миколайович', 'maksim@yahoo.com', '+380987654332', 'проспект Левка Лук\'яненка, 20А, Чернігів, Чернігівська область, 14000', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(13, 'Ірина', 'Кузьміна', 'Дмитріївна', 'irina@hotmail.com', '+380987654333', 'вулиця Гетьмана Полуботка, 130, Чернігів, Чернігівська область, 14000', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(14, 'Віталій', 'Зайцев', 'Олегович', 'vitaliy@gmail.com', '+380987654334', 'вулиця Шевченка, 95, Чернігів, Чернігівська область, 14027', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(15, 'Валерій', 'Кравчук', 'Олегович', 'valeriy@gmail.com', '+380987654341', NULL, '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(16, 'Софія', 'Лисенко', 'Анатоліївна', 'sofia@yahoo.com', '+380987654342', ' ', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy');

-- --------------------------------------------------------

--
-- Структура таблиці `employees`
--

CREATE TABLE `employees` (
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `patronymic` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `employees`
--

INSERT INTO `employees` (`employee_id`, `name`, `surname`, `patronymic`, `email`, `phone`, `password`) VALUES
(1, 'Олег', 'Ковальчук', 'Віталійович', 'oleg@gmail.com', '+380987654335', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(2, 'Тетяна', 'Литвинова', 'Андріївна', 'tetiana@yahoo.com', '+380987654336', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(3, 'Денис', 'Горбачов', 'Сергійович', 'denis@hotmail.com', '+380987654337', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(5, 'Віктор', 'Петренко', 'Євгенович', 'viktor@yahoo.com', '+380987654339', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy'),
(9, 'Петро', 'Капустняк', 'Петрович', 'petrokapysta@gmail.com', '+380974146181', '$2y$10$/O9xJlu18NXdhDT.ZPRda.ZtGIzlH6XoFT8LlCWeFApVU6h0HUsuy');

-- --------------------------------------------------------

--
-- Структура таблиці `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `pay_method` varchar(50) NOT NULL,
  `pay_status` int(11) NOT NULL DEFAULT 0,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `orders`
--

INSERT INTO `orders` (`order_id`, `client_id`, `pay_method`, `pay_status`, `order_status`, `order_date`) VALUES
(1, 2, 'Cash', 1, 1, '2023-12-15'),
(24, 3, 'Credit card', 1, 1, '2023-12-16'),
(26, 6, 'Cash', 1, 1, '2023-12-16'),
(27, 4, 'Credit card', 0, 0, '2023-12-15'),
(28, 8, 'Cash', 1, 0, '2023-12-18'),
(29, 9, 'Cash', 0, 0, '2023-12-19');

-- --------------------------------------------------------

--
-- Структура таблиці `order_techniques`
--

CREATE TABLE `order_techniques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `technique_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `order_techniques`
--

INSERT INTO `order_techniques` (`id`, `order_id`, `technique_id`) VALUES
(16, 1, 1),
(19, 26, 3),
(20, 27, 6),
(21, 28, 10),
(22, 29, 12);

-- --------------------------------------------------------

--
-- Структура таблиці `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `services`
--

INSERT INTO `services` (`id`, `description`, `price`, `category_id`) VALUES
(1, 'Очищення друкарської головки', 200.00, 1),
(2, 'Заміна ролика подачі паперу', 250.00, 1),
(3, 'Заміна USB-порту', 300.00, 1),
(4, 'Заміна сканера', 700.00, 1),
(5, 'Виправлення проблем із затвердінням чорнила', 320.00, 1),
(6, 'Ремонт механізму автоподавання документів', 380.00, 1),
(7, 'Відновлення працездатності панелі управління', 500.00, 1),
(8, 'Виправлення проблем з живленням', 260.00, 1),
(9, 'Заміна плати керування', 1000.00, 1),
(10, 'Заміна тонера', 200.00, 1),
(11, 'Заміна акумулятора', 1000.00, 2),
(12, 'Очищення системи охолодження', 200.00, 2),
(13, 'Заміна твердотільного накопичувача (SSD)', 1000.00, 2),
(14, 'Заміна жорсткого диска (HDD)', 900.00, 2),
(15, 'Заміна роз\'ємів USB або HDMI', 250.00, 2),
(16, 'Відновлення роботи веб-камери', 400.00, 2),
(17, 'Відновлення роботи мікрофона', 380.00, 2),
(18, 'Заміна матриці екрана', 1500.00, 2),
(19, 'Оновлення оперативної пам\'яті (RAM)', 800.00, 2),
(20, 'Діагностика (без ремонту)', 150.00, 1),
(21, 'Проведення технічного обслуговування, включаючи очищення деталей і заміну потрібних компонентів', 200.00, 1),
(22, 'Заміна картриджу', 200.00, 1),
(23, 'Відновлення принтерного механізму (заміна деталей)', 350.00, 1),
(24, 'Програмне відновлення', 100.00, 1),
(25, 'Діагностика моноблоку', 200.00, 3),
(26, 'Очищення від пилу та обслуговування', 250.00, 3),
(27, 'Заміна акумулятора', 400.00, 3),
(28, 'Діагностика та відновлення роботи материнської плати', 700.00, 3),
(29, 'Видалення старого або пошкодженого HDD/SSD та установка нового диска', 400.00, 3),
(30, 'Встановлення нових модулів оперативної пам\'яті', 200.00, 3);

-- --------------------------------------------------------

--
-- Структура таблиці `technique`
--

CREATE TABLE `technique` (
  `technique_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `technique`
--

INSERT INTO `technique` (`technique_id`, `name`, `description`, `category_id`, `employee_id`) VALUES
(1, 'Dell Latitude 9420', 'Проблеми з завантаженням операційної системи, можливість появи блакитного екрану під час роботи.', 1, 2),
(2, 'Lenovo ThinkPad X1 Carbon Gen 9', '', 2, 1),
(3, 'HP Elite Dragonfly', NULL, 2, 3),
(6, 'HP E27d G4 Advanced Docking Monitor', 'Проблеми з USB-хабом, випадкове вимикання.', 4, 5),
(10, 'LG OLED C1', 'З\'являються чорні плями на екрані.', 4, 5),
(12, 'Lenovo ThinkPad X1 Carbon', 'Втрата звуку після перезавантаження.', 2, 3);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `id` (`category_id`);

--
-- Індекси таблиці `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD UNIQUE KEY `id` (`client_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Індекси таблиці `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `id` (`employee_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Індекси таблиці `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `id` (`order_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Індекси таблиці `order_techniques`
--
ALTER TABLE `order_techniques`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `technique_id` (`technique_id`);

--
-- Індекси таблиці `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Індекси таблиці `technique`
--
ALTER TABLE `technique`
  ADD PRIMARY KEY (`technique_id`),
  ADD UNIQUE KEY `id` (`technique_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблиці `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблиці `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблиці `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблиці `order_techniques`
--
ALTER TABLE `order_techniques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблиці `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблиці `technique`
--
ALTER TABLE `technique`
  MODIFY `technique_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `order_techniques`
--
ALTER TABLE `order_techniques`
  ADD CONSTRAINT `order_techniques_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_techniques_ibfk_2` FOREIGN KEY (`technique_id`) REFERENCES `technique` (`technique_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `technique`
--
ALTER TABLE `technique`
  ADD CONSTRAINT `technique_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `technique_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
