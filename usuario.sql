-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 06-Jul-2020 às 18:45
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_nome` varchar(60) NOT NULL,
  `us_sobrenome` varchar(60) NOT NULL,
  `us_cpf` varchar(11) NOT NULL,
  `us_email` varchar(80) NOT NULL,
  `us_rua` varchar(80) NOT NULL,
  `us_bairro` varchar(20) NOT NULL,
  `us_complemento` varchar(60) DEFAULT NULL,
  `us_cidade` varchar(30) NOT NULL,
  `us_uf` varchar(3) NOT NULL,
  `us_senha` varchar(100) NOT NULL,
  PRIMARY KEY (`us_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`us_id`, `us_nome`, `us_sobrenome`, `us_cpf`, `us_email`, `us_rua`, `us_bairro`, `us_complemento`, `us_cidade`, `us_uf`, `us_senha`) VALUES
(1, 'José Carlos', 'Nogueira Morais', '85549703220', 'jcnogueiramorais@hotmail.com', '0', 'Buritizal', '', 'Macapá', 'AP', '$2y$10$GjcOJO6LajeSIFIfEUSJEeCeFEV90.n4od.he30iH8dzf8kZnPcyK'),
(2, 'Maria', 'Graca', '12345678901', 'email@email.com', '0', 'bairro', '', 'cidade', 'AC', '$2y$10$dogkKTNhaio0FWQnW44FNO/du2IINvZ1Ytn0PrhBvULzVWEj12l0a'),
(3, 'L', 'L', '12345678901', 'D@W.COM', '0', 'BAIRRO', '', 'MACAOPA', 'AC', '$2y$10$Vs2amy7/xnn2aj1P3WlEpu3IVcNZC2.zFliXSXlcN2yu.dZHfLhPy');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
