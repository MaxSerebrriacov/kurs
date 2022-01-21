create table Videotape(id serial primary key, name varchar(256), year_created varchar(4),industry_id int, prodeccer_id int,author_id int, actor_command_id int);

create table Industry(id serial primary key, name varchar(256));
create table Producers(id serial primary key, FIO varchar(128));

create table Authors(id serial primary key, FIO varchar(128));
create table Videotape_Authors(authors_id int, videotape_id int);

create table Actors(id serial primary key, FIO varchar(128));
create table Roles(actor_id int, command_id int, role varchar(128));
create table Command(id serial primary key, name varchar(128));

create table Premies(id serial primary key, name_fest varchar(128), year_completed varchar(4));
create table Videotape_premies(videotape_id int, premie_id int);

alter table Videotape add constraint fk_industry foreign key (industry_id) references Industry(id);
alter table Videotape add constraint fk_producer foreign key (prodeccer_id) references Producers(id);
alter table Videotape add constraint fk_video_command foreign key (actor_command_id) references Command(id);

alter table Videotape add constraint fk_author foreign key (author_id) references Authors(id);


alter table Videotape_Authors add constraint fk_video foreign key (videotape_id) references Videotape(id);

alter table Roles add constraint fk_authors foreign key (actor_id) references Actors(id);
alter table Roles add constraint fk_command foreign key (command_id) references Command(id);


alter table Videotape_premies add constraint fk_video foreign key (videotape_id) references Videotape(id);
alter table Videotape_premies add constraint fk_premier foreign key (premie_id) references Premies(id);
