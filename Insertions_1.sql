/*schools insertions*/ 
Insert into Schools values
('st. Fatima','madinet nasr','school established in 1975','19666','st_fatima@gmail.com','international','English','education is our vision','the best student is our mission','www.stfatima.com',24000),
('st. George','madinet nasr','school has a special place in cairo ','19958','st_george@yahoo.com','national','English','a better future','a better language','www.stgeorge..com',10000),
('new ramsis','ramsis',null,'19879','new_ramsis@hotmail.com','national','English','We will be the preeminent intellectual and creative center','prepares students to understand, contribute to, and succeed in a rapidly changing society','www.newramsis.com',20000)
 
 
/*school grades*/
Insert into School_Grades values
('st. Fatima','madinet nasr',7),
('st. Fatima','madinet nasr',8),
('st. Fatima','madinet nasr',9),
('st. Fatima','madinet nasr',10),
('st. Fatima','madinet nasr',11),
('st. Fatima','madinet nasr',12),
('st. George','madinet nasr',1),
('st. George','madinet nasr',2),
('st. George','madinet nasr',3),
('st. George','madinet nasr',4),
('st. George','madinet nasr',5),
('st. George','madinet nasr',6),
('st. George','madinet nasr',7),
('st. George','madinet nasr',8),
('st. George','madinet nasr',9),
('st. George','madinet nasr',10),
('st. George','madinet nasr',11),
('st. George','madinet nasr',12),
('new ramsis','ramsis',10),
('new ramsis','ramsis',11),
('new ramsis','ramsis',12)
 
 
/*insertions into Elimentary, middle,High schools*/
Insert into Elimentary_Schools
Select Distinct s.school_name,s.school_address
From Schools s inner join School_Grades sg on s.school_name=sg.school_name and s.school_address=sg.school_address
Where sg.grade>=1 and sg.grade<=6
 
 
Insert into Middle_Schools
Select Distinct s.school_name,s.school_address
From Schools s inner join School_Grades sg on s.school_name=sg.school_name and s.school_address=sg.school_address
Where sg.grade>=7 and sg.grade<=9
 
 
Insert into High_Schools
Select Distinct s.school_name,s.school_address
From Schools s inner join School_Grades sg on s.school_name=sg.school_name and s.school_address=sg.school_address
Where sg.grade>=10 and sg.grade<=12
 
 
 
 
/*insertions into Elimentary_Schools_Supplies*/
Insert into Elimentary_School_Supplies values
 ('st. George','madinet nasr','minimum age 6 years old'),
 ('st. George','madinet nasr','interview with parents is a must'),
 ('st. George','madinet nasr','interview with child is a must'),
