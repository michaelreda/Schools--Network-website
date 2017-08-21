/*1.1 Create a school with its information: school name, address, phone number, email, general information, vision, mission, main language, type(national, international) and fees */
create proc create_a_school  /* supplies and grades and akter mn level*/
@name varchar(50),@address varchar(50), @phone varchar(20),@info text,@email varchar(50),@type varchar(20),
@language varchar(20),@vision varchar(300),@mission varchar(300),@URL varchar(50),@fees int,@level varchar(20)
as
insert into Schools values (@name,@address,@info,@phone,@email,@type,@language,@vision,@mission,@URL,@fees)
 
if @level = 'elementary'
insert into Elimentary_Schools values(@name,@address)
 
if @level = 'middle'
insert into Middle_Schools values(@name,@address)
 
if @level = 'high'
insert into High_Schools values(@name,@address)
 
 
/*1.2 Add courses to the system with all of its information: course code, course name, grade, description and prerequisite course(s). */
create proc add_course
@code varchar(20),@name varchar(100), @description varchar(500),@grade int,@school_name varchar(50),@school_address varchar(50)
as
insert into Courses values (@code,@name,@description,@grade,@school_name,@school_address)

create proc add_prerequisites
@prerequisite_course varchar(20), @course varchar(20)
as
insert into Course_isprequisiteof_Course 
 values(  @prerequisite_course ,@course ) 


 
/*1.3 Add admins to the system with their information: first name, middle name, last name, birthdate,
address, email, username, password, and gender. Given the school name, I should assign admins
to work in this school. Note that the salary of the admin depends on the type of the school. The
salary of an admin working in a national school is 3000 EGP, and that working in an international
school is 5000 EGP */ 
 
create proc add_admin
@fn varchar(20),@mn varchar(20), @ln varchar(20),@username varchar(20),@passsword varchar(20),
@address varchar(30),@gender char(1),@email varchar(50),@birthdate date,@school_name varchar(50),@school_address varchar(50)
as
DECLARE @salary int
DECLARE @type varchar(20)
set @type=( select s.type from Schools s where s.school_name = @school_name and s.school_address = @school_address)
if @type = 'national'
set @salary = 3000
Else
set @salary = 5000
insert into Employees  (first_name, middle_name, last_name, username,password,address, gender,email,birth_date,salary,school_name,school_address) 
values (@fn,@mn,@ln,@username,@passsword,@address,@gender,@email,@birthdate,@salary,@school_name,@school_address)
DECLARE @employee_id int
select @employee_id=e.employee_id from Employees e where e.username = @username or e.email=@email
insert into Admins values (@employee_id)
 
 
/*1.4- Delete a school from the database with all of its corresponding information. Students and employees
of this school should not be deleted from the system, but should not have a username and password
on the system until they are assigned to a new school again*/
 
create proc delete_school
@school_name varchar(50),@school_address varchar(50)
as
delete from Schools where school_name=@school_name and school_address =@school_address
 


 /*2.1 Search for any school by its name, address or its type (national/international) */
create proc search_in_schools
@name varchar(50),@address varchar(100),@type varchar (20)
as
select * from Schools s
        where s.school_name = @name or s.school_address = @address or s.type=@type
 

 
 
/*2.2 View a list of all available schools on the system categorized by their level.*/
create proc view_schools
as
 
(select 'Elimentary' as level, * from Elimentary_Schools
Union
select 'Middle' as level, * from Middle_Schools
Union
select 'High' as level, * from High_Schools
)order by level,school_name,school_address
 

 
/*2.3 View the information of a certain school along with the reviews written about it and teachers
teaching in this school. */
create proc view_info_reviews_teachers_of_school2
@name varchar(50),@address varchar(100)
as
select s.*,e.first_name+' '+e.middle_name+' '+e.last_name as teacher_name,p.first_name+' '+p.last_name as reviewer_name,prs.review from Schools s 
			inner join Parent_review_School prs on s.school_name=prs.school_name and s.school_address=prs.school_address
			inner join Parents p on prs.parent_ssn = p.parent_ssn
			inner join Employees e on s.school_name=e.school_name and s.school_address=e.school_address
			inner join Teachers t on e.employee_id=t.employee_id
			where s.school_name=@name and  s.school_address = @address



  create proc view_reviews_of_school2
@name varchar(50),@address varchar(100)
as
select p.first_name+' '+p.last_name as reviewer_name,prs.review from Schools s 
			inner join Parent_review_School prs on s.school_name=prs.school_name and s.school_address=prs.school_address
			inner join Parents p on prs.parent_ssn = p.parent_ssn
			where s.school_name=@name and  s.school_address = @address
		
create proc view_announcements_of_school2
@name varchar(50),@address varchar(100)
as
select a.* from Schools s 
			inner join Employees e on s.school_name=e.school_name and s.school_address=e.school_address
			inner join Announcements a on a.admin_id = e.employee_id
			where s.school_name=@name and  s.school_address = @address
		

