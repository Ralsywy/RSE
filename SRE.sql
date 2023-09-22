-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour sre
CREATE DATABASE IF NOT EXISTS `sre` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sre`;

-- Listage de la structure de table sre. accompagnateur
CREATE TABLE IF NOT EXISTS `accompagnateur` (
  `id_accompagnateur` int NOT NULL AUTO_INCREMENT,
  `is_admin` int NOT NULL DEFAULT '0',
  `login` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `name_acc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pwd_acc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_accompagnateur`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table sre.accompagnateur : ~7 rows (environ)
REPLACE INTO `accompagnateur` (`id_accompagnateur`, `is_admin`, `login`, `name_acc`, `pwd_acc`) VALUES
	(1, 1, 'admin', 'Admin', 'Takefive5!'),
	(2, 0, 'mgarnier', 'GARNIER Marie', 'Marie'),
	(3, 0, 'jgainet', 'GAINET Jacques', 'France74!'),
	(4, 1, 'jlallemant', 'LALLEMANT Jean-Pierre', 'Takefive5!'),
	(5, 0, 'jmolherat', 'MOLHERAT Jean-Pierre', '2812'),
	(6, 0, 'jparratte', 'PARRATTE Jean-Marie', 'JMEMAT'),
	(7, 0, 'fsaintilan', 'SAINTILAN François', 'FSaintilan');

-- Listage de la structure de table sre. cap_emploi
CREATE TABLE IF NOT EXISTS `cap_emploi` (
  `id_cap_emploi` int NOT NULL AUTO_INCREMENT,
  `dte_inscription_cap` date DEFAULT NULL,
  `nom_referent_cap` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dte_realisation_cap` date DEFAULT NULL,
  `commentaire_cap` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cap_emploi`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table sre.cap_emploi : ~2 rows (environ)
REPLACE INTO `cap_emploi` (`id_cap_emploi`, `dte_inscription_cap`, `nom_referent_cap`, `dte_realisation_cap`, `commentaire_cap`) VALUES
	(143, NULL, NULL, '2023-06-20', ''),
	(144, NULL, NULL, '2023-06-20', ''),
	(145, NULL, NULL, '2023-06-20', '');

-- Listage de la structure de table sre. cma
CREATE TABLE IF NOT EXISTS `cma` (
  `id_cma` int NOT NULL AUTO_INCREMENT,
  `dte_inscription_cma` date DEFAULT NULL,
  `nom_referent_cma` varchar(50) DEFAULT NULL,
  `dte_realisation_cma` date DEFAULT NULL,
  `commentaire_cma` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cma`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table sre.cma : ~2 rows (environ)
REPLACE INTO `cma` (`id_cma`, `dte_inscription_cma`, `nom_referent_cma`, `dte_realisation_cma`, `commentaire_cma`) VALUES
	(143, NULL, NULL, '2023-06-20', ''),
	(144, NULL, NULL, '2023-06-20', ''),
	(145, NULL, NULL, '2023-06-20', '');