('st. George','madinet nasr','birth certificate')
 
 
/*employees insertions */
 
 
SET DATEFORMAT dmy
insert into  Employees (first_name,middle_name,last_name,username,password,address,gender,email,birth_date,salary,school_name,school_address)
values('hanna','mohamed','ghobary','hanna_mohamed','454456','97 misr and sudan','F','hannaM6@gmail.com','4/11/1975',1000,'st. Fatima','madinet nasr'),
('mary','essam','maged','mary_essam','489232','56 al hegaz','F','mary_ess@gmail.com','9/3/1979',2000,'st. Fatima','madinet nasr'),
('essam','el sayed','ahmad','essam_sayed','564687','10 roxy','M','essamsss@gmail.com','12/7/1980',3000,'st. Fatima','madinet nasr'),
('Mina','eskandar','adly','mina_esk','54857','84 gesr el suez','M','MinaE@gmail.com','19/1/1970',2000,'st. Fatima','madinet nasr'),
('sawsan','karim','bassem','sawsan_kar','798731','85 al hegaz','F','sawsanK@yahoo.com','13/8/1985',2500,'st. Fatima','madinet nasr'),
('kirolos','sherif','henry','kiro_sherif','87897','6 midan ismaleya','M','kirohenry@hotmail.com','21/12/1990',1500,'st. Fatima','madinet nasr'),
('bassel','mohamed','ahmad','bassel_mohmaed','87931sd','5 al hegaz','M','basselMohamed@hotmail.com','4/11/1986',1500,'st. Fatima','madinet nasr'),
('ahmed','mohamed','alaa','ahmed_mohmaed','987987','4 abas el aqad','M','ahmedMido@gmail.com','8/8/1988',500,'st. Fatima','madinet nasr'),
('david','maged','rashed','david_maged','876422','2 abo obayda','M','davidMaged@yahoo.com','8/2/1986',2500,'st. Fatima','madinet nasr'),
('karim','bassem','hanna','karim_hanna','12348','8 marghany','M','karim995@gmail.com','26/7/1990',2500,'st. Fatima','madinet nasr'),
 
 
 
 
 
 
('michael','morcos','zakhary','michael_morcos','mmm235','23 abo bakr','M','michael_morcos6@yahoo.com','23/5/1991',2500,'st. george','madinet nasr'),
('michael','reda','adly','michael_adly','1931996','59 al hegaz','M','michaelRA6@gmail.com','18/4/1984',2500,'st. george','madinet nasr'),
('John','emad','nashed','John_emad','bolla10','62 abd el rahman rafee','M','john_nashed@hotmail.com','15/6/1992',2500,'st. george','madinet nasr'),
('hannah','mario','archie','Hannah_mario','545652','24 park view','F','hannah_mario@yahoo.com','5/8/1990',2500,'st. george','madinet nasr'),
('omar','sherif','ahmed','omar_sherif','897642','42 gesr el suez','M','omar_sherif@yahoo.com','12/5/1987',2500,'st. george','madinet nasr'),
('saeed','el sayed','ahmad','saeed_el_sayed','98978','9 alf maskan','M','saeed_sayed@gmail.com','3/2/1983',2500,'st. george','madinet nasr'),
('ghada','ahmed','khaled','ghada_ahmed','13278','25 hegaz','F','ghada_ahmad@gmail.com','28/11/1983',2500,'st. george','madinet nasr'),
('nada','sharaf el din','mohamed','nada_sharaf','75221','8 mostafa el nahas','F','nada_sharaf@yahoo.com','5/8/1990',2500,'st. george','madinet nasr'),
 
 
 
 
 
 
('Aida','Nagui','Emad','aida_nagui','56489','32 el bostan','F','Aida@gmail.com','6/6/1983',2500,'new ramsis','ramsis'),
('david','osama','Emad','david_osama','98764','93 sheraton','M','david_oss@yahoo.com','9/9/1988',2800,'new ramsis','ramsis'),
('Irene','raafat','samir','irene_raafat','78964','6 el nasr','F','rina_rs@gmail.com','7/7/1990',1500,'new ramsis','ramsis'),
('bishoy','george','wadie','bishoy_george','98756','6 el zatoon','M','Bisho999@hotmail.com','8/8/1989',1700,'new ramsis','ramsis'),
('fady','raafat','makram','fady_raafat','56489','8 ramsis','M','fady_raafat@gmail.com','11/11/1976',3500,'new ramsis','ramsis'),
('mark','hany','aziz','mark_hany','89745','22 abaseya','M','mark_hanyt@hotmail.com','12/12/1979',3000,'new ramsis','ramsis'),
('yasmine','nagy','zakaria','yasmine_nagy','789754','5 el hegaz','F','yasmine_nagy@hotmail.com','1/12/1991',1500,'new ramsis','ramsis'),
('mark','maged','morcos','mark_maged','897987','90 tomanbay','M','mark_maged@hotmail.com','1/2/1984',2000,'new ramsis','ramsis')
 
 
/*admins insertion*/
Insert into Admins values  (2),(3),(10),(11),(23),(24)
 
 
/* teachers insertions*/
 
DECLARE @val as int = 1;
DECLARE @max int;
select @max = count(*) from Employees 
 
 
WHILE @val <= @max
BEGIN
    Insert into Teachers 
    SELECT employee_id,DATEADD(year,-cast((RAND()*14) as int),GetDate())
    from Employees where employee_id=@val and employee_id not in(7,8,13,17,22) and username is not Null and password is not Null
    and employee_id not IN(select * from Admins);
 
    Insert into Teachers 
    SELECT employee_id,DATEADD(year,-cast(FLOOR(RAND()*(20-15)+15) as int),GetDate())
    from Employees where employee_id=@val and employee_id in(7,8,13,17,22) and username is not Null and password is not Null
    and employee_id not IN(select * from Admins);
    set @val = @val +1;
