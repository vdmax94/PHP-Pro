CREATE DATABASE bacteria;

CREATE TABLE divisio (
                         id INT PRIMARY KEY AUTO_INCREMENT,
                         name VARCHAR(150)
);

CREATE TABLE classes (
                         id INT PRIMARY KEY AUTO_INCREMENT,
                         divisio_id INT,
                         name VARCHAR(150),

                         FOREIGN KEY (divisio_id) REFERENCES divisio(id) ON DELETE SET NULL
);

CREATE TABLE ordines (
                         id INT PRIMARY KEY AUTO_INCREMENT,
                         class_id INT,
                         name VARCHAR(150),

                         FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE SET NULL
);

CREATE TABLE familiae (
                          id INT PRIMARY KEY AUTO_INCREMENT,
                          ordo_id INT,
                          name VARCHAR(150),

                          FOREIGN KEY (ordo_id) REFERENCES ordines(id) ON DELETE SET NULL
);

CREATE TABLE genera (
                        id INT PRIMARY KEY AUTO_INCREMENT,
                        familia_id INT,
                        name VARCHAR(150),

                        FOREIGN KEY (familia_id) REFERENCES familiae(id) ON DELETE SET NULL
);

CREATE TABLE species (
                         id INT PRIMARY KEY AUTO_INCREMENT,
                         divisio_id INT,
                         class_id INT,
                         ordo_id INT,
                         familia_id INT,
                         genus_id INT,
                         name VARCHAR(150),

                         FOREIGN KEY (divisio_id) REFERENCES divisio(id) ON DELETE SET NULL,
                         FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE SET NULL,
                         FOREIGN KEY (ordo_id) REFERENCES ordines(id) ON DELETE SET NULL,
                         FOREIGN KEY (familia_id) REFERENCES familiae(id) ON DELETE SET NULL,
                         FOREIGN KEY (genus_id) REFERENCES genera(id) ON DELETE SET NULL
);