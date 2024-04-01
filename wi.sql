-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Abr-2024 às 05:18
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `wi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_modelo` int(11) NOT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `peso` enum('Leve','Pesado') DEFAULT NULL,
  `taxa` decimal(10,2) NOT NULL DEFAULT 20.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_modelo`, `modelo`, `categoria`, `peso`, `taxa`) VALUES
(1, 'Toyota Corolla', 'Sedan compacto', 'Leve', 20.00),
(2, 'Honda Civic', 'Sedan compacto', 'Leve', 20.00),
(3, 'Ford Mustang', 'Coupé esportivo', 'Leve', 20.00),
(4, 'Chevrolet Silverado', 'Caminhonete', 'Pesado', 50.00),
(5, 'Volkswagen Golf', 'Hatchback compacto', 'Leve', 20.00),
(6, 'BMW 3 Series', 'Sedan de luxo', 'Leve', 20.00),
(7, 'Mercedes-Benz C-Class', 'Sedan de luxo', 'Leve', 20.00),
(8, 'Tesla Model S', 'Sedan elétrico de luxo', 'Leve', 20.00),
(9, 'Nissan Altima', 'Sedan médio', 'Leve', 20.00),
(10, 'Audi A4', 'Sedan de luxo', 'Leve', 20.00),
(11, 'Jeep Wrangler', 'SUV compacto', 'Pesado', 20.00),
(12, 'Subaru Outback', 'Station Wagon', 'Leve', 20.00),
(13, 'Hyundai Sonata', 'Sedan médio', 'Leve', 20.00),
(14, 'Kia Sorento', 'SUV médio', 'Pesado', 20.00),
(15, 'Mazda CX-5', 'SUV compacto', 'Leve', 20.00),
(16, 'Porsche 911', 'Coupé esportivo de luxo', 'Leve', 20.00),
(17, 'Lexus RX', 'SUV de luxo', 'Pesado', 20.00),
(18, 'Ford F-150', 'Caminhonete', 'Pesado', 20.00),
(19, 'Toyota RAV4', 'SUV compacto', 'Leve', 20.00),
(20, 'Honda CR-V', 'SUV compacto', 'Leve', 20.00),
(21, 'Chevrolet Equinox', 'SUV compacto', 'Leve', 20.00),
(22, 'GMC Sierra', 'Caminhonete', 'Pesado', 20.00),
(23, 'Dodge Charger', 'Sedan esportivo', 'Leve', 20.00),
(24, 'Ford Explorer', 'SUV grande', 'Pesado', 20.00),
(25, 'Jeep Grand Cherokee', 'SUV grande', 'Pesado', 20.00),
(26, 'Toyota Camry', 'Sedan médio', 'Leve', 20.00),
(27, 'Nissan Rogue', 'SUV compacto', 'Leve', 20.00),
(28, 'Subaru Forester', 'SUV compacto', 'Leve', 20.00),
(29, 'BMW X5', 'SUV de luxo', 'Pesado', 20.00),
(30, 'Volkswagen Tiguan', 'SUV compacto', 'Leve', 20.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `permisos`
--

INSERT INTO `permisos` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Lector');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rol` int(11) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `cargo` varchar(70) NOT NULL,
  `usuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `nombre`, `correo`, `telefono`, `password`, `fecha`, `rol`, `imagen`, `cargo`, `usuario`) VALUES
(1, 'Tiago Gomes', 'tiago@gmail.com', '7100', '12345', '2023-10-08 00:59:47', 1, '', 'Dev', 'Tiago'),
(2, 'Emanuel', 'mugarte5672@gmail.com', '9911165670', '12345', '2024-01-28 20:34:06', 1, 'user1.png', 'Dono', 'Emanuel'),
(66, 'Tommy Shelby', 'Mafia@Irlandesa.com', '55825888', '12345', '2023-08-16 17:37:26', 2, 'qr.png', '', 'Tommt'),
(68, 'Maria', 'jt615257@gmail.com', '9911165670', '12345', '2023-10-08 01:33:18', 2, 'bg.jpg', 'Atendente', 'Maria'),
(70, 'Shaggy', 'Shaggy@Buu.net', '9911165670', '12345', '2023-08-16 17:37:26', 2, 'user.png', '', 'Shaggy'),
(81, 'testdriv', 'driv@gmail.com', '71', '12345t', '2023-10-30 00:39:46', 1, '', 'analista', 'tiagoDriv'),
(82, 'Tiago Luis Gomes Santos', 'tiago.dev9@gmail.com', '(71) 98637-6784', '12345', '2023-10-30 00:46:56', 1, '', 'dev', 'tiago gomes1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id_veiculo` int(11) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `cliente` varchar(80) NOT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `cor` varchar(30) DEFAULT NULL,
  `data_entrada` datetime DEFAULT NULL,
  `data_saida` datetime DEFAULT NULL,
  `taxa` int(11) NOT NULL DEFAULT 20
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id_veiculo`, `placa`, `cliente`, `marca`, `modelo`, `cor`, `data_entrada`, `data_saida`, `taxa`) VALUES
(30, 'ggi1504', 'Gabriel', '5', '5', 'd', '2024-03-31 00:39:10', '2024-03-31 13:37:55', 20),
(45, 'luis55', 'luis', '2', '1', 's', '2024-03-31 10:10:24', '2024-03-31 13:38:07', 20),
(46, 'dia88', 'dia', '9', '9', 'prata', '2024-03-31 10:13:03', '2024-03-31 13:38:16', 20),
(49, 'h', 'h', '1', '1. Toyota Corolla', 'd', '2024-03-31 13:00:00', '2024-03-31 13:38:22', 20),
(50, '1', 'd', 'd', '1. Toyota Corolla', '1', '2024-03-31 13:00:17', '2024-03-31 13:38:30', 20),
(51, 'tiago5', 'tiago', 'asd', '5. Volkswagen Golf', 'asd', '2024-03-31 13:03:46', '2024-03-31 13:36:57', 20),
(54, '9', '9', '9', '9. Nissan Altima', '9', '2024-03-31 16:07:16', '2024-03-31 16:07:16', 20);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Índices para tabela `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permisos` (`rol`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id_veiculo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id_veiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
