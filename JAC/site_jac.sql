CREATE DATABASE IF NOT EXISTS site_jac;
USE site_jac;

CREATE TABLE IF NOT EXISTS agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    servico VARCHAR(50) NOT NULL,
    data DATE NOT NULL
);

INSERT INTO agendamentos (nome, servico, data)
VALUES ('Sergio', 'Limpeza de Pele', '2025-12-25');
