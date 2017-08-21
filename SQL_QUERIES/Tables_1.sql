
  create table Parents (
    parent_ssn int primary key ,
    first_name varchar(20),
    last_name varchar(20),
    username varchar(20) unique,
    password varchar(20),
    address varchar(40),
    gender char(1) ,
    email varchar(50) unique,
    home_num varchar(12) 
    );
 
 
  create table Mobile_number_of_parent(
    parent_ssn int, 
    mobile_num varchar(12),
    primary key(parent_ssn, mobile_num),
    foreign key(parent_ssn) references Parents on update cascade on delete cascade
  );
   
  SET DATEFORMAT dmy
 
  create table Children(
    child_ssn int primary key,
    first_name varchar(20),
    last_name varchar(20),
    birth_date date not null,
    gender char(1),
    age as (year(current_timestamp) - year(birth_date))
  );
   
   
   
  create table Child_has_Parent(
    child_ssn int,
    parent_ssn int,   /* ne3keshom wla l2 ? */
    primary key(parent_ssn, child_ssn),
    foreign key(parent_ssn) references Parents on update cascade on delete cascade,
    foreign key(child_ssn) references Children on update cascade on delete cascade);
     
  create table Schools(
     school_name varchar(50),
     school_address varchar(50),
     primary key(school_name ,school_address),
     general_info varchar(500),
     phone_number varchar(20),
     email varchar(50) unique,
     type varchar(20),
     main_language varchar(20),
     vision varchar(300),
     mission varchar(300),
     URL varchar(50),
     fees int
     );
     
    create table School_Grades(
      school_name varchar(50),
      school_address varchar(50),
      grade tinyint check(grade >=1 and grade <= 12) ,
      primary key(school_name,school_address,grade),
      foreign key(school_name,school_address) references Schools on update cascade on delete cascade
    );
     
    create table Elimentary_Schools(
      school_name varchar(50),
      school_address varchar(50),
      primary key(school_name,school_address),
      foreign key(school_name,school_address) references Schools on update cascade on delete cascade
    );
     
    create table Elimentary_School_Supplies(
      school_name varchar(50),
      school_address varchar(50),
      supplies varchar(300),
      primary key(school_name,school_address,supplies),
      foreign key(school_name,school_address) references Schools on update cascade on delete cascade
    );
     
    create table Middle_Schools(
      school_name varchar(50),
      school_address varchar(50),
      primary key(school_name,school_address),
      foreign key(school_name,school_address) references Schools on update cascade on delete cascade
    );
     
    create table High_Schools(
      school_name varchar(50),
      school_address varchar(50),
      primary key(school_name,school_address),
      foreign key(school_name,school_address) references Schools on update cascade on delete cascade
    );
     
    create table Students(
      student_id int identity,
      child_ssn int,
      school_name varchar(50),
      school_address varchar(50),
      username varchar(20) unique,
      password varchar(20),
      grade tinyint check(grade >=1 and grade <= 12) ,
      primary key(student_id,child_ssn),
      foreign key(child_ssn) references Children on update cascade on delete cascade,
      foreign key(school_name,school_address) references Schools on update set null on delete set null
    );
 
create table Child_Parent_applyin_School(
      child_ssn int,
      parent_ssn int,
      school_name varchar(50),
      school_address varchar(50),
      accepted bit,
      foreign key(child_ssn) references Children on update cascade on delete cascade,
      foreign key(parent_ssn) references Parents on update cascade on delete cascade,
      foreign key(school_name,school_address) references Schools on update cascade on delete cascade,
    );
     
    create table Parent_review_School(
      parent_ssn int,
      school_name varchar(50),
      school_address varchar(50),
      review varchar(500),
      primary key( parent_ssn, school_name,school_address ),
      foreign key(parent_ssn) references Parents on update cascade on delete cascade,
      foreign key(school_name,school_address) references Schools on update cascade on delete cascade
      );
       
    create table Courses(
      course_code varchar(20) primary key,
      name varchar(100),
      description varchar(500),
      grade int check(grade >=1 and grade <= 12),
      school_name varchar(50),
      school_address varchar(50),
      foreign key(school_name,school_address) references Schools on update cascade on delete cascade
    );
     
    create table Course_isprequisiteof_Course(
        course1_code varchar(20),
        course2_code varchar(20),
        primary key(course1_code,course2_code),
        foreign key(course1_code) references Courses on update no action on delete no action,
        foreign key(course2_code) references Courses on update no action on delete no action
        );
 
 
 
create table Employees(
employee_id int primary key identity,
first_name varchar(20),
middle_name varchar(20),
last_name varchar(20),
username varchar(20) unique,
password varchar(20),
address varchar(30),
age as (year(current_timestamp) - year(birth_date)),
gender char(1),
email varchar(50) unique,
birth_date date not null, /*tweety beyes2al laih not null ?*/
salary int,
school_name varchar(50),
school_address varchar(50),
foreign key (school_name,school_address) references Schools on update set Null on delete set Null
);
  
create table Teachers(
  employee_id int primary key,
  start_date date,
  years_of_experience as (year(current_timestamp) - year(start_date)),
  foreign key(employee_id) references Employees on update cascade on delete cascade
);
  
     create table Course_has_Students(
      course_code varchar(20),
      student_id int,
      child_ssn int,
      teacher_id int,
      foreign key(course_code) references Courses on update cascade on delete cascade,
      foreign key(student_id,child_ssn) references Students on update no action on delete no action,/* 3ashan ashil el errors*/
      foreign key(teacher_id) references Teachers on update no action on delete no action,/* 3ashan ashil el errors*/
      primary key(student_id,child_ssn,course_code)
      );