/* 3.1 View and verify teachers who signed up as employees of the school I am responsible of, and assign
to them a unique username and password. The salary of a teacher is calculated as follows: years of
experience * 500 EGP.*/
create proc view_teachers_signed_up
@employee_id int
as
Declare @school_name varchar(50)
Declare @school_address varchar(50)
select @school_name=school_name ,@school_address = school_address from Employees where employee_id = @employee_id
 
select e.* from  Employees e
            where e.school_name=@school_name and e.school_address=@school_address and e.username is Null and e.password is Null
 

 
create proc view_all_teachers_in_my_school
@employee_id int
as
Declare @school_name varchar(50)
Declare @school_address varchar(50)
select @school_name=school_name ,@school_address = school_address from Employees where employee_id = @employee_id
 
select * from  Employees e inner join
             Teachers t on t.employee_id=e.employee_id
            where e.school_name=@school_name and e.school_address=@school_address 
             

 
create proc verify_teacher
@unverified_emp_id int
as
declare @rand_pass int
select  @rand_pass=  cast( FLOOR(RAND()*(999999-100000)+100000) as int)
update Employees set username=first_name+cast(employee_id as varchar), password = @rand_pass where employee_id=@unverified_emp_id
 
insert into Teachers values(@unverified_emp_id,current_timestamp)
insert into Others (other_id) values(@unverified_emp_id)
 
 create proc set_salary
@unverified_emp_id int
as
 declare @exp_years int
select @exp_years=years_of_experience from Teachers where @unverified_emp_id= employee_id
declare @salary int
set @salary = 500 + 500*@exp_years
update Employees set salary= cast(@salary as int) where employee_id=@unverified_emp_id

/*3.2 View and verify students who enrolled to the school I am responsible of, and assign to them a
unique username and password. */
create proc view_unverified_students
@employee_id int
as
Declare @school_name varchar(50)
Declare @school_address varchar(50)
select @school_name=school_name ,@school_address = school_address from Employees where employee_id = @employee_id
 
select * from  Children c
            inner join Students s on c.child_ssn=s.child_ssn
 where s.school_name=@school_name and s.school_address=@school_address and s.username is Null and s.password is Null
 

 
create proc view_all_students_in_my_school
@employee_id int
as
Declare @school_name varchar(50)
Declare @school_address varchar(50)
select @school_name=school_name ,@school_address = school_address from Employees where employee_id = @employee_id
 
select * from  Children c
            inner join Students s on c.child_ssn=s.child_ssn
            where s.school_name=@school_name and s.school_address=@school_address 
 
create proc verify_student
@unverified_student int
as
declare @fn varchar(20)
select @fn=first_name from  Children c
            inner join Students s on c.child_ssn=s.child_ssn
            where s.student_id=@unverified_student
 
declare @rand_pass int
select  @rand_pass=  cast( FLOOR(RAND()*(999999-100000)+100000) as int)
update Students set username=@fn+cast(student_id as varchar), password = @rand_pass where student_id=@unverified_student
 

 
 create proc view_applying_students
 @school_n varchar(50),@school_a varchar(50) 
 as
 select c.first_name+' '+c.last_name as 'student_name' ,c.child_ssn, p.first_name+' '+p.last_name as 'parent_name' 
 from Child_Parent_applyin_School a inner join Children c on a.child_ssn = c.child_ssn 
 inner join Parents p on a.parent_ssn = p.parent_ssn 
 where a.accepted is null  and a.school_address=@school_a and school_name = @school_n

 
/* 3.3 Add other admins to the school I am working in. An admin has first name, middle name, last name,
birthdate, address, email, username, password, and gender. Note that the salary of the admin
depends on the type of the school. */
create proc add_admin_to_my_school
@fn varchar(20),@mn varchar(20), @ln varchar(20),@username varchar(20),@passsword varchar(20),
@address varchar(30),@gender char(1),@email varchar(50),@birthdate date,@myemployee_id int
as
Declare @school_name varchar(50)
Declare @school_address varchar(50)
select @school_name=school_name ,@school_address = school_address from Employees where employee_id = @myemployee_id
DECLARE @salary int
DECLARE @type varchar(20)
set @type=( select s.type from Schools s where s.school_name = @school_name and s.school_address = @school_address)
if @type = 'national'
set @salary = 3000
Else
set @salary = 5000
insert into Employees  (first_name, middle_name, last_name, username,password,address, gender,email,birth_date,salary,school_name,school_address) 
values (@fn,@mn,@ln,@username,@passsword,@address,@gender,@email,@birthdate,@salary,@school_name,@school_address)
DECLARE @employee_id int
select @employee_id=e.employee_id from Employees e where e.username = @username or e.email=@email
insert into Admins values (@employee_id)
 
