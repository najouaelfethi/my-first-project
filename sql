-- Abonnement table
CREATE TABLE `abonnement` (
  `idab` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `prix` float NOT NULL,
  `idclient` int(11) NOT NULL
) 

--Client table
CREATE TABLE `client` (
  `idclient` int(11) NOT NULL,
  `nom` varchar(27) NOT NULL,
  `prenom` varchar(27) NOT NULL,
  `username` varchar(27) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `cin` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `photo` longblob NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `idcpt` int(11) NOT NULL,
  `idab` int(11) NOT NULL,
  `idetud` int(11) NOT NULL
) 

--Compte table
CREATE TABLE `compte` (
  `idcpt` int(11) NOT NULL,
  `user` varchar(27) NOT NULL,
  `password` varchar(27) NOT NULL,
  `idclient` int(11) NOT NULL
) 

--Etudiant table
CREATE TABLE `etudiant` (
  `idetud` int(11) NOT NULL,
  `apogee` int(11) NOT NULL,
  `doc` longblob NOT NULL,
  `idclient` int(11) NOT NULL
) 

--Paiement table
CREATE TABLE `paiement` (
  `idclip` int(11) NOT NULL,
  `idab` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(30) NOT NULL,
  `idab_abonnement` int(11) NOT NULL
) 

--Abonnement table
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`idab`),
  ADD UNIQUE KEY `abonnement_client0_AK` (`idclient`);

--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idclient`),
  ADD UNIQUE KEY `client_compte0_AK` (`idcpt`),
  ADD UNIQUE KEY `client_abonnement1_AK` (`idab`),
  ADD UNIQUE KEY `client_etudiant2_AK` (`idetud`);

--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`idcpt`),
  ADD UNIQUE KEY `compte_client0_AK` (`idclient`);

--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`idetud`),
  ADD UNIQUE KEY `etudiant_client0_AK` (`idclient`);

--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`idclip`),
  ADD KEY `paiement_abonnement0_FK` (`idab_abonnement`);

--
ALTER TABLE `abonnement`
  MODIFY `idab` int(11) NOT NULL AUTO_INCREMENT;

--
ALTER TABLE `client`
  MODIFY `idclient` int(11) NOT NULL AUTO_INCREMENT;

--
ALTER TABLE `compte`
  MODIFY `idcpt` int(11) NOT NULL AUTO_INCREMENT;

--
ALTER TABLE `paiement`
  MODIFY `idclip` int(11) NOT NULL AUTO_INCREMENT;

--
ALTER TABLE `abonnement`
  ADD CONSTRAINT `abonnement_client0_FK` FOREIGN KEY (`idclient`) REFERENCES `client` (`idclient`);

--
ALTER TABLE `client`
  ADD CONSTRAINT `client_abonnement1_FK` FOREIGN KEY (`idab`) REFERENCES `abonnement` (`idab`),
  ADD CONSTRAINT `client_compte0_FK` FOREIGN KEY (`idcpt`) REFERENCES `compte` (`idcpt`),
  ADD CONSTRAINT `client_etudiant2_FK` FOREIGN KEY (`idetud`) REFERENCES `etudiant` (`idetud`);

--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_client0_FK` FOREIGN KEY (`idclient`) REFERENCES `client` (`idclient`);

--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_client0_FK` FOREIGN KEY (`idclient`) REFERENCES `client` (`idclient`);

--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_abonnement0_FK` FOREIGN KEY (`idab_abonnement`) REFERENCES `abonnement` (`idab`);
COMMIT;