create table Supervisors(
  supervisor_id int primary key ,
  Foreign key(supervisor_id) references Teachers on update cascade on delete cascade /*no action 3ashan el errors */
);
create table Others(
  other_id int primary key,
  supervisor_id int ,
  foreign key(other_id) references Teachers on update no action on delete no action,/*no action 3ashan el errors */
  foreign key(supervisor_id) references Supervisors on update cascade on delete cascade
  );
  
  create table Parent_rate_Teacher(
    parent_SSN int,
    teacher_id int ,
    rating int check(rating >=0 and rating <= 5)
    primary key(parent_SSN, teacher_id),
    foreign key(parent_SSN) references Parents on update cascade on delete cascade,
    foreign key(teacher_id) references Teachers on update cascade on delete cascade
    );
   
 
  create table Questions(
    course_code varchar(20),
    student_id int,
    child_ssn int,
    date datetime not null ,
    question varchar(500),
    answer varchar(500),
    teacher_id int,
    foreign key(teacher_id) references Teachers on update cascade on delete cascade,
    foreign key(course_code) references Courses on update no action on delete no action,
    foreign key(student_id,child_ssn) references Students on update no action on delete no action,
    primary key(course_code, student_id, date, teacher_id)
  );
    create table Assignments(
	course_code varchar(20),
	teacher_id int,
	post_date datetime not null,
	due_date datetime not null,
	duration as post_date - due_date,
	title varchar(50),
	content varchar(500),
	primary key(course_code, teacher_id,post_date),
	foreign key(course_code) references Courses on update no action on delete no action, /* tweety no action 3ashan errors */
	foreign key(teacher_id) references Teachers on update no action on delete no action  /* tweety no action 3ashan errors */
   );
  
   create table Assignmet_gradedby_teacher(
 	course_code varchar(20),
 	teacher_id int,
 	student_id int,
	post_date datetime not null,
	child_ssn int,
 	score int,
 	primary key(course_code, teacher_id, student_id,post_date),
 	foreign key(course_code) references Courses on update no action  on delete no action ,
 	foreign key(teacher_id) references Teachers on update cascade on delete cascade,
 	foreign key(student_id,child_ssn) references Students on update no action  on delete no action,
	foreign key(course_code,teacher_id,post_date) references Assignments 
 	
   );
   
   create table Assignment_solved_by_student(
     course_code varchar(20),
     teacher_id int,
     student_id int,
     child_ssn int,
     post_date datetime,
     answer varchar(500),
     primary key(course_code, teacher_id, student_id,post_date,child_ssn),
     foreign key(course_code, teacher_id,post_date) references Assignments on update no action on delete no action,
     foreign key(course_code) references Courses on update no action on delete no action,
     foreign key(teacher_id) references Teachers on update cascade on delete cascade,
     foreign key(student_id, child_ssn) references Students on update no action on delete no action
   );
  create table Reports(
    teacher_id int,
    student_id int,
    child_ssn int,
    date datetime not null,
    teacher_comment varchar(500),
    primary key(teacher_id, student_id, date),
    foreign key(teacher_id) references Teachers on update cascade on delete cascade,
    foreign key(student_id, child_ssn) references Students on update no action on delete no action
  );
   
   create table Parent_reply_Report(
   teacher_id int,
   student_id int,
   child_ssn int,
   parent_SSN int,
   date datetime not null,
   reply varchar(500),
   primary key(teacher_id, student_id, parent_SSN, date),
    foreign key(teacher_id) references Teachers on update cascade on delete cascade,
    foreign key(student_id,child_ssn) references Students on update no action on delete no action,
    foreign key(parent_SSN) references Parents on update cascade on delete cascade
 );
 create table Admins(
   employee_id int primary key,
   foreign key(employee_id) references Employees on update cascade on delete cascade
 );
  
 create table Announcements(
   date datetime,
   title varchar(20),
   admin_id int,
   description varchar(500),
   type varchar(20),
   primary key(date, title),
   foreign key(admin_id) references Admins on update cascade on delete no action
 );
  
  
 create table Activities(
   date datetime,
   location varchar(20),
   description varchar(500),
   type varchar(20),
   equipment varchar(500),
   admin_id int,
   teacher_id int,
   primary key(date, location),
   foreign key(admin_id) references Admins on update no action on delete no action,
   foreign key(teacher_id) references Teachers on update cascade on delete cascade
 );
 
 create table Activity_has_student(
    date datetime,
    location varchar(20),
    student_id int,
    child_ssn int,
   primary key(date,location, student_id,child_ssn),
   foreign key(date,location) references Activities on update no action on delete no action,
   foreign key(student_id,child_ssn) references Students on update cascade on delete cascade
 );
  
 create table Clubs(
   club_name varchar(20) primary key,
   purpose varchar(500)
 );
  
 create table club_offered_by_high_school(
   club_name varchar(20),
   school_name varchar(50),
   school_address varchar(50),
   primary key(club_name, school_name, school_address),
   foreign key(club_name) references Clubs on update cascade on delete cascade,
   foreign key(school_name,school_address) references Schools on update cascade on delete cascade
 );
  
 create table Club_has_Student(
   club_name varchar(20),
   student_id int,
   child_ssn int,
   primary key(club_name, student_id,child_ssn),
   foreign key(club_name) references Clubs on update cascade on delete cascade,
   foreign key(student_id,child_ssn) references Students on update cascade on delete cascade
 );
 