-- add drop table for all your tables if they exist
-- DROP TABLE IF EXISTS table_name CASCADE;

-- add create table for all your tabled

DROP TABLE IF EXISTS applicant CASCADE;
DROP TABLE IF EXISTS application CASCADE;
DROP TABLE IF EXISTS recommendation CASCADE;
DROP TABLE IF EXISTS faculty CASCADE;
DROP TABLE IF EXISTS user CASCADE;

CREATE TABLE user(
  username varchar(15) not null,
  password varchar(15) not null,
  role varchar(15) not null,
  uid int auto_increment,
  PRIMARY KEY (uid)
);

CREATE TABLE faculty (
  first_name varchar(15) not null, 
  last_name varchar(15) not null,
  uid int,
  faculty_role varchar(15) not null,
  FOREIGN KEY (uid) REFERENCES user(uid)
);

CREATE TABLE applicant(
  first_name varchar(15) not null,
  last_name varchar(15) not null,
  uid int,
  app_status varchar(15) not null default 'In progress',
  transcript_received varchar(15) not null default 'No',
  rec_received varchar(15) not null default 'No',
  decision int,
  app_rec int,
  app_rec_advisor_uid int,
  FOREIGN KEY (uid) REFERENCES user(uid)
  );
  

  CREATE TABLE recommendation(
  rid int auto_increment,
  rec_fname varchar(15),
  rec_lname varchar(15),
  rec_title varchar(15),
  rec_letter varchar(500),
  uid int,
  PRIMARY KEY(rid)
  );

CREATE TABLE application(
  uid int,
  ssn varchar(15),
  street varchar(20),
  city varchar(15),
  state varchar(15),
  zip int,
  email varchar(25),
  app_term varchar(10),
  GRE_verbal int,
  GRE_quantitative int,
  GRE_total int,
  bachelor_school varchar(25),
  bachelor_degree varchar(10),
  bachelor_major varchar(15),
  bachelor_year int,
  bachelor_gpa double,
  area_of_interest varchar(25),
  degree_seeking varchar(25),
  rid int,
  FOREIGN KEY(uid) REFERENCES user(uid),
  FOREIGN KEY(rid) REFERENCES recommendation(rid)
  );
  
  
  
INSERT INTO user (username,password,role) VALUES ('rick','12345','student');
INSERT INTO user (username,password,role) VALUES ('tom','12345','student');
INSERT INTO user (username,password,role) VALUES ('tony','12345','student');
INSERT INTO user (username,password,role) VALUES ('alan','12345','faculty');
INSERT INTO user (username,password,role) VALUES ('chief','117117','student');
INSERT INTO faculty VALUES ('alan','turing',4,'reviewer');
INSERT INTO applicant VALUES ('rick','lee',1,'completed','Yes','Yes',NULL,NULL,NULL);
INSERT INTO applicant VALUES ('tom','ford',2,'completed','Yes','Yes',NULL,NULL,NULL);
INSERT INTO applicant VALUES ('tony','allen',3,'pending','Yes','No',NULL,NULL,NULL);
INSERT INTO recommendation (rec_fname,rec_lname,rec_title,rec_letter,uid) VALUES ('Tim','Wood','professor','Rick is a great student',1);
INSERT INTO recommendation (rec_fname,rec_lname,rec_title,rec_letter,uid) VALUES ('Tim','Wood','professor','Tom is a great student as well',2);
INSERT INTO application VALUES (1,'123456789','123 spring st','new york','NY',10002,'abcde@abcde.com','FALL','180','180','360','GWU','BS','CS','2019',3.0,'CS','master',1);
INSERT INTO application VALUES (2,'123456788','123 summer rd','washington','DC',20016,'abcdef@abcdef.com','FALL','170','170','340','GWU','BA','CS','2019',4.0,'CS','phd',2);
INSERT INTO application VALUES (3,'123456787','123 fall blvd','miami','FL',30002,'abcdefg@abcdefg.com','FALL','160','160','320','GWU','BS','MATH','2019',3.5,'CS','phd',NULL);
