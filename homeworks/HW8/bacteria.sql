CREATE DATABASE bacteria;

CREATE TABLE divisio (
                         id INT PRIMARY KEY AUTO_INCREMENT,
                         name VARCHAR(150) NOT NULL
);

CREATE TABLE classes (
                         id INT PRIMARY KEY AUTO_INCREMENT,
                         divisio_id INT NOT NULL,
                         name VARCHAR(150),
                         FOREIGN KEY (divisio_id) REFERENCES divisio(id) ON DELETE NO ACTION
);

CREATE TABLE ordines (
                         id INT PRIMARY KEY AUTO_INCREMENT,
                         divisio_id INT NOT NULL,
                         class_id INT DEFAULT NULL,
                         name VARCHAR(150),

                         FOREIGN KEY (divisio_id) REFERENCES divisio(id) ON DELETE NO ACTION,
                         FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE SET NULL
);

CREATE TABLE familiae (
                          id INT PRIMARY KEY AUTO_INCREMENT,
                          divisio_id INT NOT NULL,
                          class_id INT DEFAULT NULL,
                          ordo_id INT DEFAULT NULL,
                          name VARCHAR(150),

                          FOREIGN KEY (divisio_id) REFERENCES divisio(id) ON DELETE NO ACTION,
                          FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE SET NULL,
                          FOREIGN KEY (ordo_id) REFERENCES ordines(id) ON DELETE SET NULL
);

CREATE TABLE genera (
                        id INT PRIMARY KEY AUTO_INCREMENT,
                        divisio_id INT NOT NULL,
                        class_id INT DEFAULT NULL,
                        ordo_id INT DEFAULT NULL,
                        familia_id INT DEFAULT NULL,
                        name VARCHAR(150) NOT NULL,

                        FOREIGN KEY (divisio_id) REFERENCES divisio(id) ON DELETE NO ACTION,
                        FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE SET NULL,
                        FOREIGN KEY (ordo_id) REFERENCES ordines(id) ON DELETE SET NULL,
                        FOREIGN KEY (familia_id) REFERENCES familiae(id) ON DELETE SET NULL
);

CREATE TABLE species (
                         id INT PRIMARY KEY AUTO_INCREMENT,
                         divisio_id INT NOT NULL,
                         class_id INT DEFAULT NULL,
                         ordo_id INT DEFAULT NULL,
                         familia_id INT DEFAULT NULL,
                         genus_id INT NOT NULL,
                         name VARCHAR(150) NOT NULL,
                         scientist VARCHAR(255) NOT NULL,
                         year YEAR NOT NULL,

                         FOREIGN KEY (divisio_id) REFERENCES divisio(id) ON DELETE NO ACTION,
                         FOREIGN KEY (class_id) REFERENCES classes(id) ON DELETE SET NULL,
                         FOREIGN KEY (ordo_id) REFERENCES ordines(id) ON DELETE SET NULL,
                         FOREIGN KEY (familia_id) REFERENCES familiae(id) ON DELETE SET NULL,
                         FOREIGN KEY (genus_id) REFERENCES genera(id) ON DELETE NO ACTION
);