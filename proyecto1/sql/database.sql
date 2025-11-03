drop table if exists user;

create table user(
                     uuid varchar(60),
                     username varchar(30),
                     password varchar (255),
                     email varchar (255),
                     edad integer,
                     tipo enum ('NORMAL', 'ANUNCIOS', 'ADMIN')
);

alter table user add constraint pk_user primary key (uuid);
alter table user add constraint uk_user unique (username);
alter table user add constraint uk_user_email unique (email);