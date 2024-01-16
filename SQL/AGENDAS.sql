create table AGENDAS (
	id serial not null primary key,
	data date not null,
	hora time not null,
	situacao varchar(10) not null,
	data_situacao date not null,
	observacoes varchar(200)
);