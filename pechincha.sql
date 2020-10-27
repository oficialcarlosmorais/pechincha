-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 27-Out-2020 às 16:45
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
-- Database: `pechincha`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

DROP TABLE IF EXISTS `itens`;
CREATE TABLE IF NOT EXISTS `itens` (
  `itn_id` int(11) NOT NULL AUTO_INCREMENT,
  `itn_ls_id` varchar(10) NOT NULL,
  `itn_nome` varchar(30) NOT NULL,
  `itn_qtd` varchar(5) NOT NULL,
  PRIMARY KEY (`itn_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`itn_id`, `itn_ls_id`, `itn_nome`, `itn_qtd`) VALUES
(4, '13', 'Argamassa AC1', '22'),
(3, '13', 'Lajota tipo A', '32'),
(5, '13', 'Rejunte', '10'),
(6, '13', 'Rejunte branco', '10'),
(14, '14', 'Vaso acoplado preto', '8'),
(13, '2', 'Bucha', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista`
--

DROP TABLE IF EXISTS `lista`;
CREATE TABLE IF NOT EXISTS `lista` (
  `ls_id` int(11) NOT NULL AUTO_INCREMENT,
  `ls_orc_nome` varchar(30) NOT NULL,
  `ls_data` varchar(10) NOT NULL,
  `ls_user` varchar(10) NOT NULL,
  PRIMARY KEY (`ls_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lista`
--

INSERT INTO `lista` (`ls_id`, `ls_orc_nome`, `ls_data`, `ls_user`) VALUES
(1, 'elétrico', '15/10/2020', '1'),
(2, 'Hidráulico', '15/10/2020', '1'),
(3, 'Piso', '15/10/2020', '1'),
(4, 'Novo 1', '15/10/2020', '1'),
(5, 'novo 2', '15/10/2020', '1'),
(6, 'nova lista 3', '15/10/2020', '1'),
(7, 'nova lista 4', '15/10/2020', '1'),
(8, 'nova lista 8', '15/10/2020', '1'),
(9, 'nova lista 9', '15/10/2020', '1'),
(10, 'nova lista 10', '15/10/2020', '1'),
(11, 'Mais uma', '15/10/2020', '1'),
(12, 'Eletrônicos', '16/10/2020', '1'),
(13, 'Cerâmica', '16/10/2020', '1'),
(14, 'Banheiro', '16/10/2020', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja`
--

DROP TABLE IF EXISTS `loja`;
CREATE TABLE IF NOT EXISTS `loja` (
  `loja_id` int(11) NOT NULL AUTO_INCREMENT,
  `loja_raz_social` varchar(30) DEFAULT NULL,
  `loja_nom_fantasia` varchar(30) NOT NULL,
  `loja_cnpj` varchar(18) NOT NULL,
  `loja_email` varchar(60) NOT NULL,
  `loja_logradouro` varchar(12) NOT NULL,
  `loja_numero` varchar(5) DEFAULT NULL,
  `loja_bairro` varchar(60) NOT NULL,
  `loja_complemento` varchar(60) DEFAULT NULL,
  `loja_cidade` varchar(30) NOT NULL,
  `loja_uf` varchar(2) NOT NULL,
  `loja_telefone` varchar(15) NOT NULL,
  `loja_celular` varchar(15) NOT NULL,
  `loja_senha` varchar(60) NOT NULL,
  `loja_status` varchar(1) NOT NULL,
  `loja_endereco` varchar(60) NOT NULL,
  PRIMARY KEY (`loja_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `loja`
--

INSERT INTO `loja` (`loja_id`, `loja_raz_social`, `loja_nom_fantasia`, `loja_cnpj`, `loja_email`, `loja_logradouro`, `loja_numero`, `loja_bairro`, `loja_complemento`, `loja_cidade`, `loja_uf`, `loja_telefone`, `loja_celular`, `loja_senha`, `loja_status`, `loja_endereco`) VALUES
(6, NULL, 'Monte Casa e Construção', '', '', '', '', '', '', '', '', '', '', '', '1', 'Chapéu de Palha'),
(4, NULL, 'Oi', '', '', '', '', '', '', '', '', '', '', '', '1', 'Avenida dos Galibis'),
(5, NULL, 'MM Penante Aço Forte Amapá', '', '', '', '', '', '', '', '', '', '', '', '1', 'Av. 14'),
(7, 'tropical-me', 'Tropical Center', '33333333333333', 'adm@tropical.com', 'Avenida', '1429', 'Buritizal', '', 'Macapá', 'AP', '096991705841', '09632210459', '$2y$10$lHKm/0DUjmIXfVTrB0rE7.nttKg5d1p1Vo8gBhKr6TGmjw2/Toexq', '1', '13 de setembro'),
(8, 'Monte-LTDA', 'Monte Casa e Construção', '11111111111111', 'adm@monte.com.br', 'Av.', '', 'Central', '', 'Macapá', 'AP', '99999999999', '99999999990', '$2y$10$lAqkndusJw90menWne3Jl.iGk50XzPlYn6U20o/5SX4ISxMMOZume', '1', 'Padre Júlio'),
(9, 'Ponto A EIRELI', 'Ponto A da construção', '22222222222222', 'adm@pontoa.com.br', 'Rua', '1312', 'Buritizal', '', 'Macapá', 'AP', '9599999991', '9999999999', '$2y$10$oUZqCVoM0wL9J60P5m0nhu5LmeE5ibGyFfBvoquez49qqKb7P7CAK', '1', 'Paraná');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_itn_id` varchar(10) DEFAULT NULL,
  `prod_valor` varchar(10) DEFAULT NULL,
  `prod_loja` varchar(30) NOT NULL,
  `prod_data` varchar(10) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`prod_id`, `prod_itn_id`, `prod_valor`, `prod_loja`, `prod_data`) VALUES
(25, '14', '280', 'Dois Irmãos', '22/10/2020'),
(24, '14', '135', '2A', '21/10/2020');

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
  `us_telefone` varchar(14) DEFAULT NULL,
  `us_celular` varchar(14) NOT NULL,
  `us_senha` varchar(100) NOT NULL,
  `us_tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`us_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`us_id`, `us_nome`, `us_sobrenome`, `us_cpf`, `us_email`, `us_rua`, `us_bairro`, `us_complemento`, `us_cidade`, `us_uf`, `us_telefone`, `us_celular`, `us_senha`, `us_tipo`) VALUES
(1, 'José Carlos', 'Nogueira Morais', '85549703220', 'jcnogueiramorais@hotmail.com', 'Av. Diógenes Silva, nº 2089', 'Buritizal', '', 'Macapá', 'AP', '', '96991705841', '$2y$10$GjcOJO6LajeSIFIfEUSJEeCeFEV90.n4od.he30iH8dzf8kZnPcyK', 'tec'),
(2, 'Maria', 'Graca', '12345678901', 'novoemail@email.com', 'Avenida Diógenes Silva, nº 2089', 'Buritizal', '-', 'cidade', 'AC', '/', '96991143029', '$2y$10$dogkKTNhaio0FWQnW44FNO/du2IINvZ1Ytn0PrhBvULzVWEj12l0a', 'cli'),
(5, 'Cliente Novo', 'da Silva', '12312312312', 'E@MAIL.COM', 'Av. Nossa Senhora de Nazaré', 'Novo Horizonte', '', 'MACAPÁ', 'AP', '967777777', '967777777', '$2y$10$jLrlFzqecbnVc.GRrisZAe1h0qJdZ1XNXQWMQBUjPoZPePHs2yaUO', 'cli'),
(7, 'Cesar', 'Moura', '12112121212', 'cesar@gmail.com', '3', 'Marabaixo I', '', 'Macapá', 'AP', '96999999999', '96999999999', '$2y$10$43o9NzR/wTUyOmYs2lP2a.zE3cioRDJcmeC.pjqyENUvUR25RoKja', 'tec'),
(9, 'Lourival Neto', 'Borges Pessoa Cambraia Neto', '11122233344', 'borges@cambraia.com', 'Av. Limeira Batista, nº 357', 'Pacoval', '', 'Macapá', 'AP', '96991336464', '96991336464', '$2y$10$h1kjYwG1u1PrJJ/xa390bOW1uLkkNoL.OqCQktt2ZiJLJV49sdmU.', 'cli'),
(12, 'Antônio Sérgio', 'Nogueira Morais', '91919191919', 'e@mail.com', 'Av. Adálvaro Cavalcante, 3088', 'Buritizal', '', 'Macapá', 'AP', '9699919191', '9699919191', '$2y$10$lbpUfbMk2dxYMWjm9CCyGe8PE2tUNrQ/P7.pjCd7mGe6FvakWjmaK', 'cli'),
(11, 'Benedito Ayres', 'Lima Queiroz', '98798798712', 'e@mail.com', 'Rua das Laranjeiras 2', 'nova Esperança', '', 'Curubá', 'AL', '8099149191', '8099149191', '$2y$10$JrLN4fsSH/8ljehZAWBlXuFU8qcS7YWmh5nX8/7wkcodkQEGevBpK', 'cli');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
