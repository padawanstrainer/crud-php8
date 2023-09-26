DROP DATABASE IF EXISTS twitch_challenge;
CREATE DATABASE twitch_challenge CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE twitch_challenge;

/* Alumnos | profesores | rectores */
CREATE TABLE users(
  id serial primary key,
  name varchar(200) not null,
  lastname varchar(200) not null,
  user varchar(200),
  pass char(40),
  rol enum('student','teacher','admin') default 'student' 
) ENGINE=innoDB;


CREATE TABLE subjects(
  id smallint unsigned not null auto_increment primary key,
  subject varchar(200) not null unique
) ENGINE=innoDB;

/* que profe dicta qué materia */
CREATE TABLE courses(
  id serial primary key, 
  fksubject smallint unsigned not null, 
  fkteacher bigint unsigned not null,

  constraint course_subject foreign key(fksubject) references subjects(id) on delete cascade on update cascade,
  constraint course_teacher foreign key(fkteacher) references users(id) on delete cascade on update cascade
) ENGINE=innoDB;

CREATE TABLE asignature(
  fkstudent bigint unsigned not null,
  fkcourse bigint unsigned not null, 
  e1 float( 4, 2 ), 
  e2 float( 4, 2 ), 
  e3 float( 4, 2 ), 
  e4 float( 4, 2 )
) ENGINE=innoDB;


/*INSERTS DE PRUEBA*/
INSERT INTO 
  users ( name, lastname, user, pass, rol )
VALUES
  ('Angela', 'Flores', '12345678', SHA1('Aa12345678*'), 'admin' ),
  ('Rodrigo', 'Rodriguez', '87654321', SHA1('Rr87654321*'), 'teacher' ),
  ('Helena', 'No', '54545454', SHA1('Ha54545454*'), 'teacher' ),
  ('Emilio', 'Estevez', '23423423', SHA1('Eo23423423*'), 'teacher' ),
  ('Marthin', 'Marthinez', '43243243', SHA1('Mn43243243*'), 'teacher' );

INSERT INTO
  users ( name, lastname )
VALUES
  ( 'Bart', 'Simpson' ),
  ( 'Ivan', 'TheRaging Python' ),
  ( 'Fabito', 'Dev' ),
  ( 'Suuper', 'Cute' ),
  ( 'Sebass', '83' ),
  ( 'Jorge', 'Wako' ),
  ( 'Chloe', 'Savage' );


INSERT INTO
  subjects (subject)
VALUES 
  ( 'Matemática' ),
  ( 'Artística' ),
  ( 'Ed. Física' ),
  ( 'Inglés' );


INSERT INTO courses ( fksubject, fkteacher )
VALUES 
  ( 1, 2 ),
  ( 2, 3 ),
  ( 3, 4 ),
  ( 4, 5 );


INSERT INTO asignature ( fkstudent, fkcourse )
VALUES 
  (6, 1),
  (7, 1),
  (8, 1),
  (9, 2),
  (9, 4),
  (10, 3),
  (11, 4),
  (12, 4);