drop table if exists funcionarios;
drop table if exists departamentos;

create table if not exists departamentos(
	id int not null auto_increment, 
	departamento varchar(60),
	PRIMARY KEY (id)
);

create table if not exists funcionarios(id int not null auto_increment, 
	nome varchar(120), 
	email varchar(120), 
	departamento_id int, 
	nascimento date, 
	PRIMARY KEY (id),
	FOREIGN KEY (departamento_id) REFERENCES departamentos(id)
);

insert ignore into departamentos(id, departamento) values
	(1, 'TI'),
	(2, 'Financeiro'),
	(3, 'Comercial')
;