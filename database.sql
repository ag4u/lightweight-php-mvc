--
-- Tabellenstruktur für Tabelle `greeting`
--

DROP TABLE IF EXISTS `greeting`;
CREATE TABLE IF NOT EXISTS `greeting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` char(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `greeting`
--

INSERT INTO `greeting` (`id`, `text`, `created`) VALUES
(1, 'Bonjour', '2022-07-16 11:55:22'),
(2, 'Hola', '2022-07-16 11:55:22'),
(3, 'Nin hao', '2022-07-16 11:55:22'),
(4, 'Salve', '2022-07-16 11:55:22'),
(5, 'Konnichiwa', '2022-07-16 11:55:22'),
(6, 'Guten Tag', '2022-07-16 11:55:22'),
(7, 'Ola', '2022-07-16 11:55:22'),
(8, 'Asalaam alaikum', '2022-07-16 11:55:22'),
(9, 'Goddag', '2022-07-16 11:55:22'),
(10, 'Goedendag', '2022-07-16 11:55:22');
COMMIT;
