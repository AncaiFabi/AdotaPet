CREATE DATABASE IF NOT EXISTS adotapet;
USE adotapet;

CREATE TABLE IF NOT EXISTS animais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    nome VARCHAR(30) NOT NULL,
    raca VARCHAR(30),
    sexo ENUM('M', 'F') NOT NULL,
    descricao TEXT,
    idade INT,
    categoria_id INT,
    adotado BOOLEAN DEFAULT 0,
    imagem VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_nascimento DATE,
    cpf VARCHAR(14)
);

CREATE TABLE IF NOT EXISTS categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL
);

INSERT INTO categoria (nome) VALUES
('Cachorro'),
('Gato');

INSERT INTO animais (nome, raca, sexo, descricao, idade, categoria_id)VALUES
('Rex', 'Pastor Alemão', 'M', 'Inteligente e protetor.', 5, 1),
('Mel', 'Golden Retriever', 'F', 'Muito amigável e dócil.', 3, 1),
('Tom', 'Persa', 'M', 'Preguiçoso e fofo.', 6, 2),
('Nina', 'Poodle', 'F', 'Adora brincar e correr.', 2, 1),
('Fred', 'Bulldog', 'M', 'Gosta de cochilar no sol.', 4, 1),
('Mimi', 'Angorá', 'F', 'Silenciosa e carinhosa.', 3, 2),
('Bob', 'Beagle', 'M', 'Curioso e farejador.', 2, 1),
('Lola', 'Vira-lata', 'F', 'Muito sociável com crianças.', 1, 1),
('Simba', 'Maine Coon', 'M', 'Grandão e tranquilo.', 5, 2),
('Teca', 'Chihuahua', 'F', 'Pequena e esperta.', 3, 1),
('Gigi', 'Vira-lata', 'F', 'Esperta e companheira.', 2, 2),
('Thor', 'Husky Siberiano', 'M', 'Adora clima frio e brincar na neve.', 4, 1),
('Fiona', 'Sphynx', 'F', 'Exótica e muito afetuosa.', 3, 2);