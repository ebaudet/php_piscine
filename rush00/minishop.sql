CREATE TABLE IF NOT EXISTS `achat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `achat_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_achat` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nom` text COLLATE latin1_bin NOT NULL,
  `prix` int(255) NOT NULL,
  `promotion` tinyint(1) NOT NULL,
  `path_img` text COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=10 ;

INSERT INTO `article` (`id`, `nom`, `prix`, `promotion`, `path_img`) VALUES
(1, 'T-shirt 42', 10, 1, 'images/banlieue-42-Tee-shirts.png'),
(2, 'T-shirt Hello Kitty', 25, 1, 'images/images_articlestee_shirt.jpg'),
(3, 'T-shirt 42 White', 12, 0, 'images/White-Number---42---Forty-Two-T-Shirts.png'),
(6, 'Zbra', 0, 1, 'images/suricate-hey.jpg'),
(7, 'tagada', 7, 0, 'images/40-ans-fraise-tagada.jpg');

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=10 ;

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Femme'),
(2, 'Homme'),
(3, 'Enfant'),
(4, 'Vieillard'),
(5, 'Geek'),
(6, 'Hipster'),
(7, 'Gangsta'),
(8, 'Moyen-âge'),
(9, 'Blague');

CREATE TABLE IF NOT EXISTS `categorie_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

INSERT INTO `categorie_article` (`id`, `id_article`, `id_categorie`) VALUES
(21, 6, 3),
(22, 6, 5),
(23, 6, 8),
(32, 3, 1),
(36, 7, 3),
(37, 7, 4),
(38, 7, 6),
(39, 1, 5),
(40, 1, 6),
(41, 1, 7),
(42, 2, 1),
(43, 2, 3),
(44, 2, 4);

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `pseudo` tinytext COLLATE latin1_bin NOT NULL,
  `nom` tinytext COLLATE latin1_bin NOT NULL,
  `prenom` tinytext COLLATE latin1_bin NOT NULL,
  `sexe` tinyint(1) NOT NULL,
  `email` tinytext COLLATE latin1_bin NOT NULL,
  `password` tinytext COLLATE latin1_bin NOT NULL,
  `droit` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=2 ;

INSERT INTO `user` (`id`, `pseudo`, `nom`, `prenom`, `sexe`, `email`, `password`, `droit`) VALUES
(1, 'ebaudet', 'baudet', 'emilien', 1, 'pok', 'b913d5bbb8e461c2c5961cbe0edcdadfd29f068225ceb37da6defcf89849368f8c6c2eb6a4c4ac75775d032a0ecfdfe8550573062b653fe92fc7b8fb3b7be8d6', 0);

