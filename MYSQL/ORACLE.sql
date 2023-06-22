create table type_(id_Type int primary key,
	TName varchar(100) not null);

create table classificaton(id_Classification int primary key,
	CName varchar(100) not null);
    
create table publisher(id_publisher int primary key,
	PName varchar(200) not null);
    
create table platform(id_platform int primary key,
	PFName varchar(100) not null);
    
/*Tables with FK*/
create table user_(id_user int primary key,
	email varchar(100) not null,
    user_name varchar(50) not null,
    password_user varchar(50) not null,
    type_user int,
    foreign key (type_user) references type_(id_Type));
    
create table nicknames(id_nickname int primary key,
	user_nickname int,
    platform_nickname int,
    nickname varchar(100) not null,
    foreign key (user_nickname) references user_(id_user),
    foreign key (platform_nickname) references platform(id_platform));

create table developer(id_developer int primary key,
	DName varchar(200) not null,
    publisher_developer int,
    foreign key (publisher_developer) references publisher(id_publisher));

create table videogames(id_game int primary key,
	title varchar(100) not null,
    subtitle varchar(100),
    description_game varchar(300) not null,
    cover_image blob not null,
    version varchar(50) not null,
    storage_game varchar(50) not null,
    platform_games int,
    developer_games int,
    classification_games int,
    foreign key (platform_games) references platform(id_platform),
    foreign key (developer_games) references developer(id_developer),
    foreign key (classification_games) references classificaton(id_Classification));
    
create table list_games(user_list int,
	games_list int,
    estatus varchar(100) not null,
    foreign key (user_list) references user_(id_user),
    foreign key (games_list) references videogames(id_game));
    
insert into type_ values(1, 'ADMIN');
insert into type_ values(2, 'USER');
insert into type_ values(3, 'COLABORATOR');

insert into user_ values(1, 'alienx2001@hotmail.com', 'DOKX890', '12345678', 1);
commit;
SELECT * FROM USER_;

