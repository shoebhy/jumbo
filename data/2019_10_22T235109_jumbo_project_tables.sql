CREATE TABLE category (
    category_id integer AUTO_INCREMENT NOT NULL,
    name text NOT NULL,
    PRIMARY KEY (category_id)
);

CREATE TABLE status (
    status_id integer AUTO_INCREMENT NOT NULL,
    name text NOT NULL,
    PRIMARY KEY (status_id)
);

INSERT INTO
    category (name) VALUES ('cat'), ('dog');

INSERT INTO
    status (name) VALUES ('available'), ('sold'), ('pending');

CREATE TABLE pet (
    pet_id integer AUTO_INCREMENT NOT NULL,
    name text NOT NULL,
    category_id integer NOT NULL,
    status_id integer NOT NULL,
    PRIMARY KEY (pet_id),
    FOREIGN KEY (category_id) REFERENCES category (category_id),
    FOREIGN KEY (status_id) REFERENCES status (status_id)
);