END
 
 
 
 
/*supervisors insertions */
insert into Supervisors
select employee_id from Teachers where years_of_experience>=15
 
 
/* others insertions*/
INSERT INTO  Others VALUES (1, 7)
INSERT INTO  Others VALUES (4, 8)
INSERT INTO  Others VALUES (5, 7)
INSERT INTO  Others VALUES (6, 8)
INSERT INTO  Others VALUES (12, 13)
INSERT INTO  Others VALUES (14, 17)
INSERT INTO  Others VALUES (15, 13)
INSERT INTO  Others VALUES (16, 17)
INSERT INTO  Others VALUES (18, 13)
INSERT INTO  Others VALUES (19, 22)
INSERT INTO  Others VALUES (20, 22)
INSERT INTO  Others VALUES (21, 22)
INSERT INTO  Others VALUES (25, 22)
 
 
 
 
/*questions insertions */
/*
  Insert into Questions (course_code,student_id,child_ssn,date,question,answer,teacher_id) values
('math1',5,5556,CURRENT_TIMESTAMP,'1+9= ?',null,1),
('math1',5,5556,CURRENT_TIMESTAMP,'how to multiply 2 numbers?',null,1),
('Arabic4',5,5556,CURRENT_TIMESTAMP,'plural of man? Men or mans ?','men',1)
*/
 
 
 
 
 
 
 