/* 3.4 Delete employees and students from the system. (considering of my school only) except me*/
create proc delete_employees_and_students_in_my_school
@employee_id int
as
Declare @school_name varchar(50)
Declare @school_address varchar(50)
select @school_name=school_name ,@school_address = school_address from Employees where employee_id = @employee_id

delete from Activity_has_student where student_id  in (select student_id from Students where school_name=@school_name and school_address =@school_address)
delete from Club_has_Student where student_id  in (select student_id from Students where school_name=@school_name and school_address =@school_address)
delete from Course_has_Students where student_id  in (select student_id from Students where school_name=@school_name and school_address =@school_address)
delete from Reports where student_id  in (select student_id from Students where school_name=@school_name and school_address =@school_address)
delete from Parent_reply_Report where student_id  in (select student_id from Students where school_name=@school_name and school_address =@school_address)

delete from Students where school_name=@school_name and school_address =@school_address
delete from Employees where school_name=@school_name and school_address =@school_address and employee_id<>@employee_id
delete from Teachers where employee_id not in (select employee_id from Employees)
delete from Admins where employee_id not in (select employee_id from Employees)
delete from Others where other_id not in (select employee_id from Employees)
delete from Supervisors where supervisor_id not in (select employee_id from Employees)
delete from Parent_reply_Report where  teacher_id not in (select employee_id from Employees)
delete from Parent_rate_Teacher where  teacher_id not in (select employee_id from Employees)
 

 
 
/*3.5 Edit the information of the school I am working in. */
create proc update_a_school
@name varchar(50),@address varchar(50), @phone varchar(20),@info text,@email varchar(50),@type varchar(20),
@language varchar(20),@vision varchar(300),@mission varchar(300),@URL varchar(50),@fees int,@employee_id int
as
Declare @school_name varchar(50)
Declare @school_address varchar(50)
select @school_name=school_name ,@school_address = school_address from Employees where employee_id = @employee_id
 
if @name is not Null
UPDATE  Schools set school_name =@name where school_name=@school_name and school_address =@school_address
if @address is not Null
UPDATE  Schools set  school_address=@address where school_name=@school_name and school_address =@school_address
if @info is not Null
UPDATE  Schools set   general_info= @info where school_name=@school_name and school_address =@school_address
if @phone is not Null
UPDATE  Schools set   phone_number= @phone where school_name=@school_name and school_address =@school_address
if @email is not Null
UPDATE  Schools set    email=@email where school_name=@school_name and school_address =@school_address
if @type is not Null
UPDATE  Schools set    type = @type where school_name=@school_name and school_address =@school_address
if @language is not Null
UPDATE  Schools set    main_language= @language where school_name=@school_name and school_address =@school_address
if @vision is not Null
UPDATE  Schools set    vision = @vision where school_name=@school_name and school_address =@school_address
if @mission is not Null
UPDATE  Schools set    mission=@mission where school_name=@school_name and school_address =@school_address
if @URL is not Null
UPDATE  Schools set    URL= @URL where school_name=@school_name and school_address =@school_address
if @fees is not Null
UPDATE  Schools set    fees =@fees where school_name=@school_name and school_address =@school_address
 
 
/* 3.6 Post announcements with the following information: date, title, description and type (events, news,
trips ...etc)*/
 
create proc post_announcements
@title varchar(20), @admin_id int,@description text,@type varchar(20)
as
insert into Announcements values (GETDATE(),@title,@admin_id,@description,@type)
 
/*3.7 Create activities and assign every activity to a certain teacher. An activity has its own date, location in school, type, equipment(if any), and description. */
create proc create_activities
@date datetime,@location varchar(20), @description text,@type varchar(20),@equipment text,@admin_id int,@teacher_id int
as
insert into Activities values (@date,@location,@description,@type,@equipment,@admin_id,@teacher_id)
 

 exec create_activities "2016-12-12" , "a1" , "asdasd" , "art" , "qweqew" , "3" , "29"

/*3.8 Change the teacher assigned to an activity */
create proc change_assigned_teacher_to_activity
@date datetime,@location varchar(20), @teacher_id int
as
update Activities set teacher_id = @teacher_id where date=@date and location=@location
 
/*3.9 Assign teachers to courses that are taught in my school based on the levels it offers. */
create proc assign_teachers_to_courses2
@course_code varchar(20) , @teacher_id int, @admin_id int
as
Declare @school_name varchar(50)
Declare @school_address varchar(50)
select @school_name=school_name ,@school_address = school_address from Employees where employee_id = @admin_id
 
 /* making sure that this course is given in admin's school*/
Declare @course_is_in_school int =0
select @course_is_in_school=LEN(course_code) from Courses where  @school_name=school_name and @school_address = school_address and @course_code =course_code
 
 
if @course_is_in_school>0
update Course_has_Students set teacher_id = @teacher_id where @course_code =course_code


