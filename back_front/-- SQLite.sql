-- SQLite
PRAGMA foreign_keys = ON;

DROP TABLE advertisements;
DROP TABLE compagnies;
DROP TABLE people;
DROP TABLE advertisements_applicants;


CREATE TABLE advertisements (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    title VARCHAR(150) NOT NULL,
    creation_date DATETIME NOT NULL,
    city VARCHAR(50) NOT NULL,
    contract_type VARCHAR(50) NOT NULL,
    salary VARCHAR(50) NOT NULL,
    short_description VARCHAR(150) NOT NULL, 
    comp_description TEXT NOT NULL,
    job_description TEXT NOT NULL,
    applicant_profil TEXT NOT NULL,
    benefits TEXT NOT NULL,
    compagny_id INTEGER NOT NULL, 
    FOREIGN KEY (compagny_id) REFERENCES compagnies (id) ON DELETE CASCADE
    
);

CREATE TABLE compagnies (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    comp_name VARCHAR(50) NOT NULL,
    adress TEXT
);



CREATE TABLE people (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    statut VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    account_password VARCHAR(50) NOT NULL, 
    compagny_id varchar(150) 
);


CREATE TABLE advertisements_applicants (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    post_message TEXT NOT NULL,
    date_message DATETIME NOT NULL,
    people_id INTEGER, 
    advertisement_id INTEGER,
    FOREIGN KEY (people_id) REFERENCES people (id),
    FOREIGN KEY (advertisement_id) REFERENCES advertisements (id)
);


INSERT INTO advertisements (
    title,
    creation_date,
    city,
    contract_type,
    salary,
    short_description,
    comp_description,
    job_description,
    applicant_profil,
    benefits,
    compagny_id
) VALUES(
    'Developpeur full stack - Lille(F/H)',
    1696931953,
    'Lille',
    'CDI',
    'Salaire : 44 000,00€ à 50 000,00€ par an',
    'Entreprise de référence, nous recherchons un developpeur full stack pour participer à nos nouveaux projets (applications, TA, ...) ',
    'Notre entreprise :
    Spécialiste dans la création de sites internet et applications depuis 1990, DEVIN recherche un developpeur full stack pour compléter notre équipe.',
    'Mission: 
    - Participer au développement des applications
    - Etre force de proposition sur le choix et la mise en oeuvre de solutions techniques
    - Participer à l’intégration de nouvelles technologies
    - Participer à l’élaboration de tests unitaires et fonctionnels
    - Participer à la maintenance.',
    'Profil recherché:
    Vous possédez une expérience de 3 à 5 ans dans le développement et particulièrement sur le développement fullstack.
    Vous aimez travailler en équipe
    Vous êtes curieux et tourné vers l’innovation.',
    'Avantages:
    - 37H30 du lundi au vendredi
    - Télétravail possible : jusqu’à 2 jours au choix par semaine
    - Prime de cooptation (500€)
    - Prime de participation (environ 1 mois et demi de salaire), Plan d’Epargne Entreprise
    - Mutuelle famille (44€/mois) et prévoyance
    - Carte titres restaurant : 9.20 €/jour (participation employeur : 5,52 €)
    - Crèche d’entreprise
    ',
    1
);

INSERT INTO advertisements (
    title,
    creation_date,
    city,
    contract_type,
    salary,
    short_description,
    comp_description,
    job_description,
    applicant_profil,
    benefits,
    compagny_id
) VALUES(
    'Electricien - Lille(F/H)',
    1696931953,
    'Lille',
    'CDD',
    'Salaire : 20 000',
    'courte description courte description courte description',
    'Notre entreprise :
    Présentation présentation, présentation.',
    'Mission: 
    -mission1.
    -mission2.
    -Mission3',
    'Profil recherché:
    profil recherché profil recherché profil recherché.',
    'Avantages:
    - avantage 1
    - avantage 2
    - Avantage 3
    ',
    2
);

INSERT INTO compagnies ( 
    comp_name, 
    adress
) VALUES (
    'DEVIN',
    '33 rue du château 59000 LILLE');

INSERT INTO compagnies ( 
    comp_name, 
    adress
) VALUES (
    'Electro service',
    '56 rue du rempart 59113 SECLIN');  
  

INSERT INTO people (
    statut,
    last_name,
    first_name,
    phone,
    email, 
    account_password  
) VALUES ( 
    'Admin',
    'Admin',
    'Admin',
    'Admin',
    'admin@exemple.com',
    'ADMINISTRATION'
);

INSERT INTO people (
    statut,
    last_name,
    first_name,
    phone,
    email, 
    account_password  
) VALUES ( 
    'candidat',
    'DUPONT',
    'Jean',
    '0684034565',
    'jean.dupont@example.com',
    'jean'
);

INSERT INTO people (
    statut,
    last_name,
    first_name,
    phone,
    email,
    account_password,
    compagny_id 
) VALUES ( 
    'employeur',
    'LEMAIRE',
    'George',
    '0686785654',
    'lemaire@example.com',
    'lemaire',
    1
);

INSERT INTO advertisements_applicants (
    post_message,
    date_message,
    people_id,
    advertisement_id
) VALUES (
    'Bonjour, 
    Ayant une expérience de 6 ans dans le développement full stack, je souhaiterais postuler à votre offre. 
    Ayant un esprit d’équipe et faisant preuve d’une bonne communication, je pense être le candidat idéal. 
    Cordialement, ',
    1696932361,
    1,
    1
);


