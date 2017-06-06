drop database NBAVoteDB;

create database NBAVoteDB;

use NBAVoteDB;

create table NBAUserTB(
  username varchar(16) not null primary key,
  password varchar(40) not null,
  email    varchar(100) not null
);

create table NBAVoteTB(
  username   varchar(16) not null primary key,
  champteam  varchar(40) not null ,
  bestplayer varchar(40) not null
);

grant all privileges
on NBAVoteDB.*
to NBA@localhost 
identified by "NBA";



