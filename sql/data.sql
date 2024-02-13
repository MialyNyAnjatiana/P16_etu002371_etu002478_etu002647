CREATE DATABASE db_P16_etu002371_etu002478_etu002647;
USE db_P16_etu002371_etu002478_etu002647;

CREATE TABLE productionThé_genre (
    id_genre INT PRIMARY KEY AUTO_INCREMENT,
    desc_genre VARCHAR(20) NOT NULL
);

CREATE TABLE productionThé_utilisateur (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    nom_user VARCHAR(20) NOT NULL,
    id_genre INT NOT NULL,
    mdp VARCHAR(20) NOT NULL,
    date_naissance DATE NOT NULL
);
ALTER TABLE productionThé_utilisateur ADD CONSTRAINT fk_genre Foreign Key (id_genre) REFERENCES productionThé_genre(id_genre);

CREATE TABLE productionThé_page_admin (
    id_admin INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL
);
ALTER TABLE productionThé_page_admin ADD CONSTRAINT fk_user Foreign Key (id_user) REFERENCES productionThé_utilisateur(id_user);

CREATE TABLE productionThé_variete_tea (
    id_var INT PRIMARY KEY AUTO_INCREMENT,
    nom_tea VARCHAR(20) NOT NULL,
    occupation INT NOT NULL,
    rendement DECIMAL(10.2) NOT NULL,
    prix_vente DECIMAL(10.2) NOT NULL
);

CREATE TABLE productionThé_parcelle (
    id_parcelle INT PRIMARY KEY AUTO_INCREMENT,
    id_var INT NOT NULL,
    surface DECIMAL(10.2) NOT NULL,
    restant INT NOT NULL
);
ALTER TABLE productionThé_parcelle ADD CONSTRAINT fk_var Foreign Key (id_var) REFERENCES productionThé_variete_tea(id_var);

CREATE TABLE productionThé_ctg_depense (
    id_ctg INT PRIMARY KEY AUTO_INCREMENT,
    ctg VARCHAR(20) NOT NULL
);

CREATE TABLE productionThé_depense (
    id_depense INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL,
    id_ctg INT NOT NULL,
    date_depense DATE NOT NULL,
    montant DECIMAL NOT NULL
);
ALTER TABLE productionThé_depense ADD CONSTRAINT fk_ctg Foreign Key (id_ctg) REFERENCES productionThé_ctg_depense(id_ctg);
ALTER TABLE productionThé_depense ADD CONSTRAINT fk_dep_user Foreign Key (id_user) REFERENCES productionThé_utilisateur(id_user);

CREATE TABLE productionThé_cueilleur (
    id_cueilleur INT PRIMARY KEY AUTO_INCREMENT,
    nom_cueilleur VARCHAR(20) NOT NULL,
    dtn_c DATE NOT NULL,
    id_genre INT NOT NULL,
    salaire DECIMAL(10.2) NOT NULL
);
ALTER TABLE productionThé_cueilleur ADD CONSTRAINT fk_genre_c Foreign Key (id_genre) REFERENCES productionThé_genre(id_genre);


CREATE TABLE productionThé_cueillette (
    id_cueillette INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL,
    id_cueilleur INT NOT NULL,
    id_parcelle INT NOT NULL,
    date_c DATE NOT NULL,
    poid INT NOT NULL
);
ALTER TABLE productionThé_cueillette ADD CONSTRAINT fk_user_c Foreign Key (id_user) REFERENCES productionThé_utilisateur(id_user);
ALTER TABLE productionThé_cueillette ADD CONSTRAINT fk_cueilleur Foreign Key (id_cueilleur) REFERENCES cueilleur(id_cueilleur);
ALTER TABLE productionThé_cueillette ADD CONSTRAINT fk_parcelle Foreign Key (id_parcelle) REFERENCES parcelle(id_parcelle);

CREATE VIEW v_depense_user AS
SELECT d.id_depense, d.id_user, u.nom_user, c.ctg, d.date_depense, d.montant
FROM productionThé_depense d
JOIN productionThé_ctg_depense c ON d.id_ctg = c.id_ctg
JOIN productionThé_utilisateur u ON d.id_user = u.id_user;

INSERT INTO productionThé_genre VALUES
    (1, 'male'),
    (2, 'female');

INSERT INTO productionThé_utilisateur VALUES
    (null, 'Rakoto', 1, 'motdepasse', '1999-02-28'),
    (null, 'Ranto', 1, 'biased', '2002-07-06'),
    (null, 'Andria', 2, 'p@ss', '1997-10-01');

INSERT INTO productionThé_page_admin VALUES (null, 3);

INSERT INTO productionThé_cueilleur VALUES
    (null, 'Jean Dupont', '1999-04-25', 1, 20000),
    (null, 'Marie Durand', '1999-12-07', 1, 15000),
    (null, 'Pierre Lefevre', '1999-01-17', 1, 15250);

INSERT INTO productionThé_variete_tea (nom_tea, occupation, rendement, prix_vente) VALUES
    ('Green Tea',  5,  0.75, 15000),
    ('Black Tea',  3,  0.85, 7500),
    ('White Tea',  2,  0.60, 12000),
    ('Herbal Tea',  4,  0.50, 8500);

INSERT INTO productionThé_ctg_depense VALUES
    (1, "Engrais"),
    (2, "Carburant"),
    (3, "Logistique");

INSERT INTO productionThé_parcelle (id_var, surface) VALUES
    (1,  5.00),
    (2,  3.50),
    (3,  2.25),
    (4,  1.75);

INSERT INTO productionThé_depense VALUES
    (null, 1, 1, '2024-01-12', 25000),
    (null, 1, 2, '2023-12-10', 15000),
    (null, 2, 2, '2024-01-14', 25000),
    (null, 2, 2, '2024-01-17', 20000);