create proc assign_teachers_to_courses
@course_code varchar(20) , @teacher_id int, @admin_id int
as
Declare @school_name varchar(50)
Declare @school_address varchar(50)
select @school_name=school_name ,@school_address = school_address from Employees where employee_id = @admin_id
 
/* making sure that this course is given in admin's school*/
Declare @course_is_in_school int =0
select @course_is_in_school=LEN(course_code) from Courses where  @school_name=school_name and @school_address = school_address and @course_code =course_code
 
 
if @course_is_in_school>0
update Course_has_Students set teacher_id = @teacher_id where @course_code =course_code
 
 
/*3.10 Assign teachers to be supervisors to other teachers. */ 
create proc assign_supervisor_to_teacher
@supervisor_id varchar(20) , @teacher_id int
as
Declare @is_supervisor int =0
Declare @is_eligible int =0
select @is_supervisor=LEN(supervisor_id) from Supervisors where supervisor_id = @supervisor_id 
 
if @is_supervisor=0
begin
select @is_eligible=LEN(employee_id) from Teachers where employee_id = @supervisor_id and years_of_experience>=15
 
if @is_eligible>0
begin
insert into Supervisors values(@supervisor_id)
set @is_supervisor=1
end
else
print 'this teacher can not be a supervisor'
end
if @is_supervisor=1
update Others set supervisor_id = @supervisor_id where other_id =@teacher_id
 
/*3.11 Accept or reject the application submitted by parents to their children */
create proc accept_reject_applicants
@acceptance bit, @child_ssn int ,@admin_id int
as
Declare @school_name varchar(50)
Declare @school_address varchar(50)
select @school_name=school_name ,@school_address = school_address from Employees where employee_id = @admin_id
 
update Child_Parent_applyin_School set accepted=@acceptance
where @child_ssn=child_ssn and @school_name= school_name and @school_address=school_address
 


 /*4.1 Sign up by providing my first name, middle name, last name, birthdate, address, email, and gender. */
create proc teacher_signup
@fn varchar(20),@mn varchar(20), @ln varchar(20),@birthdate datetime,@address varchar(30),@email varchar(50),@gender char(1),@s_name varchar(50),@s_address varchar(50)
as
insert into Employees (first_name,middle_name,last_name,birth_date,address, email,gender,school_name, school_address)
values(@fn,@mn, @ln,@birthdate ,@address,@email,@gender,@s_name, @s_address)
/*when verified by admin will be added to teachers and others table*/
 
/*4.2 View a list of courses’ names I teach categorized by level and grade. */
create proc view_courses
@employee_id int
as
 
(select Distinct 'Elimentary' as level, c.grade, c.name,c.course_code from  Course_has_Students csh inner join
             Courses c on c.course_code=csh.course_code
             where @employee_id = csh.teacher_id and c.grade between 1 and 6
             
Union
select Distinct 'Middle' as level, c.grade, c.name,c.course_code from  Course_has_Students csh inner join
             Courses c on c.course_code=csh.course_code
             where @employee_id = csh.teacher_id and c.grade between 7 and 9
             
Union
select Distinct 'High' as level, c.grade, c.name,c.course_code from  Course_has_Students csh inner join
             Courses c on c.course_code=csh.course_code
             where @employee_id = csh.teacher_id and c.grade between 10 and 12
            )Order by level, c.grade,c.name
 
 
 
/*4.3 Post assignments for the course(s) I teach. Every assignment has a posting date, due date and
content. */
create proc post_adssignment
@course_code varchar(20),@teacher_id int,@due_date datetime,@title varchar(50),@content text
as
declare @teacher_has_this_course as int = 0
select @teacher_has_this_course= len(course_code) from Course_has_Students where teacher_id=@teacher_id and @course_code=course_code
 
if @teacher_has_this_course>0
insert into Assignments values(@course_code,@teacher_id,GETDATE(),@due_date,@title,@content)
else
print 'this course does not belong to you'
 
/*4.4 View the students’ solutions for the assignments I posted ordered by students’ ids. */

create proc get_assignments_solutions2
@teacher_id int,@post_date datetime
as
select Distinct a.post_date,  a.course_code,a.student_id,a.child_ssn,c.first_name+' '+c.last_name as name,a.answer from Assignment_solved_by_student a
                        inner join Children c on c.child_ssn=a.child_ssn
                            where @teacher_id = a.teacher_id and a.post_date=@post_date
                            order by a.student_id

create proc get_assignments_solutions
@teacher_id int
as
select Distinct a.student_id,c.first_name+' '+c.last_name as name,a.answer from Assignment_solved_by_student a
                        inner join Children c on c.child_ssn=a.child_ssn
                            where @teacher_id = teacher_id
                            order by a.student_id
 
