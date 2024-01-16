create table USUARIOS (
	id serial not null primary key,
	nome varchar(60) not null,
	data_nascimento date not null,
	sexo varchar(1) not null,
	logradouro varchar(60),
	numero int,
	setor varchar(40),
	cidade varchar(40),
	uf varchar(2)
);