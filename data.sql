-- CREATE DATABASE db_P16_etu002371_etu002478_etu002647;
-- USE db_P16_etu002371_etu002478_etu002647;

CREATE DATABASE db_exam;
USE db_exam;

CREATE TABLE genre (
    id_genre INT PRIMARY KEY AUTO_INCREMENT,
    desc_genre VARCHAR(20) NOT NULL
);

CREATE TABLE utilisateur (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    nom_user VARCHAR(20) NOT NULL,
    id_genre INT NOT NULL,
    mdp VARCHAR(20) NOT NULL,
    date_naissance DATE NOT NULL
);
ALTER TABLE utilisateur ADD CONSTRAINT fk_genre Foreign Key (id_genre) REFERENCES genre(id_genre);

CREATE TABLE page_admin (
    id_admin INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL
);
ALTER TABLE page_admin ADD CONSTRAINT fk_user Foreign Key (id_user) REFERENCES utilisateur(id_user);

CREATE TABLE variete_tea (
    id_var INT PRIMARY KEY AUTO_INCREMENT,
    nom_tea VARCHAR(20) NOT NULL,
    occupation INT NOT NULL,
    rendement DECIMAL(10.2) NOT NULL
);

CREATE TABLE parcelle (
    id_parcelle INT PRIMARY KEY AUTO_INCREMENT,
    id_var INT NOT NULL,
    surface DECIMAL(10.2) NOT NULL
);
ALTER TABLE parcelle ADD CONSTRAINT fk_var Foreign Key (id_var) REFERENCES variete_tea(id_var);

CREATE TABLE ctg_depense (
    id_ctg INT PRIMARY KEY AUTO_INCREMENT,
    ctg VARCHAR(20) NOT NULL
);

CREATE TABLE depense (
    id_depense INT PRIMARY KEY AUTO_INCREMENT,
    id_ctg INT NOT NULL,
    date_depense DATE NOT NULL,
    montant DECIMAL NOT NULL
);
ALTER TABLE depense ADD CONSTRAINT fk_ctg Foreign Key (id_ctg) REFERENCES ctg_depense(id_ctg);

CREATE TABLE cueilleur (
    id_cueilleur INT PRIMARY KEY AUTO_INCREMENT,
    nom_cueileur VARCHAR(20) NOT NULL,
    dtn_c DATE NOT NULL,
    id_genre INT NOT NULL,
    salaire DECIMAL(10.2) NOT NULL
);
ALTER TABLE cueilleur ADD CONSTRAINT fk_genre_c Foreign Key (id_genre) REFERENCES genre(id_genre);

CREATE TABLE cueillette (
    id_cueillette INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL,
    id_cueilleur INT NOT NULL,
    id_parcelle INT NOT NULL,
    date_c DATE NOT NULL,
    poid INT NOT NULL
);
ALTER TABLE cueillette ADD CONSTRAINT fk_user_c Foreign Key (id_user) REFERENCES utilisateur(id_user);
ALTER TABLE cueillette ADD CONSTRAINT fk_cueilleur Foreign Key (id_cueilleur) REFERENCES cueilleur(id_cueilleur);
ALTER TABLE cueillette ADD CONSTRAINT fk_parcelle Foreign Key (id_parcelle) REFERENCES parcelle(id_parcelle);

INSERT INTO genre VALUES (1, 'male');
INSERT INTO genre VALUES (2, 'female');

INSERT INTO utilisateur VALUES (null, 'Rakoto', 1, 'motdepasse', '1999-02-28');
INSERT INTO utilisateur VALUES (null, 'Ranto', 1, 'biased', '2002-07-06');
INSERT INTO utilisateur VALUES (null, 'Andria', 2, 'p@ss', '1997-10-01');

INSERT INTO page_admin VALUES (null, 3);
ALTER TABLE table_name AUTO_INCREMENT = value;