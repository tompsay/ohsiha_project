CREATE TABLE tbl_person
(
  id bigint auto_increment PRIMARY KEY,
  name varchar(50),
  gender char(1),
  dob date
);
 
INSERT tbl_person (name,gender,dob) VALUES('henrihnr', 'm', '1985-09-09');
INSERT tbl_person (name,gender,dob) VALUES('name_001', 'm', '1990-01-01');
INSERT tbl_person (name,gender,dob) VALUES('name_002', 'f', '2000-01-01');
INSERT tbl_person (name,gender,dob) VALUES('name_003', 'm', '2000-02-02');
INSERT tbl_person (name,gender,dob) VALUES('name_005', 'f', '2000-04-04');