/*4.5 Grade the students’ solutions for the assignments I posted */
create proc grade_assignments
@course_code varchar(20),@teacher_id int,@student_id int,@post_date datetime,@child_ssn int,@score int
as
/* we didn't check if score is more than final grade as there might be some bonus*/
insert into Assignmet_gradedby_teacher values (@course_code,@teacher_id ,@student_id ,@post_date,@child_ssn ,@score )
 
/*4.6 Delete assignments. */
create proc delete_assignment
@course_code varchar(20),@teacher_id int,@post_date datetime
as
delete from Teacher_grade_Assignment where @course_code=course_code and @teacher_id=teacher_id and @post_date=post_date
 
/*4.7 Write monthly reports about every student I teach. A report is issued on a specific date to a specific
student and contains my comment. */
create proc write_report
@teacher_id int, @student_id int,@child_ssn int,@teacher_comment varchar(500)
as
declare @teacher_has_this_student as int = 0
select @teacher_has_this_student= len(student_id) from Course_has_Students where teacher_id=@teacher_id and @student_id=student_id
 
if @teacher_has_this_student>0
insert into Reports values(@teacher_id, @student_id,@child_ssn,GETDATE(),@teacher_comment)
else
print 'you do not teach this student'
 
/*4.8 View the questions asked by the students for each course I teach. */
create proc view_questions1
@teacher_id int, @course_code varchar(30)
as
select Distinct q.course_code,q.student_id,c.first_name+' '+c.last_name as name,q.question,q.date from Questions q
                        inner join Children c on c.child_ssn=q.child_ssn
                            where @teacher_id = teacher_id and @course_code = q.course_code and q.answer is Null
                            order by q.course_code
 

create proc view_questions
@teacher_id int
as
select Distinct q.course_code,q.student_id,c.first_name+' '+c.last_name as name,q.question from Questions q
                        inner join Children c on c.child_ssn=q.child_ssn
                            where @teacher_id = teacher_id
                            order by q.course_code
 
/*4.9 Answer the questions asked by the students for each course I teach. */
create proc answer_questions
@course_code varchar(20), @student_id int, @date datetime, @teacher_id int,@answer varchar(500)
as
update Questions set answer = @answer
where @course_code = course_code and @student_id = student_id and @date = date and @teacher_id = teacher_id
 
/* 4.10 View a list of students that i teach categorized by the grade and ordered by their name (first name
and last name).*/
create proc view_my_students3
@teacher_id int ,@course_code varchar(20)
as
select Distinct s.grade,c.first_name,c.last_name,s.student_id,c.child_ssn from Course_has_Students chs
                        inner join Children c on c.child_ssn=chs.child_ssn
                        inner join Students s on s.student_id = chs.student_id
                            where @teacher_id = teacher_id and chs.course_code=@course_code
                            group by s.grade,c.first_name,c.last_name,s.student_id,c.child_ssn
                            order by c.first_name,c.last_name
 

create proc view_my_students
@teacher_id int
as
select Distinct s.grade,c.first_name,c.last_name from Course_has_Students chs
                        inner join Children c on c.child_ssn=chs.child_ssn
                        inner join Students s on s.student_id = chs.student_id
                            where @teacher_id = teacher_id
                            group by s.grade,c.first_name,c.last_name
                            order by c.first_name,c.last_name

 view_my_students 29
/*4.11 View a list of students that did not join any activity. */
create proc students_not_in_activity /* in my school */
@teacher_id int
as
select Distinct c.first_name,c.last_name from Employees e
                        inner join Students s on s.school_name = e.school_name and s.school_address=e.school_address
                        inner join Children c on c.child_ssn=s.child_ssn
                            where @teacher_id = employee_id and  s.student_id not in(
                            SELECT student_id 
                                 FROM Activity_has_student
                            )
                         

 
/*4.12 Display the name of the high school student who is currently a member of the greatest number of
clubs. */
/* ... in teacher's school */
create proc student_joining_greatest_number_of_clubs
@teacher_id int
as 

select top 1 c.first_name+' '+c.last_name as name from club_has_student chs
				inner join Children c on c.child_ssn=chs.child_ssn
				where chs.student_id in(select Distinct s.student_id from Employees e
					inner join students s on e.school_address=s.school_address and e.school_name=s.school_name
					inner join High_Schools hs on hs.school_address=s.school_address and hs.school_name=s.school_name
					where @teacher_id= e.employee_id)
				group by c.first_name, c.last_name
				order by count(*) desc




/* 5.1:parent Signup by providing my name(ﬁrstnameandlastname),contactemail,mobilenumber(s),address, home phone number, a unique username and password. */

	create proc parent_signup
		@ssn int, @first_name varchar(20),@last_name varchar(20),
		@username varchar(20) ,@password varchar(20),
		@address varchar(40),@gender char(1) ,@email varchar(50) ,@home_num varchar(12)
	as 
		insert into Parents ( parent_ssn,first_name ,last_name ,username ,password ,address ,gender ,email ,home_num )
		values(@ssn,@first_name ,@last_name ,@username ,@password ,@address ,@gender  ,@email ,@home_num )

	create proc insert_parent_mobile_numbers
		@parent_ssn int, @mobile_num varchar(12)
	as 
		insert into Mobile_number_of_parent( parent_ssn,mobile_num)
		values(@parent_ssn,@mobile_num )
 
 
