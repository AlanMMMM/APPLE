-- add drop table for all your tables if they exist
-- DROP TABLE IF EXISTS table_name CASCADE;

-- add create table for all your tabled

DROP TABLE IF EXISTS form CASCADE;
DROP TABLE IF EXISTS application CASCADE;
DROP TABLE IF EXISTS recommendation CASCADE;
DROP TABLE IF EXISTS faculty CASCADE;
DROP TABLE IF EXISTS applicant CASCADE;
drop table if exists student cascade;
drop table if exists personnel cascade;
drop table if exists course cascade;
drop table if exists enroll cascade;
drop table if exists form cascade;
DROP TABLE IF EXISTS user CASCADE;

CREATE TABLE user(
  username varchar(15) not null,
  password varchar(15) not null,
  role varchar(15) not null,
  uid int auto_increment,
  PRIMARY KEY (uid)
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
  app_rec_advisor varchar(40),
  app_rec_comment varchar(40),
  app_deficiency_courses varchar(40),
  reason_for_reject varchar(1),
  payment varchar(1),
  accept_offer varchar(1),
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
  PRIMARY KEY(rid),
  FOREIGN KEY(uid) REFERENCES applicant(uid)
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
    masters_school varchar(25),
  masters_degree varchar(25),
  masters_major varchar(25),
  masters_year int,
  masters_gpa double,
  area_of_interest varchar(25),
  degree_seeking varchar(25),
  FOREIGN KEY(uid) REFERENCES user(uid)
  );
  
-- Required pre populated data  


