CREATE TABLE `Artiste` (
                           `id` int(11) NOT NULL,
                           `nom` varchar(50) NOT NULL,
                           `prenom` varchar(50) NOT NULL,
                           `image` varchar(50) NOT NULL,
                           `datenaissance` varchar(20) NOT NULL,
                           `specialite` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
ALTER TABLE `Artiste` ADD PRIMARY KEY (`id`);
ALTER TABLE `Artiste` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;