/*5.2  Apply for my children in any school. For each child I should provide his/her social security number (SSN), name, birthdate, and gender */
	create proc parent_apply_for_child
		@parent_ssn int, @child_ssn int, @f_name varchar(20), @l_name varchar(20) , 
		@birthdate datetime, @gender varchar(1), @s_name varchar(50), @s_address varchar(50) 
	as 
	insert into Children(child_ssn, first_name,last_name,birth_date,gender) 
		values (@child_ssn, @f_name,@l_name, @birthdate,@gender)
	insert into Child_has_Parent values(@child_ssn,@parent_ssn)
	insert into Child_Parent_applyin_School values(@child_ssn, @parent_ssn,@s_name,@s_address,null )
 
/*5.3 View a list of schools that accepted my children categorized by child. */
 
   
	 create proc Parent_view_schools_accepting_child
        @parent_ssn int
    as
        select s.school_name, s.school_address, c.child_ssn, c.first_name
        from Child_Parent_applyin_School s inner join Children c on c.child_ssn=s.child_ssn
        where @parent_ssn=s.parent_ssn and accepted=1
 
 
/*5.4 Choose one of the schools that accepted my child to enroll him/her. The child remains unveriﬁed (no username and password, 
refer to user story 2 for the administrator) until the admin veriﬁes him.*/
 
 
        create proc Parent_choose_school
            @child_ssn int, @school_name varchar(50), @school_address varchar(50), @grade tinyint
        as
            insert into Students(child_ssn, school_name,school_address,username,password,grade)
            values(@child_ssn, @school_name, @school_address, null, null, @grade)
 
/*5.5:
     View reports written about my children by their teachers. */
 
    create proc parent_view_child_report
        @parent_ssn int
    as
        select c.child_ssn,r.teacher_id,r.student_id,c.first_name,c.last_name,r.teacher_comment
        from Reports r inner join Child_has_Parent cp on r.child_ssn=cp.child_ssn
        inner join Children c on c.child_ssn=r.child_ssn
        where  cp.parent_ssn=@parent_ssn
     
 
    /* 5.6 Reply to reports written about my children by their teachers.*/
     
    create proc Parent_replyto_report
@teacher_id int,@student_id int,@child_ssn int,@parent_ssn int, @reply varchar(500)
as
declare @date datetime, @t_id int
select @date=r.date, @t_id=r.teacher_id
from Reports r 
where  r.teacher_id=@teacher_id and r.child_ssn=@child_ssn
insert into Parent_reply_Report values(@t_id, @student_id,@child_ssn,@parent_ssn,@date,@reply)
 
     
 
/* 5.7:View a list of all schools of all my children ordered by its name. */
 
 
 
   create proc parent_view_children_schools
        @parent_ssn int
    as
        select Distinct s.school_name,s.school_address,c.first_name
        from Students s inner join Child_has_Parent cp on s.child_ssn=cp.child_ssn
        inner join Children c on c.child_ssn = cp.child_ssn
        where cp.parent_ssn=@parent_ssn 
        order by s.school_name,c.first_name
		
 
 
/*5.8: View the announcements posted within the past 10 days about a school if one of my children is enrolled in it. */
         
        create proc Parents_view_latest_announcements1
@parent_ssn int
as
declare @name varchar(50), @address varchar(50) 
 
select @name=s.school_name, @address=s.school_address
from (Child_has_parent c inner join Students s  on c.child_ssn=s.child_ssn)  
where @parent_ssn=c.parent_ssn
 
select a.date, a.title, a.type, a.description  
from  Announcements a inner join Admins m on a.admin_id= m.employee_id inner join Employees e on e.employee_id =m.employee_id
where e.school_name=@name and e.school_address=@address and (day(a.date)-day(current_timestamp)<11)  
 
 
/*5.9: Rate any teacher that teaches my children*/
 
create proc Parent_rate_teacher_proc
@parent_ssn int, @teacher_id int ,@rating int
as
declare @ssn int
declare @t_id int
 
select @ssn=s.parent_ssn, @t_id=c.teacher_id
    from Child_has_Parent s inner join Course_has_Students c on s.child_ssn=c.child_ssn
    where s.parent_ssn=@parent_ssn and @teacher_id=c.teacher_id
      
    if @ssn=@parent_ssn and @t_id=@teacher_id
insert into Parent_rate_Teacher values(@parent_ssn, @teacher_id, @rating)
 
 
/*5.10: Write reviews about my children’s school(s). */
 
