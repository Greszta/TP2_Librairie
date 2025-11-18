CREATE SCHEMA IF NOT EXISTS `librairie` DEFAULT CHARACTER SET utf8 ;
USE `librairie` ;
    
CREATE TABLE auteur (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    auteur VARCHAR(45) NOT NULL
    );
    
CREATE TABLE categorie (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    categorie VARCHAR(45) NOT NULL
    );
    
CREATE TABLE etat (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    etat VARCHAR(45) NOT NULL
    );
    
CREATE TABLE `livre` (
	`id` INT NOT NULL AUTO_INCREMENT,
    `titre` VARCHAR(100) NOT NULL,
    `annee` INT NOT NULL,
    `auteur_id` INT NOT NULL,
    `categorie_id` INT NOT NULL,
    `etat_id` INT NOT NULL,
    PRIMARY KEY(`id`),
    KEY `fk_auteur_id` (`auteur_id`),
    KEY `fk_categorie_id` (`categorie_id`),
    KEY `fk_etat_id` (`etat_id`),
    CONSTRAINT `fk_auteur_id` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`id`),
    CONSTRAINT `fk_categorie_id` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
    CONSTRAINT `fk_etat_id` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`)
    );
    
insert into auteur (auteur) Values ('Arthur Conan Doyle'), ('Jules Verne'), ('Agatha Christie'), ('Clive Staples Lewis'), ('Suzanne Collins');

insert into categorie (categorie) Values ('Aventure'), ('Policier'), ('Fantasy'), ('Documentaire');

insert into etat (etat) Values ('Neuf'), ('Comme neuf'), ('Bon état'), ('Correct'), ('Usé');

INSERT INTO `livre` (`titre`, `annee`, `auteur_id`, `categorie_id`, `etat_id`) VALUES ('Le tour du monde en 80 jours', '2000', '2', '1', '2');
    