/*Announcements insertions */
/*
insert into Announcements (date,title,admin_id,description,type) values
('20160115 10:00:00 AM','english quiz1',1,'quiz 1 english will cover lessons 3 and 4 next thursday','quiz'),
('20160225 10:00:00 AM','english quiz2',1,'quiz 2 english will cover lessons 6 and 7 next saturday','quiz'),
('20160402 10:00:00 AM','english quiz3',1,'quiz 3 english will cover lessons 9 and 10 next tuesday','quiz'),
('20160117 10:00:00 AM','math quiz1',1,'quiz 1 math will cover lessons 3 and 4 next saturday','quiz'),
('20160301 10:00:00 AM','math quiz2',1,'quiz 2 math will cover lessons 7 and 8 next monday','quiz'),
('20160410 10:00:00 AM','math quiz3',1,'quiz 3 math will cover lessons 10 and 11 next saturday','quiz'),
('20160118 10:00:00 AM','science quiz1',1,'quiz 1 science will cover lessons 1 and 2 next wednesday','quiz'),
('20160230 10:00:00 AM','science quiz2',1,'quiz 2 science will cover lessons 4 and 5 next wednesday','quiz'),
('20160412 10:00:00 AM','science quiz3',1,'quiz 3 science will cover lessons 8 and 9 next tuesday','quiz'),
('20160401 10:00:00 AM','dreampark trip',1,'our trip to dreampark is next friday, buses will move from school at 8 am sharp , price 200LE','trip'),
('20160218 10:00:00 AM','ping pong competition',1,'congratulations david morcos nashed has won the ping pong competition for 5th primary','news'),
('20160118 10:00:00 AM','math quiz1',2,'quiz 1 math will cover lessons 3 and 4 next saturday','quiz'),
('20160302 10:00:00 AM','math quiz2',2,'quiz 2 math will cover lessons 7 and 8 next monday','quiz'),
('20160411 10:00:00 AM','math quiz3',2,'quiz 3 math will cover lessons 10 and 11 next saturday','quiz'),
('20160119 10:00:00 AM','science quiz1',2,'quiz 1 science will cover lessons 1 and 2 next wednesday','quiz'),
('20160220 10:00:00 AM','science quiz2',2,'quiz 2 science will cover lessons 4 and 5 next wednesday','quiz'),
('20160413 10:00:00 AM','science quiz3',2,'quiz 3 science will cover lessons 8 and 9 next tuesday','quiz'),
('20160402 10:00:00 AM','dreampark trip',2,'our trip to dreampark is next friday, buses will move from school at 8 am sharp , price 200LE','trip'),
('20160219 10:00:00 AM','chess competition',2,'congratulations andrea has won the chess competition for 4th primary','news')
*/
insert into Announcements (date,title,admin_id,description,type) values
(CURRENT_TIMESTAMP,'english quiz1',2,'quiz 1 english will cover lessons 3 and 4 next thursday','quiz'),
(CURRENT_TIMESTAMP,'english quiz2',2,'quiz 2 english will cover lessons 6 and 7 next saturday','quiz'),
(CURRENT_TIMESTAMP,'english quiz3',2,'quiz 3 english will cover lessons 9 and 10 next tuesday','quiz'),
(CURRENT_TIMESTAMP,'math quiz1',2,'quiz 1 math will cover lessons 3 and 4 next saturday','quiz'),
(CURRENT_TIMESTAMP,'math quiz2',2,'quiz 2 math will cover lessons 7 and 8 next monday','quiz'),
(CURRENT_TIMESTAMP,'math quiz3',2,'quiz 3 math will cover lessons 10 and 11 next saturday','quiz'),
(CURRENT_TIMESTAMP,'science quiz1',2,'quiz 1 science will cover lessons 1 and 2 next wednesday','quiz'),
(CURRENT_TIMESTAMP,'science quiz2',2,'quiz 2 science will cover lessons 4 and 5 next wednesday','quiz'),
(CURRENT_TIMESTAMP,'science quiz3',3,'quiz 3 science will cover lessons 8 and 9 next tuesday','quiz'),
(CURRENT_TIMESTAMP,'dreampark trip',3,'our trip to dreampark is next friday, buses will move from school at 8 am sharp , price 200LE','trip'),
(CURRENT_TIMESTAMP,'ping competition',3,'congratulations david morcos nashed has won the ping pong competition for 5th primary','news'),
(CURRENT_TIMESTAMP,'arabic quiz1',10,'quiz 1 arabic will cover lessons 3 and 4 next saturday','quiz'),
(CURRENT_TIMESTAMP,'arabic quiz2',10,'quiz 2 arabic will cover lessons 7 and 8 next monday','quiz'),
(CURRENT_TIMESTAMP,'arabic quiz3',10,'quiz 3 arabic will cover lessons 10 and 11 next saturday','quiz'),
(CURRENT_TIMESTAMP,'french  quiz1',11,'quiz 1 science will cover lessons 1 and 2 next wednesday','quiz'),
(CURRENT_TIMESTAMP,'french quiz2',23,'quiz 2 science will cover lessons 4 and 5 next wednesday','quiz'),
(CURRENT_TIMESTAMP,'french quiz3',23,'quiz 3 science will cover lessons 8 and 9 next tuesday','quiz'),
(CURRENT_TIMESTAMP,'Jeroland trip',24,'our trip to Jeroland is next friday, buses will move from school at 8 am sharp , price 200LE','trip'),
(CURRENT_TIMESTAMP,'chess competition',24,'congratulations andrea has won the chess competition for 4th primary','news')
 
 
 
 
 
 
 
 
Insert into Parents values
('101','Ashraf', 'Farid','ashraf','m12555','shobra','M','Ashraf.f@yahoo.com','22055486'),
('118','Nevine', 'Farid','nevine1','n122','shobra','F','nevine_A@yahoo.com','22055486'),
 
 
 
 
('126','Medhat', 'Maher','medhat','medhat165','zamalek','M','nk_bebo@gmail.com','24025486'),
('198','Rana', 'Ayman','rana.a','aa1215','zamalek','F','rana82@yahoo.com','24025486'),
 
 
 
 
('125','Sherif', 'Ashraf','shefo','22581a3','new cairo','M','shefo_91@hotmail.com','25024406'),
('109','Nada', 'Mohamed','nadaaa','xcxcx','new cairo','F','nadaaa_M@yahoo.com','25024406'),
 
 
 
 
('127','Khaled', 'Mostafa','khaledM','k6165','nasr city','M','k_mohamed@yahoo.com','22155089'),
('102','Farida', 'Farid','FaridaF','ffffff','nasr city','F','freda_120@gmail.com','22155089'),
 
 
 
 
('106','Khaled', 'Mohamed','ahmad','19999k','shobra','M','khalood@yahoo.com','25055480'),
('133','Marwa', 'Ahmed','marwaa','656846','shobra','F','marwazz@hotmail.com','25055480'),
 
 
 
 
('135','karim', 'Nagui','kimo','646513','nasr city','M','kimobig80@yahoo.com','25555600'),
('136','Azza', 'Mourad','Azza','66ss6','nasr city','F','3azaaa80@yahoo.com','25555600'),
 
 
 
 
('145','Mahmoud', 'Ahmed','mahmood','abcde','nasr city','M','7oooda20@gmail.com','20559600')
 
 
 
 
 
 
Insert into children (child_ssn, first_name, last_name, birth_date, gender)
Values
('195','Andrea','Medhat','21/05/2001','M'),
('220','Mina','Medhat','20/05/2005','M'),
('223','Marina','Medhat','07/11/2002','F'),
 
 
 
 
('198','Nadine','Karim','24/07/2003','F'),
('199','Andrew','Karim','26/08/2005','M'),
 
 
 
 
('221','Ziad','Mahmoud','2/05/2005','M'),
('224','Marwa','Mahmoud','09/01/2001','F'),
 
 
 
 
('222','Nada','khaled','21/05/2000','F'),
('228','Hady','khaled','01/06/2004','M'),
 
 
 
 
('225','Merna','Ashraf','10/05/1999','F'),
('226','David','Ashraf','22/05/2001','M'),
 
 
 
 
('227','Shady','Sherif','01/05/2008','M'),
('229','Fady','Sherif','02/07/2004','M'),
('230','Menna','Khaled','02/08/2006','F')
 
 
 
 
 
 
 
 
Insert into Child_has_Parent (child_ssn, parent_ssn)
Values
('195','126'),
('195','198'),
 
 
('220','126'),
('220','198'),
 
 
('223','126'),
('223','198'),
 
 
 
