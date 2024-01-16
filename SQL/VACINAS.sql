create table VACINAS (
	id serial not null primary key,
	titulo varchar(60) not null,
	descricao varchar(200),
	doses int,
	periodicidade int,
	intervalo int
);