-- Listage de la structure de table sre. enfant
CREATE TABLE IF NOT EXISTS `enfant` (
  `id_enfant` int NOT NULL AUTO_INCREMENT,
  `dte_naissance_enfant` date DEFAULT NULL,
  `nom_enfant` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fk_id_inscrit_enfant` int DEFAULT NULL,
  PRIMARY KEY (`id_enfant`),
  KEY `fk_id_inscrit` (`fk_id_inscrit_enfant`) USING BTREE,
  CONSTRAINT `fk_id_inscrit_enfant` FOREIGN KEY (`fk_id_inscrit_enfant`) REFERENCES `inscrit` (`id_inscrit`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table sre.enfant : ~0 rows (environ)

-- Listage de la structure de table sre. files
CREATE TABLE IF NOT EXISTS `files` (
  `id_files` int NOT NULL AUTO_INCREMENT,
  `names` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `dte_travailler_cv` date DEFAULT NULL,
  PRIMARY KEY (`id_files`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table sre.files : ~2 rows (environ)
REPLACE INTO `files` (`id_files`, `names`, `file_url`, `dte_travailler_cv`) VALUES
	(143, NULL, NULL, '2023-06-20'),
	(144, NULL, NULL, '2023-06-20'),
	(145, NULL, NULL, '2023-06-20');

-- Listage de la structure de table sre. inscrit
CREATE TABLE IF NOT EXISTS `inscrit` (
  `id_inscrit` int NOT NULL AUTO_INCREMENT,
  `statut` int NOT NULL DEFAULT '0',
  `dte_contact` date DEFAULT NULL,
  `origine_contact` varchar(50) DEFAULT NULL,
  `inscrit_rdc` varchar(50) DEFAULT NULL,
  `civilite` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `dte_naissance` date DEFAULT NULL,
  `nationalite` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `code_postal` int DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `telephone` int DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `situation_perso` varchar(50) DEFAULT NULL,
  `enfant_charge` varchar(50) DEFAULT NULL,
  `nb_enfant` int DEFAULT NULL,
  `nature_revenus` varchar(50) DEFAULT NULL,
  `autre_revenus` varchar(50) DEFAULT NULL,
  `cv_oui_non` varchar(50) DEFAULT NULL,
  `inscrit_pole_emploi` varchar(50) DEFAULT NULL,
  `inscrit_mission_local` varchar(50) DEFAULT NULL,
  `inscrit_cap_emploi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `inscrit_soelis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `inscrit_cma` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `vehicule_dispo` varchar(50) DEFAULT NULL,
  `achat_prevu` varchar(50) DEFAULT NULL,
  `emploi_pre_occupe` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `permis_voiture` varchar(50) DEFAULT NULL,
  `reconversion` varchar(50) DEFAULT NULL,
  `form_pro` varchar(50) DEFAULT NULL,
  `form_type` varchar(50) DEFAULT NULL,
  `reprise` varchar(50) DEFAULT NULL,
  `form_prevue` varchar(50) DEFAULT NULL,
  `form_qual` varchar(50) DEFAULT NULL,
  `form_dipl` varchar(50) DEFAULT NULL,
  `metier_souhaite` varchar(50) DEFAULT NULL,
  `secteur_activite` varchar(50) DEFAULT NULL,
  `secteur_geo` varchar(50) DEFAULT NULL,
  `form_continue` varchar(50) DEFAULT NULL,
  `form_nom` varchar(50) DEFAULT NULL,
  `form_date` date DEFAULT NULL,
  `form_duree` varchar(50) DEFAULT NULL,
  `moment_journee` varchar(50) DEFAULT NULL,
  `cap_metier` varchar(50) DEFAULT NULL,
  `benevole_rdc` varchar(50) DEFAULT NULL,
  `nom_diplome` varchar(50) DEFAULT NULL,
  `nb_annee_scolarisation` int DEFAULT NULL,
  `niveau_diplome` varchar(50) DEFAULT NULL,
  `atelier_fr` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nom_etudes` varchar(50) DEFAULT NULL,
  `nom_diplome_autre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `info_comp` text,
  `bep_metier` varchar(50) DEFAULT NULL,
  `bac_metier` varchar(50) DEFAULT NULL,
  `bac2_metier` varchar(50) DEFAULT NULL,
  `licence_metier` varchar(50) DEFAULT NULL,
  `master_metier` varchar(50) DEFAULT NULL,
  `master2_metier` varchar(50) DEFAULT NULL,
  `date_vehicule` date DEFAULT NULL,
  `autre_langue` varchar(50) DEFAULT NULL,
  `if_autre` varchar(50) DEFAULT NULL,
  `dte_cloture` date DEFAULT NULL,
  `fk_id_accompagnateur` int DEFAULT NULL,
  `fk_id_rdc` int DEFAULT NULL,
  `fk_id_pole_emploi` int DEFAULT NULL,
  `fk_id_mission_locale` int DEFAULT NULL,
  `fk_id_cap_emploi` int DEFAULT NULL,
  `fk_id_soelis` int DEFAULT NULL,
  `fk_id_cma` int DEFAULT NULL,
  `fk_id_langue_francaise` int DEFAULT NULL,
  `fk_id_files` int DEFAULT NULL,
  `fk_id_resultat` int DEFAULT NULL,
  `fk_id_langue_anglaise` int DEFAULT NULL,
  PRIMARY KEY (`id_inscrit`),
  KEY `fk_id_accompagnateur` (`fk_id_accompagnateur`),
  KEY `fk_id_rdc` (`fk_id_rdc`),
  KEY `fk_id_pole_emploi` (`fk_id_pole_emploi`),
  KEY `fk_id_mission_locale` (`fk_id_mission_locale`),
  KEY `fk_id_cap_emploi` (`fk_id_cap_emploi`),
  KEY `fk_id_langue_francaise` (`fk_id_langue_francaise`),
  KEY `fk_id_soelis` (`fk_id_soelis`),
  KEY `fk_id_cma` (`fk_id_cma`),
  KEY `fk_id_files` (`fk_id_files`),
  KEY `fk_id_resultat` (`fk_id_resultat`),
  KEY `fk_id_langue_anglaise` (`fk_id_langue_anglaise`),
  CONSTRAINT `fk_id_accompagnateur` FOREIGN KEY (`fk_id_accompagnateur`) REFERENCES `accompagnateur` (`id_accompagnateur`),
  CONSTRAINT `fk_id_cap_emploi` FOREIGN KEY (`fk_id_cap_emploi`) REFERENCES `cap_emploi` (`id_cap_emploi`),
  CONSTRAINT `fk_id_cma` FOREIGN KEY (`fk_id_cma`) REFERENCES `cma` (`id_cma`),
  CONSTRAINT `fk_id_files` FOREIGN KEY (`fk_id_files`) REFERENCES `files` (`id_files`),
  CONSTRAINT `fk_id_langue_anglaise` FOREIGN KEY (`fk_id_langue_anglaise`) REFERENCES `langue_anglaise` (`id_langue_anglaise`),
  CONSTRAINT `fk_id_langue_francaise` FOREIGN KEY (`fk_id_langue_francaise`) REFERENCES `langue_francaise` (`id_langue_francaise`),
  CONSTRAINT `fk_id_mission_locale` FOREIGN KEY (`fk_id_mission_locale`) REFERENCES `mission_locale` (`id_mission_locale`),
  CONSTRAINT `fk_id_pole_emploi` FOREIGN KEY (`fk_id_pole_emploi`) REFERENCES `pole_emploi` (`id_pole_emploi`),
  CONSTRAINT `fk_id_rdc` FOREIGN KEY (`fk_id_rdc`) REFERENCES `rdc` (`id_rdc`),
  CONSTRAINT `fk_id_resultat` FOREIGN KEY (`fk_id_resultat`) REFERENCES `resultat` (`id_resultat`),
  CONSTRAINT `fk_id_soelis` FOREIGN KEY (`fk_id_soelis`) REFERENCES `soelis` (`id_soelis`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table sre.inscrit : ~2 rows (environ)
REPLACE INTO `inscrit` (`id_inscrit`, `statut`, `dte_contact`, `origine_contact`, `inscrit_rdc`, `civilite`, `nom`, `prenom`, `dte_naissance`, `nationalite`, `adresse`, `code_postal`, `ville`, `telephone`, `email`, `situation_perso`, `enfant_charge`, `nb_enfant`, `nature_revenus`, `autre_revenus`, `cv_oui_non`, `inscrit_pole_emploi`, `inscrit_mission_local`, `inscrit_cap_emploi`, `inscrit_soelis`, `inscrit_cma`, `vehicule_dispo`, `achat_prevu`, `emploi_pre_occupe`, `permis_voiture`, `reconversion`, `form_pro`, `form_type`, `reprise`, `form_prevue`, `form_qual`, `form_dipl`, `metier_souhaite`, `secteur_activite`, `secteur_geo`, `form_continue`, `form_nom`, `form_date`, `form_duree`, `moment_journee`, `cap_metier`, `benevole_rdc`, `nom_diplome`, `nb_annee_scolarisation`, `niveau_diplome`, `atelier_fr`, `nom_etudes`, `nom_diplome_autre`, `info_comp`, `bep_metier`, `bac_metier`, `bac2_metier`, `licence_metier`, `master_metier`, `master2_metier`, `date_vehicule`, `autre_langue`, `if_autre`, `dte_cloture`, `fk_id_accompagnateur`, `fk_id_rdc`, `fk_id_pole_emploi`, `fk_id_mission_locale`, `fk_id_cap_emploi`, `fk_id_soelis`, `fk_id_cma`, `fk_id_langue_francaise`, `fk_id_files`, `fk_id_resultat`, `fk_id_langue_anglaise`) VALUES
	(143, 0, '2023-06-20', 'test', 'non', 'Madame', 'TEST', 'Test', '2023-06-20', 'afghanistan', 'test', 39100, 'Authume', 54654864, 'jdfs@outlook.fr', 'celibataire', 'non', NULL, 'salaire', NULL, 'non', 'non', 'non', 'non', 'non', 'non', 'oui', 'non', 'test', 'motos1', 'non', 'non', NULL, 'non', NULL, NULL, NULL, 'test', 'test', 'test', NULL, NULL, NULL, NULL, '5x8', NULL, 'non', 'brevet', NULL, NULL, 'non', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'non', NULL, 2, 143, 143, 143, 143, 143, 143, 143, 143, 143, 143),
	(144, 0, '2023-06-20', 'test', 'non', 'Madame', 'TEST2', 'Test2', '2023-06-20', 'afghanistan', 'test', 39100, 'Authume', 54654864, 'jdfs@outlook.fr', 'celibataire', 'non', NULL, 'salaire', NULL, 'non', 'non', 'non', 'non', 'non', 'non', 'oui', 'non', 'test', 'motos1', 'non', 'non', NULL, 'non', NULL, NULL, NULL, 'test', 'test', 'test', NULL, NULL, NULL, NULL, '5x8', NULL, 'non', 'brevet', NULL, NULL, 'non', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'non', NULL, 2, 144, 144, 144, 144, 144, 144, 144, 144, 144, 144),
	(145, 0, '2023-06-20', 'resto', 'non', 'Madame', 'TEST', 'Josephine', '2003-05-17', 'armenie', 'route de crissey', 39100, 'Authume', 8765431, 'fdghhgf@outlook.fr', 'celibataire', 'non', NULL, 'aucun', NULL, 'non', 'non', 'non', 'non', 'non', 'non', 'non', 'non', 'Vendeuse supermarché', 'aucun', 'non', 'oui', 'diplomante', 'non', NULL, NULL, 'CAP Vendeuse', 'Vendeuse magasin,parfumerie, vetement, Coiffeuse', 'Commerce', 'Dole', NULL, NULL, NULL, NULL, 'jour', NULL, 'non', 'bac', NULL, NULL, 'non', NULL, NULL, '', NULL, 'General', NULL, NULL, NULL, NULL, NULL, 'Anglais, Russe, Allemand, Armenien', 'oui', NULL, 3, 145, 145, 145, 145, 145, 145, 145, 145, 145, 145);

-- Listage de la structure de table sre. langue_anglaise
CREATE TABLE IF NOT EXISTS `langue_anglaise` (
  `id_langue_anglaise` int NOT NULL AUTO_INCREMENT,
  `langue_en_parlee` varchar(50) DEFAULT NULL,
  `langue_en_ecrite` varchar(50) DEFAULT NULL,
  `langue_en_lue` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_langue_anglaise`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table sre.langue_anglaise : ~2 rows (environ)
REPLACE INTO `langue_anglaise` (`id_langue_anglaise`, `langue_en_parlee`, `langue_en_ecrite`, `langue_en_lue`) VALUES
	(143, 'A1', 'C1', 'B1'),
	(144, 'A1', 'C1', 'B1'),
	(145, 'B2', 'B1', 'B2');

-- Listage de la structure de table sre. langue_francaise
CREATE TABLE IF NOT EXISTS `langue_francaise` (
  `id_langue_francaise` int NOT NULL AUTO_INCREMENT,
  `langue_fr_parlee` varchar(50) DEFAULT NULL,
  `langue_fr_lue` varchar(50) DEFAULT NULL,
  `langue_fr_ecrite` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_langue_francaise`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table sre.langue_francaise : ~2 rows (environ)
REPLACE INTO `langue_francaise` (`id_langue_francaise`, `langue_fr_parlee`, `langue_fr_lue`, `langue_fr_ecrite`) VALUES
	(143, 'A2', 'B1', 'A1'),
	(144, 'A2', 'B1', 'A1'),
	(145, 'B2', 'B2', 'B1');

-- Listage de la structure de table sre. mission_locale
CREATE TABLE IF NOT EXISTS `mission_locale` (
  `id_mission_locale` int NOT NULL AUTO_INCREMENT,
  `dte_inscription_mission` date DEFAULT NULL,
  `nom_referent_mission` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dte_realisation_mission` date DEFAULT NULL,
  `commentaire_mission` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_mission_locale`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table sre.mission_locale : ~2 rows (environ)
REPLACE INTO `mission_locale` (`id_mission_locale`, `dte_inscription_mission`, `nom_referent_mission`, `dte_realisation_mission`, `commentaire_mission`) VALUES
	(143, NULL, NULL, '2023-06-20', ''),
	(144, NULL, NULL, '2023-06-20', ''),
	(145, NULL, NULL, '2023-06-20', '');

-- Listage de la structure de table sre. permis_conduire
CREATE TABLE IF NOT EXISTS `permis_conduire` (
  `id_permis_conduire` int NOT NULL AUTO_INCREMENT,
  `moto` varchar(50) DEFAULT NULL,
  `auto` varchar(50) DEFAULT NULL,
  `transport` varchar(50) DEFAULT NULL,
  `autre_permis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `fk_id_inscrit_permis` int DEFAULT NULL,
  PRIMARY KEY (`id_permis_conduire`),
  KEY `fk_id_inscrit_permis` (`fk_id_inscrit_permis`),
  CONSTRAINT `fk_id_inscrit_permis` FOREIGN KEY (`fk_id_inscrit_permis`) REFERENCES `inscrit` (`id_inscrit`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table sre.permis_conduire : ~2 rows (environ)
REPLACE INTO `permis_conduire` (`id_permis_conduire`, `moto`, `auto`, `transport`, `autre_permis`, `fk_id_inscrit_permis`) VALUES
	(30, 'a', NULL, NULL, 'test', 143),
	(31, 'a', NULL, NULL, 'test', 144),
	(32, NULL, NULL, NULL, NULL, 145);

-- Listage de la structure de table sre. plan_action
CREATE TABLE IF NOT EXISTS `plan_action` (
  `id_plan_action` int NOT NULL AUTO_INCREMENT,
  `action_menee` text,
  `objectif` text,
  `moyen_oeuvre` text,
  `echeance` date DEFAULT NULL,
  `fk_id_inscrit_plan` int DEFAULT NULL,
  PRIMARY KEY (`id_plan_action`),
  KEY `fk_id_inscrit_plan` (`fk_id_inscrit_plan`),
  CONSTRAINT `fk_id_inscrit_plan` FOREIGN KEY (`fk_id_inscrit_plan`) REFERENCES `inscrit` (`id_inscrit`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table sre.plan_action : ~0 rows (environ)

-- Listage de la structure de table sre. pole_emploi
CREATE TABLE IF NOT EXISTS `pole_emploi` (
  `id_pole_emploi` int NOT NULL AUTO_INCREMENT,
  `dte_inscription` date DEFAULT NULL,
  `nom_referent` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dte_realisation_pole` date DEFAULT NULL,
  `commentaire_pole` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pole_emploi`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table sre.pole_emploi : ~2 rows (environ)
REPLACE INTO `pole_emploi` (`id_pole_emploi`, `dte_inscription`, `nom_referent`, `dte_realisation_pole`, `commentaire_pole`) VALUES
	(143, NULL, NULL, '2023-06-20', 'dfsdfsdf'),
	(144, NULL, NULL, '2023-06-20', 'dfsdfsdf'),
	(145, NULL, NULL, '2023-06-20', '');

-- Listage de la structure de table sre. rdc
CREATE TABLE IF NOT EXISTS `rdc` (
  `id_rdc` int NOT NULL AUTO_INCREMENT,
  `numero` bigint DEFAULT NULL,
  `centre` varchar(50) DEFAULT NULL,
  `commentaire_inscrit` varchar(50) DEFAULT NULL,
  `jour` varchar(50) DEFAULT NULL,
  `dte_realisation_rdc` date DEFAULT NULL,
  PRIMARY KEY (`id_rdc`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table sre.rdc : ~2 rows (environ)
REPLACE INTO `rdc` (`id_rdc`, `numero`, `centre`, `commentaire_inscrit`, `jour`, `dte_realisation_rdc`) VALUES
	(143, NULL, NULL, '', NULL, '2023-06-20'),
	(144, NULL, NULL, '', NULL, '2023-06-20'),
	(145, NULL, NULL, '', NULL, '2023-06-20');

-- Listage de la structure de table sre. rdv
CREATE TABLE IF NOT EXISTS `rdv` (
  `id_rdv` int NOT NULL AUTO_INCREMENT,
  `context` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `rdv` date DEFAULT NULL,
  `fk_id_inscrit_rdv` int DEFAULT NULL,
  PRIMARY KEY (`id_rdv`) USING BTREE,
  KEY `fk_id_inscrit_plan` (`fk_id_inscrit_rdv`) USING BTREE,
  CONSTRAINT `fk_id_inscrit_rdv` FOREIGN KEY (`fk_id_inscrit_rdv`) REFERENCES `inscrit` (`id_inscrit`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table sre.rdv : ~0 rows (environ)

-- Listage de la structure de table sre. resultat
CREATE TABLE IF NOT EXISTS `resultat` (
  `id_resultat` int NOT NULL AUTO_INCREMENT,
  `poste_occupe` varchar(50) DEFAULT NULL,
  `poste_occupe_cdd` varchar(50) DEFAULT NULL,
  `duree_hebdo_cdd` varchar(50) DEFAULT NULL,
  `nom_societe_cdd` varchar(50) DEFAULT NULL,
  `emploi_aide_cdd` varchar(50) DEFAULT NULL,
  `type_form_after` varchar(50) DEFAULT NULL,
  `nom_form_qual` varchar(50) DEFAULT NULL,
  `nom_form_dipl` varchar(50) DEFAULT NULL,
  `nom_stage` varchar(50) DEFAULT NULL,
  `duree_stage` varchar(50) DEFAULT NULL,
  `nom_org_stage` varchar(50) DEFAULT NULL,
  `abandon` text,
  `non_retour` text,
  `autre` text,
  `duree_form_dipl` varchar(50) DEFAULT NULL,
  `duree_form_qual` varchar(50) DEFAULT NULL,
  `duree_hebdo` varchar(50) DEFAULT NULL,
  `nom_societe` varchar(50) DEFAULT NULL,
  `emploi_aide` varchar(50) DEFAULT NULL,
  `type_formation` varchar(50) DEFAULT NULL,
  `explication` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_resultat`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table sre.resultat : ~2 rows (environ)
REPLACE INTO `resultat` (`id_resultat`, `poste_occupe`, `poste_occupe_cdd`, `duree_hebdo_cdd`, `nom_societe_cdd`, `emploi_aide_cdd`, `type_form_after`, `nom_form_qual`, `nom_form_dipl`, `nom_stage`, `duree_stage`, `nom_org_stage`, `abandon`, `non_retour`, `autre`, `duree_form_dipl`, `duree_form_qual`, `duree_hebdo`, `nom_societe`, `emploi_aide`, `type_formation`, `explication`) VALUES
	(143, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(144, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(145, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', 'test', 'oui', 'cdi', NULL);

-- Listage de la structure de table sre. soelis
CREATE TABLE IF NOT EXISTS `soelis` (
  `id_soelis` int NOT NULL AUTO_INCREMENT,
  `dte_inscription_soelis` date DEFAULT NULL,
  `nom_referent_soelis` varchar(50) DEFAULT NULL,
  `dte_realisation_soelis` date DEFAULT NULL,
  `commentaire_soelis` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_soelis`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table sre.soelis : ~2 rows (environ)
REPLACE INTO `soelis` (`id_soelis`, `dte_inscription_soelis`, `nom_referent_soelis`, `dte_realisation_soelis`, `commentaire_soelis`) VALUES
	(143, NULL, NULL, '2023-06-20', ''),
	(144, NULL, NULL, '2023-06-20', ''),
	(145, NULL, NULL, '2023-06-20', '');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
