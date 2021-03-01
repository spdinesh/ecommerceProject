use project;

create table login
(loginid int auto_increment not null,
username varchar(50), password varchar(50), 
primary key(loginid));

insert into login values(null, "admin", "123");