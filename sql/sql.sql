CREATE DATABASE IF NOT EXISTS agendawrs;

USE agendawrs;

DROP TABLE IF EXISTS wr1;

CREATE TABLE wr1(
    id INT auto_increment PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    nick VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(60) NOT NULL,
    criadoEM TIMESTAMP DEFAULT CURRENT_TIMESTAMP()
) ENGINE = INNODB;

