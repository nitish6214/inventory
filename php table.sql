create database inventory;
use inventory;

create table provider
(
  id  varchar(10),
  nm  varchar(40),
  address  varchar(40)
);
 
create table order1
(
  id  varchar(10),
  date1  varchar(70)
);

create table orderdetail
(
  id  varchar(10),
  qty  int(8),
  adate varchar(70),
  rdate varchar(70)
);

create table transfer
(
  id  varchar(10),
  qty  int(8),
  sdate varchar(70),
  rdate varchar(70)
);

create table product
(
  id  varchar(10),
  barcode  varchar(10),
  name varchar(60),
  desc1 varchar(60),
  category varchar(60),
  qty  int(8),
  weight varchar(10),
  refrigerated varchar(10)
);

create table customer
(
  id  varchar(10),
  nm  varchar(40),
  address  varchar(60)
);

create table delivery
(
  id  varchar(10),
 status  varchar(40)
);

create table inventory
(
  id  varchar(10),
  qtyavail  int(10),
  minstock int(10),
  maxstock int(10)
);

create table deliverydetail
(
  id  varchar(10),
  qty  int(8),
  expdate varchar(10),
  actdate varchar(10)
);

create table warehouse
(
  id  varchar(10),
  nm  varchar(40),
  isrefrigerated  varchar(40)
);

create table location
(
  id  varchar(10),
  nm  varchar(40),
  address  varchar(60)
);


create table login
(
  id  varchar(10),
  pwd  varchar(10),
  counter  int
);

insert into login values('get','project',4);
 

create table Contact
(
  Name  varchar(10),
  Phonenumber  int(15),
  Email varchar(40),
  Message varchar(60)
);
ALTER TABLE Contact MODIFY phonenumber VARCHAR(15);


