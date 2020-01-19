
use hotel; 


create table room(
number int not null primary key,
type varchar(25) not null default 'single' 'double' 'suite',
price double not null,
available bool not null


);
create table guest(
id int not null auto_increment primary key,
name varchar(100) not null , 
phone varchar(15),
pay varchar(50) ,
startdate date,
enddate date,
num int ,
FOREIGN KEY (num) REFERENCES room(number)

);
create table orders(
oid int auto_increment not null primary key,
ordername varchar(50) not null ,
price double not null,
gid int,
FOREIGN KEY (gid) REFERENCES guest(id)

);

create table admins(
id int auto_increment not null primary key,
name varchar(50) not null unique,
password varchar(50)
);

create table hall(
hallname varchar(50) not null,
gid int not null,
price  int not null,
reserveday date not null unique,
FOREIGN KEY (gid) REFERENCES guest(id)
);
create table travel(
travelname varchar(50) not null ,
place1 varchar(50) not null,
place2 varchar(50) not null,
place3 varchar(50) not null,
traveldate varchar(25) not null,
price int not null,
gid int not null,
FOREIGN KEY (gid) REFERENCES guest(id)

);
insert into room(number,type,price,available)values(123,'single',150,true);
insert into room(number,type,price,available)values(124,'single',150,true);
insert into room(number,type,price,available)values(125,'single',150,true);
insert into room(number,type,price,available)values(126,'single',150,true);
insert into room(number,type,price,available)values(127,'single',150,true);
insert into room(number,type,price,available)values(128,'single',150,true);
insert into room(number,type,price,available)values(129,'single',150,true);
insert into room(number,type,price,available)values(130,'single',150,true);
insert into room(number,type,price,available)values(131,'single',150,true);
insert into room(number,type,price,available)values(132,'single',150,true);
insert into room(number,type,price,available)values(133,'single',150,true);
insert into room(number,type,price,available)values(134,'single',150,true);

insert into room(number,type,price,available)values(223,'double',230,true);
insert into room(number,type,price,available)values(224,'double',230,true);
insert into room(number,type,price,available)values(225,'double',230,true);
insert into room(number,type,price,available)values(226,'double',230,true);
insert into room(number,type,price,available)values(227,'double',230,true);
insert into room(number,type,price,available)values(228,'double',230,true);
insert into room(number,type,price,available)values(229,'double',230,true);
insert into room(number,type,price,available)values(230,'double',230,true);
insert into room(number,type,price,available)values(231,'double',230,true);
insert into room(number,type,price,available)values(232,'double',230,true);
insert into room(number,type,price,available)values(233,'double',230,true);
insert into room(number,type,price,available)values(234,'double',230,true);

insert into room(number,type,price,available)values(310,'suite',300,true);
insert into room(number,type,price,available)values(311,'suite',300,true);
insert into room(number,type,price,available)values(312,'suite',300,true);
insert into room(number,type,price,available)values(313,'suite',300,true);
insert into room(number,type,price,available)values(314,'suite',300,true);
insert into room(number,type,price,available)values(315,'suite',300,true);
insert into room(number,type,price,available)values(316,'suite',300,true);
insert into room(number,type,price,available)values(317,'suite',300,true);
insert into room(number,type,price,available)values(318,'suite',300,true);
insert into room(number,type,price,available)values(319,'suite',300,true);
insert into room(number,type,price,available)values(320,'suite',300,true);
insert into room(number,type,price,available)values(321,'suite',300,true);

insert into admins(name,password) values('admin','admin');
insert into admins(name,password) values('asd','asd');