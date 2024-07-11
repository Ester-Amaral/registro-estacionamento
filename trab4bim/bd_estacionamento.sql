CREATE DATABASE bd_estacionamento;
use bd_estacionamento;

CREATE TABLE tb_carro(
Placa varchar(12) NOT null,
Modelo varchar(50) NOT null,
Cor varchar(30) NOT null,
Marca varchar(30) NOT null,
CONSTRAINT pk_placa PRIMARY KEY(Placa)
);

CREATE TABLE tb_estadia(
Codigo SMALLINT AUTO_INCREMENT,
Placas varchar(12) NOT null,
Entrada DATETIME,
Saída DATETIME,
Total_pagar numeric,
Tarifa_fixa numeric DEFAULT (10),
Situação varchar(30) DEFAULT('Pendente'),
CONSTRAINT pk_codigo PRIMARY KEY(codigo)
);

CREATE TABLE tb_convenio(
CodConvenio varchar(50) NOT null,
Nome varchar(50),
Empresa varchar(50),
Total_pagar numeric,
CONSTRAINT pk_codConvenio PRIMARY KEY(CodConvenio)
);

CREATE TABLE tb_usuario(
Id INT AUTO_INCREMENT,
Nome varchar(50) NOT null,
Email varchar(50) NOT null,
Senha varchar(32) NOT null,
PRIMARY KEY(Id)
);

ALTER TABLE tb_estadia
ADD CONSTRAINT fk_placa FOREIGN KEY(Placas) REFERENCES tb_carro(Placa);

--  inserindo dados nas tabelas
INSERT INTO tb_convenio (CodConvenio, Nome, Empresa) VALUES ('SCE', 'Selo Convênio', 'Estapar');
INSERT INTO tb_convenio  (CodConvenio, Nome, Empresa) VALUES ('CMS', 'Convênio Multiselo', 'Multipak');
INSERT INTO tb_convenio  (CodConvenio, Nome, Empresa) VALUES ('QPK', 'Quickpark', 'Valet');
INSERT INTO tb_convenio  (CodConvenio, Nome, Empresa) VALUES ('SCC', 'Selo Convênio', 'Class Park');
INSERT INTO tb_convenio  (CodConvenio, Nome, Empresa) VALUES ('USP', 'Usepark', 'JundPark');

INSERT INTO tb_carro  (Placa, Modelo, Cor, Marca) VALUES ('YHU4E78', 'Celta','Prata', 'Chevrolet');
INSERT INTO tb_carro   (Placa, Modelo, Cor, Marca) VALUES ('FWQ6G92', 'Onix','Branco', 'Chevrolet');
INSERT INTO tb_carro   (Placa, Modelo, Cor, Marca) VALUES ('JKL3A65', 'Kwid Life 1.0','Cobre', 'Renault');
INSERT INTO tb_carro   (Placa, Modelo, Cor, Marca) VALUES ('XML5Z15', 'Mobi Easy 1.0','Preto', 'Fiat');
INSERT INTO tb_carro   (Placa, Modelo, Cor, Marca) VALUES ('EOP7T70', 'Honda Fit','Chumbo', 'Honda');

INSERT INTO tb_estadia (Placas, Entrada, Total_pagar) VALUES ('YHU4E78', '2021-11-30 8:00', null);
INSERT INTO tb_estadia (Placas, Entrada, Total_pagar) VALUES ('FWQ6G92', '2021-11-30 10:20', null);
INSERT INTO tb_estadia (Placas, Entrada, Total_pagar) VALUES ('JKL3A65', '2021-11-30 12:35', null);
INSERT INTO tb_estadia (Placas, Entrada, Total_pagar) VALUES ('XML5Z15', '2021-11-30 9:40',  null);
INSERT INTO tb_estadia (Placas, Entrada, Total_pagar) VALUES ('EOP7T70', '2021-11-30 13:05', null);

INSERT INTO tb_usuario (Nome, Email, Senha) VALUES ('Alandra', 'alandra@gmail.com', MD5('123'));
INSERT INTO tb_usuario (Nome, Email, Senha) VALUES ('Ester', 'ester@gmail.com', MD5('123'));
INSERT INTO tb_usuario (Nome, Email, Senha) VALUES ('Yasmin', 'yasmin@gmail.com', MD5('123'));


