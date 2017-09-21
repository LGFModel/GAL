/*
* @Author: 记住你姓李
* @Date:   2017-07-26 08:45:48
* @Last Modified by:   记住你姓李
* @Last Modified time: 2017-07-31 11:00:10
*/

set names gbk;
create table dining(
	`id` int unsigned not null auto_increment primary key,
	`name` char(20) not null,
	`manager` char(5) not null
);

create table foods (
	`id` int unsigned not null auto_increment primary key,
	`name` char(20) not null,
	`price` smallint not null,
	`pid` int not null
)

create table message(
	`id` int unsigned not null auto_increment primary key,
	`num` smallint not null,
	`name` char(10) not null,
	`price` int not null,
	`data` datetime not null,
	`pid` smallint not null
	`username` varchar(5) not null,
)

create table user(
	`id` int unsigned not null auto_increment primary key, 
	`username` char(5) not null,
	`password` char(32) not null,
	`level` smallint(1) not null,
)