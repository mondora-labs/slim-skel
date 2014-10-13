create table antenna (
	id serial primary key,
	name varchar(100) not null,
	zone varchar(5),
	latitude double precision,
	longitude double precision
);

INSERT INTO antenna(
            name, zone, latitude, longitude)
    VALUES ('Udine1', 'NE', 123.45, 456.12);

INSERT INTO antenna(
            name, zone, latitude, longitude)
    VALUES ('Aosta2', 'NO', 987.45, 789.12);    

 select * from antenna;   
