####数据库结构
**数据库名：match**
**team表**: 

|team\_id|team\_name|mark|
|:---:|:---:|:----:|
|int primary key auto_increment|varchar(50)|int|

**player表**:

|player\_id|team\_id|player|realname|
|:-----:|:------:|:------:|:------:|
|int primary key auto\_increment|int|varchar(50)|varchar(20),foreign key (team\_id) references team(team_id)|


**competing表**:

| competing\_id|session| inning|  player\_id1| player\_id2| player\_idwiner|score|is\_macth|
|:--------|:-----------|:-----------|:-------------|:-----------|:---------|:-----------|
|int primary key auto\_increment|varchar(32)|int|int|int|varchar(20),is_macth int default 0|


create database match;
use match;
create table team(team\_id int primary key auto\_increment,
team_name varchar(50),
mark int)
create table player(
   player\_id int primary key auto\_increment, 
   team_id int,
   player varchar(50),
   realname varchar(20),
   foreign key (team\_id) references team(team\_id)
   )
   
   create table competing( 
      competing\_id int primary key auto\_increment,
      session varchar(32),
      inning int,
      player_id1 int,
      player_id2 int,
      player_idwiner int,
      score varchar(20),
      is_macth int default 0
   )