INSERT INTO user VALUES('jlennon','54321','student',55555555);  
INSERT INTO application VALUES (55555555,'111111111','123 spring st','new york','NY',10002,'abcde@abcde.com','FALL',180,180,2017,200,"physics",100,2018,'GWU','BS','CS',2019,3.0,NULL,NULL,NULL,NULL,NULL,'CS','master');
INSERT INTO applicant VALUES ('John','Lennon',55555555,'completed','Yes','Yes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);


INSERT INTO user VALUES('rstarr','54321','student',66666666);





INSERT INTO recommendation VALUES (12345,'Tim','Wood','professor','Rick is a great student',0,NULL,NULL,55555555);

-- Other testing data


INSERT INTO user (username,password,role,uid) VALUES ('rick','12345','student',1);
INSERT INTO user (username,password,role,uid) VALUES ('tom','12345','student',2);
INSERT INTO user (username,password,role,uid) VALUES ('tony','12345','student',3);
INSERT INTO applicant VALUES ('rick','lee',1,'completed','Yes','Yes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO applicant VALUES ('tom','ford',2,'completed','Yes','Yes',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO applicant VALUES ('tony','allen',3,'pending','Yes','No',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO recommendation VALUES (1,'Tim','Wood','professor','Rick is a great student',0,NULL,NULL,1);
INSERT INTO recommendation VALUES (2,'Tim','Wood','professor','Tom is a great student as well',0,NULL,NULL,2);
INSERT INTO application VALUES (1,'123456789','123 spring st','new york','NY',10002,'abcde@abcde.com','FALL',180,180,2017,180,"physics",100,2018,'GWU','BS','CS',2019,3.0,NULL,NULL,NULL,NULL,NULL,'CS','master');
INSERT INTO application VALUES (2,'123456788','123 summer rd','washington','DC',20016,'abcdef@abcdef.com','FALL',170,170,2018,170,"physics",100,2018,'GWU','BA','CS',2019,4.0,NULL,NULL,NULL,NULL,NULL,'CS','phd');
INSERT INTO application VALUES (3,'123456787','123 fall blvd','miami','FL',30002,'abcdefg@abcdefg.com','FALL',160,160,2018,160,"physics",100,2018,'GWU','BS','MATH',2019,3.5,NULL,NULL,NULL,NULL,NULL,'CS','phd');





create table student (
  fname     varchar(20) not null,
  lname     varchar(20) not null,
  username  varchar(20) not null,
  email varchar(20),
  advisor varchar(20),
  hold int(1),
  passwrd   varchar(20) not null,
  sID  int(8) not null,
  program  varchar(20) not null,
  address  varchar(20) not null
  );

INSERT INTO student VALUES ('Brian', 'Morgan', 'blmorgan', 'blmorgan@gwu.edu','Dawn Ginetti',0, 'abc123', 12345678, 'cs', 'pasadena');
INSERT INTO student VALUES ('Robert', 'Gordon', 'rmgordon', 'rmgordon@gwu.edu','Dawn Ginetti',0,  'def456', 30043201, 'cs', 'district');
INSERT INTO student VALUES ('Jae', 'Souk', 'jsouk', 'jsouk@gwu.edu','Dawn Ginetti',0,  'ghi789', 43318703, 'cs', 'fulton');
INSERT INTO student VALUES ('Billie', 'Holiday', 'bholiday', 'bholiday@gwu.edu', 'Dawn Ginetti',0, '12345', 88888888, 'cs', 'Washington DC');
INSERT INTO student VALUES ('Diana', 'Krall', 'dkrall', 'dkrall@gwu.edu','Dawn Ginetti',0, '09876', 99999999, 'cs', 'New York');


  create table personnel (
  fname     varchar(20) not null,
  lname     varchar(20) not null,
  username  varchar(20) not null,
  passwrd   varchar(20) not null,
  fID  int(8) not null,
  personnelType  varchar(1) not null,
  reviewerType varchar(1),
  address  varchar(100) not null  
  );
INSERT INTO personnel VALUES ('Bhagi', 'Narahari', 'bnarahari', 'narahari123', 12353280, 'F','R', 'dc');
INSERT INTO personnel VALUES ('Hyeong-Ah', 'Choi', 'hchoi', 'choi222', 23442136, 'F','C', 'dc');
INSERT INTO personnel VALUES ('Maya', 'Shende', 'mshende', 'shende122', 34426892, 'G', NULL,'dc');
INSERT INTO personnel VALUES ('Tom', 'Clancy', 'tclancy', 'clancy442', 42284007, 'A', NULL,'md');
INSERT INTO personnel VALUES ('Dawn', 'Ginetti', 'dgin', '12345', 09876543, 'V', NULL,'md');

  create table course (
  courseID int(3) not null,
  deptName  varchar(20) not null,
  courseNumber     int(4) not null,
  courseName varchar(50) not null,
  day varchar(1) not null,
  startTime     int(4) not null,
  endTime     int(4) not null,
  semester varchar(1) not null,
  creditHrs     int(1) not null,
  sectionNum	int(1) not null,
  instructor varchar(20),
  preq1Dept     varchar(20),
  preq1Num     varchar(20),
  preq2Dept     varchar(20),
  preq2Num     varchar(20)
  );
INSERT INTO course VALUES (1, 'CSCI', 6221, 'SW Paradigms', 'M', 1500, 1730, 'S', 3, 1, 'Narahari', 'None', 'None', 'None', 'None');
INSERT INTO course VALUES (2, 'CSCI', 6461, 'Computer Architecture', 'T', 1500, 1730, 'S', 3, 1, 'Narahari', 'None', 'None', 'None', 'None');
INSERT INTO course VALUES (3, 'CSCI', 6212, 'Algorithms', 'W', 1500, 1730, 'S', 3, 1, 'Choi', 'None', 'None', 'None', 'None');
INSERT INTO course VALUES (4, 'CSCI', 6232, 'Networks 1', 'M', 1800, 2030, 'S', 3, 1, 'Narahari', 'None', 'None', 'None', 'None');
INSERT INTO course VALUES (5, 'CSCI', 6233, 'Networks 2', 'T', 1800, 2030, 'S', 3, 1, 'Narahari', 'CSCI', '6232', 'None', 'None');
INSERT INTO course VALUES (6, 'CSCI', 6241, 'Database 1', 'W', 1800, 2030, 'S', 3, 1, 'Narahari', 'None', 'None', 'None', 'None');
INSERT INTO course VALUES (7, 'CSCI', 6242, 'Database 2', 'R', 1800, 2030, 'S', 3, 1, 'Narahari', 'CSCI', '6241', 'None', 'None');
INSERT INTO course VALUES (8, 'CSCI', 6246, 'Compilers', 'T', 1500, 1730, 'S', 3, 1, 'Narahari', 'CSCI', '6461', 'CSCI', '6212');
INSERT INTO course VALUES (9, 'CSCI', 6251, 'Cloud Computing', 'M', 1800, 2030, 'S', 3, 1, 'Narahari', 'CSCI', '6461', 'None', 'None');
INSERT INTO course VALUES (10, 'CSCI', 6254, 'SW Engineering', 'M', 1530, 1800, 'S', 3, 1, 'Narahari', 'CSCI', '6221', 'None', 'None');
INSERT INTO course VALUES (11, 'CSCI', 6260, 'Multimedia', 'R', 1800, 2030, 'S', 3, 1, 'Choi', 'None', 'None', 'None', 'None');
INSERT INTO course VALUES (12, 'CSCI', 6262, 'Graphics 1', 'W', 1800, 2030, 'S', 3, 1, 'Choi', 'None', 'None', 'None', 'None');
INSERT INTO course VALUES (13, 'CSCI', 6283, 'Security 1', 'T', 1800, 2030, 'S', 3, 1, 'Choi', 'CSCI', '6212', 'None', 'None');
INSERT INTO course VALUES (14, 'CSCI', 6284, 'Cryptography', 'M', 1800, 2030, 'S', 3, 1, 'Choi', 'CSCI', '6212', 'None', 'None');
INSERT INTO course VALUES (15, 'CSCI', 6286, 'Network Security', 'W', 1800, 2030, 'S', 3, 1, 'Choi', 'CSCI', '6283', 'CSCI', '6232');
INSERT INTO course VALUES (16, 'CSCI', 6384, 'Cryptography 2', 'W', 1500, 1730, 'S', 3, 1, 'Choi', 'CSCI', '6284', 'None', 'None');
INSERT INTO course VALUES (17, 'ECE', 6241, 'Comunication Theory', 'M', 1800, 2030, 'S', 3, 1, 'Choi', 'None', 'None', 'None', 'None');
INSERT INTO course VALUES (18, 'ECE', 6242, 'Information Theory', 'T', 1800, 2030, 'S', 2, 1, 'Choi', 'None', 'None', 'None', 'None');
INSERT INTO course VALUES (19, 'MATH', 6210, 'Logic', 'W', 1800, 2030, 'S', 2, 1, 'Choi', 'None', 'None', 'None', 'None');
INSERT INTO course VALUES (20, 'CSCI', 6339, 'Embedded Systems', 'R', 1600, 1830, 'S', 3, 1, 'Choi', 'CSCI', '6461', 'CSCI', '6212');

  create table enroll (
  sID  int(8) not null,
  courseID     int(8) not null,
  deptName  varchar(20) not null,
  courseNumber     int(4) not null,
  startTime     int(4) not null,
  endTime     int(4) not null,
  day   varchar(1) not null,
  semester varchar(1) not null,
  creditHrs     int(1) not null,
  year		int(4) not null,
  finalGrade	varchar(2),
  gpa  decimal(3,2)
  );
  
  create table form (
    sID int(8) not null,
    courseID int(2),
    courseName varchar(6),
    courseNum int(4)
  );