('198','135'),
('198','136'),
 
 
('199','135'),
('199','136'),
 
 
('221','145'),
 
 
('224','145'),
 
 
('222','106'),
('222','133'),
 
 
('228','106'),
('228','133'),
 
 
('225','101'),
('225','118'),
 
 
('226','101'),
('226','118'),
 
 
('227','125'),
('227','109'),
 
 
('229','125'),
('229','109'),
 
 
('230' ,'106' )
 
 
 
 
Insert into Mobile_number_of_parent (parent_ssn, mobile_num)
values
('125','0112555568'),
('125','0126555519'),
('109','0100555418'),
('118','0106544268'),
('118','0107544000'),
('101','0112955563'),
('126','0126500068'),
('198','0102244267'),
('135','0120544208'),
('136','0126224248'),
('136','0106242002'),
('145','0106004266'),
('106','0111124249'),
('133','0116224299'),
('133','0116024289')
 
 
/*
 
Insert into Students (child_ssn, school_name, school_address, grade)
Values
('195','st. George','madinet nasr','10'),
('220','st. George','madinet nasr','6'),
('223','st. George','madinet nasr','9'),
('198','st. George','madinet nasr','8'),
('199','st. George','madinet nasr','6'),
('221','st. George','madinet nasr','6'),
('224','new ramsis','ramsis','10'),
('222','new ramsis','ramsis','11'),
('228','st. Fatima','madinet nasr','7'),
('225','st. Fatima','madinet nasr','12'),
('226','st. Fatima','madinet nasr','10'),
('229','st. Fatima','madinet nasr','7')
 
*/
 
 
/*two children are not students(NOT ACCEPTED BY ANY SCHOOL)*/
 
 
 
 
 
Insert into Students (child_ssn, school_name, school_address,username,password, grade)
Values
('195','st. George','madinet nasr','andrea1','asdasd','10'),
('220','st. George','madinet nasr','minaM','qweqwe','6'),
('223','st. George','madinet nasr','MarinaM','asdasd','9'),
('198','st. George','madinet nasr','NadineK','asdasd','8'),
('199','st. George','madinet nasr','andrewK','asdasd','6'),
('221','st. George','madinet nasr','ziad','asdasd','6'),
('224','new ramsis','ramsis','MarwaM','asdxcbasd','10'),
('222','new ramsis','ramsis','Nada','asdasd','11'),
('228','st. Fatima','madinet nasr','hadyk','asdasd','7'),
('225','st. Fatima','madinet nasr','MernaA','asdasd','12'),
('226','st. Fatima','madinet nasr','DavidA','asdasd','10'),
('229','st. Fatima','madinet nasr','Fady','asdasd','7')
 
 
 
 
 
Insert into Child_parent_applyin_school(child_ssn, parent_ssn, school_name, school_address)
Values
( '195' ,'126','st. George','madinet nasr'),
( '195' ,'126','st. Fatima','madinet nasr'),
( '220' ,'126','st. George','madinet nasr'),
( '220' ,'126','st. Fatima','madinet nasr'),
( '223' ,'126','st. George','madinet nasr'),
( '223' ,'126','st. Fatima','madinet nasr'),
( '223' ,'126','new ramsis','ramsis'),
( '198' ,'135','st. George','madinet nasr'),
( '199' ,'135','st. George','madinet nasr'),
( '221' ,'145','st. George','madinet nasr'),
( '224' ,'145','new ramsis','ramsis'),
( '222' ,'133','new ramsis','ramsis'),
( '228' ,'133','st. Fatima','madinet nasr'),
( '225' ,'101','st. Fatima','madinet nasr'),
( '226' ,'101','st. Fatima','madinet nasr'),
( '229' ,'125','st. Fatima','madinet nasr'),
( '227' ,'125','st. George','madinet nasr'),
( '227' ,'125','st. Fatima','madinet nasr'),
( '230' ,'106','st. Fatima','madinet nasr')
 
 
 
 
  
 
 
