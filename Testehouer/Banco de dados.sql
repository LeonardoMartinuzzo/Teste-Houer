create database Testehouer;

use TesteHouer;

create table Candidatos(
id_nome int auto_increment not null primary key,
nome varchar(50),
sobrenome varchar(50),
email varchar(50),
telefone varchar(50),
sexo varchar(25),
senha varchar(200));

create table Vagas(
id_vaga int auto_increment not null primary key,
titulo varchar (50),
empresa varchar(50),
descricao text null,
status_vaga int not null,
tipo varchar (25));

create table Tipos_usuários(
id_usuário int auto_increment not null primary key,
descricao varchar(45));

INSERT INTO vagas (titulo, empresa, descricao, status_vaga, tipo) 
VALUES ('Analista de teste', 'Houer', 'testar códigos e realizar automações de testes', 'Em andamento', 'Vagas para CLT & PCD');

