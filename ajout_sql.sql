CREATE TABLE users (
    id int primary key auto_increment,
    firstname varchar(255),
    lastname varchar(255),
    login varchar(255),
    email varchar(255),
    password varchar(255),
    account_created_at datetime default current_timestamp,
    role tinyint(2) default 1,
	created_at datetime default current_timestamp,
	updated_at datetime default current_timestamp
)