create proc Parent_write_review1
@parent_ssn int, @s_name varchar(50), @s_address varchar(50), @review varchar(500)
as
declare @name varchar(50),@address varchar(50) 
select @name=s.school_name, @address=s.school_address
from (Child_has_parent c inner join Students s  on c.child_ssn=s.child_ssn)  
where @parent_ssn=c.parent_ssn and s.school_address = @s_address and s.school_name=@s_name
 
if(@s_name=@name and @s_address=@address)
insert into Parent_review_School values(@parent_ssn, @s_name,@s_address, @review)
else
print 'your children are not in this school'
 
/*5.11 Delete a review that i have written.*/
 
create proc Parent_delete_review
@parent_ssn int, @s_name varchar(50), @s_address varchar(50)
as
declare @name varchar(50),@address varchar(50) 
select @name=s.school_name, @address=s.school_address
from (Child_has_parent c inner join Students s  on c.child_ssn=s.child_ssn)  
where @parent_ssn=c.parent_ssn  and s.school_address = @s_address and s.school_name=@s_name
 
if(@s_name=@name and @s_address=@address)
delete from Parent_review_School where @s_name=school_name and @s_address=school_address and @parent_ssn=parent_ssn
else
print 'your children are not in this school'
 
 
 
/*5.12 View the overall rating of a teacher, where the overall rating is calculated as the
        average of ratings provided by parents to that teacher. */
         
create proc View_overall_rating
@teacher_id int
as
select avg(t.rating) as rating
from Parent_rate_Teacher t
where t.teacher_id=@teacher_id
 
 
/*5.13 View the top 10 schools with the highest number of reviews or highest number of enrolled students. 
    This should exclude schools that my children are enrolled in. */
 
    create proc View_top_ten_schools_by_reviews
as
select top 10 school_name, school_address 
from Parent_review_School
group by school_name,school_address
order by count(parent_ssn) desc
 
create proc View_top_ten_schools_by_students
as
select top 10 school_name,school_address
from Students
group by school_name,school_address
order by count(child_ssn) desc
 
 
 
 
 
/* 5.14 Find the international school which has a reputation higher than all national schools, i.e. has the highest number of reviews.*/
create proc popular_international_school
as
declare @max_rev_national int
  
 select top 1 @max_rev_national= count(*) from Parent_review_School prs
        inner join Schools s on s.school_name=prs.school_name and s.school_address=prs.school_address
        where s.type='national'
        GROUP BY s.school_name,s.school_address
        ORDER BY COUNT(*) DESC
         
select s.school_name,s.school_address from Parent_review_School prs
        inner join Schools s on s.school_name=prs.school_name and s.school_address=prs.school_address
        where s.type='international'
        GROUP BY s.school_name,s.school_address
        having count(*) > @max_rev_national
        ORDER BY COUNT(*) DESC
 
 
 /* new for GUI by andrea*/
 
 create proc view_review
 @parent_ssn int
 as
 select r.school_name, r.school_address, r.review
 from Parent_review_School r
 where r.parent_ssn=@parent_ssn

 
 create proc view_children_teachers
 @parent_ssn int
 as
 select Distinct first_name, middle_name, last_name, teacher_id
 from Child_has_Parent p inner join Course_has_Students s on p.child_ssn=s.child_ssn inner join Employees e on e.employee_id=s.teacher_id
 where p.parent_ssn=@parent_ssn 
 
 


/*______________________________________*/
/*___________ STUDENT STORY ____________*/
/*______________________________________*/
 
/*6.1 Update my account information except for the username. */
 
create proc Student_update_account  /* + birth date*/
@student_id int, @child_ssn int,@password varchar(20),@first_name varchar(20),@last_name varchar(20),@birth_date date
as
update  Students 
 set password=@password
 where student_id =@student_id and @child_ssn=child_ssn

update  Children 
 set first_name=@first_name,last_name=@last_name, birth_date=@birth_date
 where @child_ssn=child_ssn
    
  
  
 /*6.2 View a list of courses’ names assigned to me based on my grade ordered by name. */
  
 create proc View_assigned_couses
@grade tinyint,@school_name varchar(50),  @school_address varchar(50)
as
select Distinct c.course_code,c.name
from Courses c
where c.grade=@grade and c.school_name=@school_name and c.school_address=@school_address
order by name

  
  
/*6.3 Post questions I have about a certain course. */
 
 

create proc Ask_question_in_course2
@course_code varchar(20), @student_id int, @child_ssn int,  @question varchar(500),@teacher_id int
as

insert into Questions (course_code, student_id, child_ssn,date, question,teacher_id)
	values(@course_code, @student_id, @child_ssn,current_timestamp, @question,@teacher_id )
 
 
 
 /*6.4 View all questions asked by other students on a certain course along with their answers. */
  
   create proc View_question_in_course
@course_code varchar(20)
as

