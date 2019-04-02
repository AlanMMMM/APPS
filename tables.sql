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
  app_status varchar(25) not null,
  transcript_received varchar(15) not null default 'No',
  rec_received varchar(15) not null default 'No',
  decision int default 0,
  app_rec int,
  app_rec_advisor_uid int,
  app_rec_comment varchar(40),
  app_deficiency_courses varchar(40),
  reason_for_reject varchar(1),
  
  FOREIGN KEY (uid) REFERENCES user(uid)
  );
  

  CREATE TABLE recommendation(
  rid int auto_increment,
  rec_fname varchar(25),
  rec_lname varchar(25),
  rec_title varchar(25),
  rec_letter varchar(4096),
  rec_rating int,
  rec_generic varchar(1),
  rec_credible varchar(1),
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
  exam_year int,
  GRE_score int,
  GRE_subject varchar(10),
  TOEFL_score int,
  TOEFL_year int,
  bachelor_school varchar(25),
  bachelor_degree varchar(25),
  bachelor_major varchar(25),
  bachelor_year int,
  bachelor_gpa double,
  area_of_interest varchar(25),
  degree_seeking varchar(25),
  FOREIGN KEY(uid) REFERENCES user(uid)
  );
  
-- Required pre populated data  
INSERT INTO user VALUES('jlennon','54321','student',55555555);  
INSERT INTO application VALUES (55555555,'111111111','123 spring st','new york','NY',10002,'abcde@abcde.com','FALL',180,180,2017,200,"physics",100,2018,'GWU','BS','CS',2019,3.0,'CS','master');
INSERT INTO applicant VALUES ('John','Lennon',55555555,'Pending','Yes','Yes',NULL,NULL,NULL,NULL,NULL,NULL);

INSERT INTO user VALUES('rstarr','54321','student',66666666);
INSERT INTO user (username,password,role) VALUES ('Narahari','12345','faculty');
INSERT INTO user (username,password,role) VALUES ('admin','117117','administrator');
INSERT INTO user (username,password,role) VALUES ('secretary','117117','GS');
INSERT INTO user (username,password,role) VALUES ('chair','117117','CAC');  


-- Other testing data
INSERT INTO user (username,password,role,uid) VALUES ('rick','12345','student',1);
INSERT INTO user (username,password,role,uid) VALUES ('tom','12345','student',2);
INSERT INTO user (username,password,role,uid) VALUES ('tony','12345','student',3);
INSERT INTO user (username,password,role,uid) VALUES ('alan','12345','faculty',4);
INSERT INTO user (username,password,role,uid) VALUES ('chief','117117','student',5);
INSERT INTO user (username,password,role,uid) VALUES ('kevin','117117','administrator',6);
INSERT INTO faculty VALUES ('alan','turing',4,'reviewer');
INSERT INTO applicant VALUES ('rick','lee',1,'completed','Yes','Yes',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO applicant VALUES ('tom','ford',2,'completed','Yes','Yes',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO applicant VALUES ('tony','allen',3,'pending','Yes','No',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO recommendation VALUES (1,'Tim','Wood','professor','Rick is a great student',0,NULL,NULL,1);
INSERT INTO recommendation VALUES (2,'Tim','Wood','professor','Tom is a great student as well',0,NULL,NULL,2);
INSERT INTO application VALUES (1,'123456789','123 spring st','new york','NY',10002,'abcde@abcde.com','FALL',180,180,2017,180,"physics",100,2018,'GWU','BS','CS',2019,3.0,'CS','master');
INSERT INTO application VALUES (2,'123456788','123 summer rd','washington','DC',20016,'abcdef@abcdef.com','FALL',170,170,2018,170,"physics",100,2018,'GWU','BA','CS',2019,4.0,'CS','phd');
INSERT INTO application VALUES (3,'123456787','123 fall blvd','miami','FL',30002,'abcdefg@abcdefg.com','FALL',160,160,2018,160,"physics",100,2018,'GWU','BS','MATH',2019,3.5,'CS','phd');

