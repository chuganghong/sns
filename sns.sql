#sns数据库
#2013/4/16 10:38
create database sns default character set utf8 collate utf8_general_ci;

use sns;

create table admin
(
	adminId int not null auto_increment primary key,
	adminName char(20) not null,
	adminPwd char(100) not null
);#管理员表

create table user
(
	userId int not null auto_increment primary key,
	userName char(20) not null,
	userPwd char(100) not null,
	userRegTime timestamp
);#注册用户表

create table post
(
	postId int not null auto_increment primary key,
	postTitle char(60) not null,#日志标题
	userId char(20) not null,       #作者
	postTime timestamp              #日志发表时间
);#日志表

create table postContent
(
	contentId int not null auto_increment primary key,
	postId int not null,   #日志标题的ID，2013年4月19日补充
	content mediumtext   #日志内容
);#日志内容表

create table mail
(
	mailId int not null auto_increment primary key,
	mailTitle char(60) not null,#信件标题
	senderId int not null,#发信者ID
	receiverId int not null,#收信者ID
	time timestamp,#发信时间
	mailContentID int not null   #信件内容ID
);# 信件表

create table mailContent
(
	contentId int not null auto_increment primary key,
	content mediumtext not null
);#信件内容表

create table friend
(
	friendId int not null auto_increment primary key,
	friendSrc int not null,#关注其他用户的用户ID
	friendDesc int not null #被其他用户关注的用户ID
);#好友关系表

grant select,insert,update,delete
on sns.*
to sns@localhost identified by 'password';

