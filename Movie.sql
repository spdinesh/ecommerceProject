
use project;
create table movie(movieid int auto_increment not null,
moviename varchar(50), moviegenre varchar(50),
moviecast varchar(100), price decimal(6,2), 
quantity int default 0, primary key(movieid));

insert into movie values(null, "The Shawshank Redemption", "Drama", "Tim Robbins, Morgan Freeman, Bob Gunton", "20.00", "0");
insert into movie values(null, "The Godfather", "Crime,Drama", "Marlon Brando, Al Pacino, James Caan", "15.00", "0");
insert into movie values(null, "Pulp fiction", "Crime,Drama", "John Travolta, Uma Thurman, Samuel L. Jackson", "10.00", "0");
insert into movie values(null, "Parasite", "Comedy,Drama", "Kang-ho Song, Lee Sun-kyun, Yeo-jeong Cho", "17.00", "0");
insert into movie values(null, "Django Unchained", "Drama,Western", "Jamie Foxx, Christoph Waltz, Leonardo DiCaprio", "12.00", "0");
insert into movie values(null, "WALL·E", " Animation, Adventure, Family", "Ben Burtt, Elissa Knight, Jeff Garlin", "16.00", "0");