Insert into Parent_review_School(parent_ssn, school_name, school_address, review)
Values
('126','st. George','madinet nasr','very good'),
('145','st. George','madinet nasr','nice'),
('101','st. Fatima','madinet nasr','too crowded'),
('125','st. Fatima','madinet nasr','nice'),
('106','st. Fatima','madinet nasr','not bad')
 
 
 
 
 
 
/* courses insertions */
INSERT INTO Courses  VALUES ('Math1', 'basic Math 1', 'some math basic operations summations and differences', 1, 'st. George', 'madinet nasr')
INSERT INTO Courses  VALUES ('Math2', 'basic Math 2', 'some math basic operations multiplications and divisions', 2, 'st. George', 'madinet nasr')
INSERT INTO Courses  VALUES ('Math7', 'intermediate Math 1', 'intermediate operations like factorizatio', 7, 'st. George', 'madinet nasr')
INSERT INTO Courses  VALUES ('Math8', 'intermediate Math 2', 'intermediate operations like trignometric functions', 8, 'st. George', 'madinet nasr')
INSERT INTO Courses  VALUES ('Math9', 'intermediate Math 3', 'intermediate math sets like real and rational sets', 9, 'st. George', 'madinet nasr')
INSERT INTO Courses  VALUES ('Math10', 'advanced Math 1', 'advanced math operations like limits', 10, 'st. George', 'madinet nasr')
INSERT INTO Courses  VALUES ('Math11', 'advanced Math 2', 'advanced math operations like imaginary numbers', 11, 'st. George', 'madinet nasr')
INSERT INTO Courses  VALUES ('Math12', 'advanced Math 3', 'advanced math operations like diffrentiation and integratio', 12, 'st. George', 'madinet nasr')
INSERT INTO Courses  VALUES ('Science6', 'basic Sciences 6', 'planets and stars', 6, 'st. George', 'madinet nasr')
INSERT INTO Courses  VALUES ('Science7', 'intermediate Sciences 1', 'plants and photosynthesis', 7, 'st. George', 'madinet nasr')
INSERT INTO Courses  VALUES ('Science10', 'advanced Sciences 1', 'electomagnetic fields', 10, 'st. George', 'madinet nasr')
INSERT INTO Courses  VALUES ('Science11', 'advanced Sciences 2', 'elecricity ', 11, 'st. George ', 'madinet nasr')
INSERT INTO Courses  VALUES ('Science12', 'advanced Sciences 3', 'magnetic fields', 12, 'st. George', 'madinet nasr')
INSERT INTO Courses  VALUES ('Arabic3', 'basic Arabic 3', 'nahw: mobtadaa and khabar', 3, 'st. George', 'madinet nasr')
INSERT INTO Courses  VALUES ('Arabic4', 'basic Arabic 4', 'el gomla el esmeya wal faaleya', 4, 'st. George', 'madinet nasr')
INSERT INTO Courses  VALUES ('Arabic5', 'basic Arabic 5', 'el fe3l el mady wel modare3', 5, 'st. George', 'madinet nasr')
 
 
 
 
INSERT INTO Courses  VALUES ('Math_7', 'intermediate Math 1', 'intermediate operations like factorizatio', 7, 'st. Fatima', 'madinet nasr')
INSERT INTO Courses  VALUES ('Math_8', 'intermediate Math 2', 'intermediate operations like trignometric functions', 8, 'st. Fatima', 'madinet nasr')
INSERT INTO Courses  VALUES ('Math_9', 'intermediate Math 3', 'intermediate math sets like real and rational sets', 9, 'st. Fatima', 'madinet nasr')
INSERT INTO Courses  VALUES ('Math_10', 'advanced Math 1', 'advanced math operations like limits', 10, 'st. Fatima', 'madinet nasr')
INSERT INTO Courses  VALUES ('Math_11', 'advanced Math 2', 'advanced math operations like imaginary numbers', 11, 'st. Fatima', 'madinet nasr')
INSERT INTO Courses  VALUES ('Math_12', 'advanced Math 3', 'advanced math operations like diffrentiation and integratio', 12, 'st. Fatima', 'madinet nasr')
INSERT INTO Courses  VALUES ('Science_7', 'intermediate Sciences 1', 'plants and photosynthesis', 7, 'st. Fatima', 'madinet nasr')
INSERT INTO Courses  VALUES ('Science_10', 'advanced Sciences 1', 'electomagnetic fields', 10, 'st. Fatima', 'madinet nasr')
INSERT INTO Courses  VALUES ('Science_11', 'advanced Sciences 2', 'elecricity ', 11, 'st. Fatima ', 'madinet nasr')
INSERT INTO Courses  VALUES ('Science_12', 'advanced Sciences 3', 'magnetic fields', 12, 'st. Fatima', 'madinet nasr')
 
 
 
 
INSERT INTO Courses  VALUES ('Math 10', 'advanced Math 1', 'advanced math operations like imaginary numbers', 10, 'new ramsis', 'ramsis')
INSERT INTO Courses  VALUES ('Math 11', 'advanced Math 2', 'advanced math operations like diffrentiation and integratio', 11, 'new ramsis', 'ramsis')
INSERT INTO Courses  VALUES ('Math 12', 'advanced Math 3', 'advanced math operations like limits', 12, 'new ramsis', 'ramsis')
INSERT INTO Courses  VALUES ('Science 10', 'advanced Sciences 1', 'elecricity', 10, 'new ramsis', 'ramsis')
INSERT INTO Courses  VALUES ('Science 11', 'advanced Sciences 2', 'electomagnetic fields ', 11, 'new ramsis ', 'ramsis')
INSERT INTO Courses  VALUES ('Science 12', 'advanced Sciences 3', 'magnetic fields', 12, 'new ramsis', 'ramsis')
 
 
 
 
 
 
INSERT INTO  Course_isprequisiteof_Course  VALUES ('Math1', 'Math2')
INSERT INTO  Course_isprequisiteof_Course  VALUES ('Arabic3', 'Arabic4')
INSERT INTO  Course_isprequisiteof_Course  VALUES ('Arabic4', 'Arabic5')
INSERT INTO  Course_isprequisiteof_Course  VALUES ('Science_11', 'Science_12')
INSERT INTO  Course_isprequisiteof_Course  VALUES ('Science_10', 'Science_11')
INSERT INTO  Course_isprequisiteof_Course  VALUES ('Math_11', 'Math_12')
INSERT INTO  Course_isprequisiteof_Course  VALUES ('Math_10', 'Math_11')
INSERT INTO  Course_isprequisiteof_Course  VALUES ('Math10', 'Math11')
INSERT INTO  Course_isprequisiteof_Course  VALUES ('Math9', 'Math10')
INSERT INTO  Course_isprequisiteof_Course  VALUES ('Math8', 'Math9')
INSERT INTO  Course_isprequisiteof_Course  VALUES ('Science 11', 'Science 12')
INSERT INTO  Course_isprequisiteof_Course  VALUES ('Math_7', 'Math_8')
INSERT INTO  Course_isprequisiteof_Course  VALUES ('Math7', 'Math8')
INSERT INTO  Course_isprequisiteof_Course  VALUES ('Math7', 'Math9')
INSERT INTO  Course_isprequisiteof_Course  VALUES ('Math7', 'Math10')
 
 
 
