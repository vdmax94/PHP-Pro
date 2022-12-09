#1. Видалення однієї з таблиць
DROP TABLE species;

#2. Модифікація поля таблиці (наприклад, поле типу datetime, стало date (або зміна імені поля) )
ALTER TABLE species
    MODIFY year SMALLINT NOT NULL;

#3. Заповнення кожної таблиці хоча б по 3-5 записів
INSERT INTO divisio (name) VALUES ('Proteobacteria');
INSERT classes (divisio_id, name) VALUES(1, 'Alphaproteobacteria');
INSERT ordines (divisio_id, class_id, name) VALUES(1,1, 'Rhizobiales');
INSERT familiae (divisio_id, class_id, ordo_id, name) VALUES(1,1,1, 'Bradyrhizobiaceae');
INSERT genera (divisio_id, class_id, ordo_id, familia_id, name) VALUES (1,1,1,1,'Bradyrhizobium');
INSERT species
    (divisio_id,
     class_id,
     ordo_id,
     familia_id,
     genus_id,
     name,
     scientist,
     year)
VALUES
    (1,
     1,
     1,
     1,
     1,
     'japonicum',
     'Kirchner',
     1896);

INSERT INTO divisio (name) VALUES ('Firmicutes');
INSERT classes (divisio_id, name) VALUES(2, 'Bacilli');
INSERT ordines (divisio_id, class_id, name) VALUES(2,2, 'Bacillales');
INSERT familiae (divisio_id, class_id, ordo_id, name) VALUES(2,2,2, 'Bacillaceae');
INSERT genera (divisio_id, class_id, ordo_id, familia_id, name) VALUES (2,2,2,2,'Bacillus');
INSERT species
    (divisio_id,
     class_id,
     ordo_id,
     familia_id,
     genus_id,
     name,
     scientist,
     year)
VALUES
    (2,
     2,
     2,
     2,
     2,
     'thuringiensis',
     'Berliner',
     1915
);

INSERT INTO divisio (name) VALUES ('Cyanobacteria');
INSERT classes (divisio_id, name) VALUES(3, 'Cyanophyceae');
INSERT ordines (divisio_id, class_id, name) VALUES(3,3, 'Nostocales');
INSERT familiae (divisio_id, class_id, ordo_id, name) VALUES(3,3,3, 'Nostocaceae');
INSERT genera (divisio_id, class_id, ordo_id, familia_id, name) VALUES (3,3,3,3,'Nostoc');
INSERT species
    (divisio_id,
     class_id,
     ordo_id,
     familia_id,
     genus_id,
     name,
     scientist,
     year)
VALUES
    (3,
     3,
     3,
     3,
     3,
     'thermotolerans',
     'Suradkar',
     2017
    );

INSERT INTO divisio (name) VALUES ('Actinomycetota');
INSERT classes (divisio_id, name) VALUES(4, 'Actinomycetia');
INSERT ordines (divisio_id, class_id, name) VALUES(4,4, 'Bifidobacteriales');
INSERT familiae (divisio_id, class_id, ordo_id, name) VALUES(4,4,4, 'Bifidobacteriaceae');
INSERT genera (divisio_id, class_id, ordo_id, familia_id, name) VALUES (4,4,4,4,'Bifidobacterium');
INSERT species
    (divisio_id,
    class_id,
    ordo_id,
    familia_id,
    genus_id,
    name,
    scientist,
    year)
VALUES
    (4,
     4,
     4,
     4,
     4,
     'bifidum',
     'Tissier',
     1900
    );

INSERT classes (divisio_id, name) VALUES(1, 'Gammaproteobacteria');
INSERT ordines (divisio_id, class_id, name) VALUES(1,5, 'Pseudomonadales');
INSERT familiae (divisio_id, class_id, ordo_id, name) VALUES(1,5,5, 'Pseudomonadaceae');
INSERT genera (divisio_id, class_id, ordo_id, familia_id, name) VALUES (1,5,5,5,'Pseudomonas');
INSERT species
    (divisio_id,
    class_id,
    ordo_id,
    familia_id,
    genus_id,
    name,
    scientist,
    year)
VALUES
    (1,
     5,
     5,
     5,
     5,
     'aeruginosa',
     'Schröter',
     1872
    );

#4. Модифікації будь-якого запису (наприклад, змінити серійний номер автопарку)
UPDATE bacteria.species as s SET s.year = 1872 WHERE s.id = 5;

#5. Видалення запису з таблиці
DELETE FROM species WHERE id=5;

#6. Ну і пару різних запитів до бази даних (маю на увазі SELECT)
SELECT * FROM species WHERE genus_id=3;
SELECT COUNT(*) as 'species_quantity' FROM species WHERE divisio_id=1;

#7. 1-2 приклади Join запиту
SELECT  d.name as divisio_name, c.name as class_name
    FROM classes c
        JOIN divisio d ON c.divisio_id=d.id
    WHERE c.divisio_id=1;

SELECT d.name as divisio_name,c.name as class_name,o.name as ordo_name, f.name as familia_name, g.name as genus_name, s.name spicies_name, s.scientist, s.year
    FROM species s
        JOIN genera g on s.genus_id = g.id
        JOIN familiae f on s.familia_id = f.id
        JOIN ordines o on s.ordo_id = o.id
        JOIN classes c on s.class_id = c.id
        JOIN divisio d on s.divisio_id = d.id
    WHERE s.id=6;

SELECT d.name as divisio_name,c.name as class_name,o.name as ordo_name, f.name as familia_name, g.name as genus_name, s.name spicies_name, s.scientist, s.year
FROM species s
         JOIN genera g on s.genus_id = g.id
         JOIN familiae f on s.familia_id = f.id
         JOIN ordines o on s.ordo_id = o.id
         JOIN classes c on s.class_id = c.id
         JOIN divisio d on s.divisio_id = d.id
WHERE d.id=1;

#8. Додати/змінити колонку за допомогою команди ALTER TABLE
ALTER TABLE species
    ADD synonymy VARCHAR(255)
        AFTER name;