select q.question, q.answer
from Questions q
where @course_code=q.course_code  and q.answer is not null
 
  
/*6.5 View the assignments posted for the courses I take.*/
 
create proc View_assignments
@student_id int, @child_ssn int
as
declare @codes varchar(20)
(select @codes=c.course_code 
        from Course_has_Students c
        where c.student_id=@student_id and c.child_ssn=@child_ssn) 
 
select  a.course_code, a.content, a.post_date, a.due_date
from Assignments a
where a.course_code=@codes
 
create proc assignments_in_course
@course_code varchar(20)
as
select *
		from Assignments
		where @course_code=course_code


create proc assignments_in_course2
@course_code varchar(20)
as
select *
		from Assignments
		where @course_code=course_code and due_date>GETDATE()
 
 
 /*6.6 Solve assignments posted for courses I take. */
  
 create proc Solve_assignments
 @course_code varchar(20),
     @teacher_id int,
     @student_id int,
	 @child_ssn int,
     @post_date datetime,
	 @answer varchar(500)
as
insert into Assignment_solved_by_student  values(@course_code,@teacher_id,@student_id,@child_ssn,@post_date,@answer)


  
  
/*6.7 View the grade of the assignments I solved per course. */
 
 
create proc View_assignment_grades
 
     @student_id int,
	 @child_ssn int
 as
select c.course_code, a.title,c.score 
from Assignmet_gradedby_teacher c
inner join Assignments a on a.post_date=c.post_date
where c.student_id=@student_id and c.child_ssn=@child_ssn

 
 /*6.8 View the announcements posted within the past 10 days about the school I am enrolled in. */
  
 create proc Students_view_latest_announcements2
@child_ssn int, @student_id int
as
declare @name varchar(50), @address varchar(50) 
 
select @name=s.school_name, @address=s.school_address
from  Students s   
where @child_ssn=s.child_ssn and @student_id=s.student_id
 
select a.date, a.title, a.type, a.description  
from  Announcements a inner join Admins m on a.admin_id= m.employee_id inner join Employees e on e.employee_id =m.employee_id
where e.school_name=@name and e.school_address=@address and (day(a.date)-day(current_timestamp)<11)  
  
  
  
/*6.9 View all the information about activities oﬀered by my school, as well as the teacher responsible for it. */
 
 
create proc Students_view_activities
@student_id int, @child_ssn int
as
declare @s_name varchar(50), @s_address varchar(50), @t_fname varchar(50), @t_lname varchar(50)

select date, location, description,equipment,type ,first_name,last_name
from Activities a inner join Employees e on a.teacher_id=e.employee_id inner join Students s on e.school_name=s.school_name and e.school_address=s.school_address
where s.child_ssn=@child_ssn and s.student_id=@student_id

 /*6.10 Apply for activities in my school on the condition that I can not join two activities of the same type on the same date. */
 create proc apply_for_activity
 @student_id int,@child_ssn int,@date datetime,@location varchar(20)
 as
 declare @type_new_activity varchar(20)
 select @type_new_activity=type from Activities where date=@date and location=@location
 
 declare @type_old_activity varchar(20)
 select @type_old_activity = a.type   from Activities a
                inner join Activity_has_student ast on ast.date=a.date and ast.location = a.location 
                where ast.student_id = @student_id and a.date=@date
 
if @type_new_activity = @type_old_activity
print 'You can not join two activities of the same type on the same date'
else
insert into Activity_has_student values(@date,@location,@student_id,@child_ssn)
 
 
 
/*6.11 Join clubs oﬀered by my school, if I am a highschool student.*/
 
create proc Students_join_clubs
@student_id int, @child_ssn int, @club_name varchar(20)
as
declare @grade tinyint
select @grade=s.grade
from Students s
where @student_id=s.student_id and @child_ssn=s.child_ssn
if (@grade>9 )
insert into club_has_student values(@club_name,@student_id, @child_ssn)
else
print 'you are not in high school to join clubs'
 
 
create proc view_clubs
@school_name varchar(50),
@school_address varchar(50)
as
select c.*from club_offered_by_high_school s inner join
	Clubs c on s.club_name=c.club_name
	where @school_name=s.school_name and @school_address=s.school_address
 
/*6.12 Search in a list of courses that i take by its name or code.*/
 
create proc Students_search_course_by_name
@course_name varchar(100),@student_id int, @child_ssn int
as
select c.*
from Course_has_Students s
inner join Courses c on c.course_code = s.course_code
where s.child_ssn=@child_ssn and s.student_id=@student_id and c.name=@course_name
 
create proc Students_search_course_by_code
@course_code varchar(20),@student_id int, @child_ssn int
as
select c.*
from Course_has_Students s
inner join Courses c on c.course_code = s.course_code
where s.child_ssn=@child_ssn and s.student_id=@student_id and c.course_code=@course_code
 

