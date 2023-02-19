create database locus;
DROP database locus;
/*Creation of tables*/
/*Tables without FK*/
use locus;
create table type_(id_Type bigint unsigned auto_increment primary key,
	TName varchar(100) not null);

create table classificaton(id_Classification bigint unsigned auto_increment primary key,
	CName varchar(100) not null);
    
create table publisher(id_publisher bigint unsigned auto_increment primary key,
	PName varchar(200) not null);
    
create table platform(id_platform bigint unsigned auto_increment primary key,
	PFName varchar(100) not null);
    
/*Tables with FK*/
use locus;
create table user_(id_user bigint unsigned auto_increment primary key,
	email varchar(100) not null,
    user_name varchar(50) not null,
    password_user varchar(50) not null,
    type_user bigint unsigned,
    foreign key (type_user) references type_(id_Type));
    
create table nicknames(id_nickname bigint unsigned auto_increment primary key,
	user_nickname bigint unsigned,
    platform_nickname bigint unsigned,
    nickname varchar(100) not null,
    foreign key (user_nickname) references user_(id_user),
    foreign key (platform_nickname) references platform(id_platform));

create table developer(id_developer bigint unsigned auto_increment primary key,
	DName varchar(200) not null,
    publisher_developer bigint unsigned,
    foreign key (publisher_developer) references publisher(id_publisher));

create table videogames(id_game bigint unsigned auto_increment primary key,
	title varchar(100) not null,
    subtitle varchar(100),
    description_game text not null,
    cover_image blob not null,
    version varchar(50) not null,
    storage_game varchar(50) not null,
    platform_games bigint unsigned,
    developer_games bigint unsigned,
    classification_games bigint unsigned,
    foreign key (platform_games) references platform(id_platform),
    foreign key (developer_games) references developer(id_developer),
    foreign key (classification_games) references classificaton(id_Classification));
    
create table list_games(user_list bigint unsigned,
	games_list bigint unsigned,
    estatus varchar(100) not null,
    foreign key (user_list) references user_(id_user),
    foreign key (games_list) references videogames(id_game));
