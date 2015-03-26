CREATE TABLE users (
        id int(11) NOT NULL AUTO_INCREMENT,
        username varchar(128) NOT NULL,
        pwd varchar(128) NOT NULL,
        PRIMARY KEY (id),
);

INSERT users (username,pwd) VALUES('tomi', 'haukionkala');