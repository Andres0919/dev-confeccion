/*
* Supportix Database
* @author Evilnapsis
*/
create database solicitud_marce;
use solicitud_marce; 
set sql_mode='';

create table plant (
	id int not null auto_increment primary key,
	name varchar(200),
	created_at datetime default CURRENT_TIMESTAMP,
	update_at datetime default CURRENT_TIMESTAMP
	);

insert into plant (name) value ("SABANETA");

create table request(
	id int not null auto_increment primary key,
	reason varchar(100),
	description text,
	nove varchar(100),
	canal int,
	term int,
	created_at datetime,
	asigned_at datetime,
	finished_at datetime,
	created_id varchar(50) not null,
	asigned_id varchar(50),
	status int not null default 1,
	plant_id int not null default 1,
	foreign key (plant_id) references plant(id)
);

create table comment (
	id int not null auto_increment primary key,
	description text,
	request_id int not null,
	foreign key (request_id) references request(id)
);

