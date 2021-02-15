CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_nom` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text COLLATE utf8_bin NOT NULL,
  `prenom` text COLLATE utf8_bin NOT NULL,
  `num` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_nom`, `nom`, `prenom`, `num`, `email`) VALUES
(1, 'Berger', 'Julien', 'all099', 'jberger@free.fr'),
(2, 'Karl', 'Karine', '4000', 'kak40@hotmail.fr'),
(3, 'Pont', 'Hélene', '', 'pont@etu.fr'),
(4, 'Sunchine', 'Anna Lisa', '', 'als@sky.fr');