Insert into Reports(teacher_id, student_id, child_ssn, date, teacher_comment )
Values
( '1','2','220',CURRENT_TIMESTAMP,'smart student'),
( '4','2','220',CURRENT_TIMESTAMP,'Excellent performance'),
( '12','6','221',CURRENT_TIMESTAMP,'needs follow up'),
( '21','8','222',CURRENT_TIMESTAMP,'good')
 
 
Insert into Parent_reply_Report( teacher_id, student_id, child_ssn, parent_ssn, date, reply)
Values
( '1','2','220','133',CURRENT_TIMESTAMP,'I know my kid is smart'),
( '12','6','221','126',CURRENT_TIMESTAMP,'Ill take care of this')
/* me7tagin nezabat el current stamp hena*/
 
 
 
 
 
 
 
/*activities insertions*/
Insert into Activities values('20160225 03:00:00 PM','soccer field','there wiil be a soccer training after school in the school''s soccer field','soccer training',null,2,7)
Insert into Activities values('20160326 03:00:00 PM','basketball field','there wiil be a basketball training after school in the schools basketball field',' basketball training',null,2,4)
Insert into Activities values('20160427 03:00:00 PM','playground','there wiil be a scouts meeting after school in the school''s playground','scouts meeting','scouts uniform',2,8)
Insert into Activities values('20160215 03:00:00 PM','soccer field','there wiil be a soccer training after school in the school''s soccer field','soccer training',null,10,12)
Insert into Activities values('20160305 03:30:00 PM','basketball field','there wiil be a basketball training after school in the school''s basketball field',' basketball training',null,10,14)
Insert into Activities values('20160425 03:30:00 PM',' volleyball field','there wiil be a v training after school in the school''s volleyball field','volleyball training',null,10,17)
Insert into Activities values('20160210 04:00:00 PM','soccer field','there wiil be a soccer training after school in the school''s soccer field','soccer training',null,23,19)
Insert into Activities values('20160214 04:00:00 PM','basketball field','there wiil be a basketball training after school in the school''s basketball field',' basketball training',null,23,21)
Insert into Activities values('20160219 04:00:00 PM',' volleyball field','there wiil be a v training after school in the school''s volleyball field','volleyball training',null,23,25)
 
 
/*Activity_has_student insertions*/
Insert into Activity_has_student values('20160225 03:00:00 PM','soccer field',9,228)
Insert into Activity_has_student values('20160225 03:00:00 PM','soccer field',12,229)
Insert into Activity_has_student values('20160427 03:00:00 PM','playground',9,228)
Insert into Activity_has_student values('20160427 03:00:00 PM','playground',10,225)
  
Insert into Activity_has_student values('20160305 03:30:00 PM','basketball field',1,195)
Insert into Activity_has_student values('20160305 03:30:00 PM','basketball field',2,220)
Insert into Activity_has_student values('20160215 03:00:00 PM','soccer field',4,198)
Insert into Activity_has_student values('20160425 03:30:00 PM',' volleyball field',6,221)
  
Insert into Activity_has_student values('20160210 04:00:00 PM','soccer field',7,224)
Insert into Activity_has_student values('20160214 04:00:00 PM','basketball field',8,222)
 
 
 
 
/*club insertions */
Insert into Clubs values
('Aiesec','travel around the world, get the best experience and exchange culture'),
('MUN','A modeled united nations to discuss worldwide problems how to develop these nations '),
('TIQ','debate talks'),
('TEDX','Talks given by influencing people and celebrities')
 
 
Insert into club_offered_by_high_school values
('Aiesec','st. Fatima','madinet nasr'),
('MUN','st. Fatima','madinet nasr'),
('TEDX','st. Fatima','madinet nasr'),
('Aiesec','st. george','madinet nasr'),
('TIQ','st. george','madinet nasr'),
('TIQ','new ramsis','ramsis'),
('TEDX','new ramsis','ramsis')
 
 
Insert into Club_has_Student values
('Aiesec',1,195),
('Aiesec',3,223),
('Aiesec',5,199),
('Aiesec',6,221),
('TIQ',6,221),
('TEDX',6,221),
('MUN',6,221),
('TIQ',2,220),
('TEDX',2,220),
('TEDX',10,225),
('MUN',10,225),
('TIQ',11,226),
('TEDX',8,222),
('MUN',8,222),
('TIQ',8,222),
('Aiesec',8,222),
('Aiesec',4,198)
 
 
 
 
 
 
Insert into Course_has_students
Values
('Math10','1','195','16'),
('Science10','1','195','18'),
('Math_10','11','226','1'),
('Science_10','11','226','6'),
('Math_12','10','225','1'),
('Science_12','10','225','6')
 
 
 
 
/*Question insertions*/
Insert into Questions (course_code, student_id, child_ssn, teacher_id, date, question, answer) values ('Math_10','11','226','1', '20160120 08:00:00 PM',' what is the limit of a constant ?',null),
('Science_10','11','226','6', '20160124 09:00:00 PM','How to calculate magnetic field strength ?',null),
('Math_12','10','225','1', '20160111 08:30:00 PM',' what is the differentiation of a constant ?','any differentiation is  0')
  
/*assignments insertions*/
  
insert into Assignments values
('Math_10',1, '20160110 11:00:00 PM', '20160120 11:00:00 PM','assignment 1',' What is limx→1√(1+3x)-1 ?'),
('Math_12',1, '20160110 11:00:00 PM', '20160120 11:00:00 PM','assignment 1',' What is the derivative of x^2 +7 '),
('Science_10',6, '20160115 11:00:00 PM', '20160125 11:00:00 PM','assignment 2','  What happens if a current carrying conductor is placed in a magnetic field?, What is electromagnetic induction?')


 
 
 
/*Assignment_solvedby_student insertions*/
  
insert into Assignment_solved_by_student (course_code, teacher_id,post_date, student_id, child_ssn,answer) Values
('Math_10',1, '20160110 11:00:00 PM',11,226,'1'),
('Math_12',1, '20160110 11:00:00 PM',10,225,'2x'),
('Science_10',6, '20160115 11:00:00 PM',11,226,'A current carrying conductor placed in a magnetic field experiences a force whose direction is given by Fleming''s left hand rule.,  The phenomenon by which an emf or current is induced in a conductor due to change in the magnetic field near the conductor is known as electromagnetic induction.')
  
/*Assignment_gradedby_Teacher insertions*/
  
Insert into Assignmet_gradedby_teacher(course_code, teacher_id, student_id,post_date ,child_ssn,score) values
('Math_10',1,11,'20160110 11:00:00 PM',226,10),
('Math_12',1,10,'20160110 11:00:00 PM',225,10),
('Science_10',6,11,'20160115 11:00:00 PM',226,10)

