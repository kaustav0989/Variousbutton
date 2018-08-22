SELECT spd.s_stud_fname AS firstname,spd.s_stud_lname AS lastname,
					spd.s_stud_father AS father,
                    spd.s_stud_mother AS mother,
					spd.s_stud_gender AS gender,
                    spd.dt_stud_dob as dob,
                    spd.s_stud_address as address,
					cl.s_name AS class,
                    ct.s_name AS city,
					sc.s_name AS section,
                    st.s_name as state,
                    pn.s_no AS pin,
					scl.i_roll_no AS roll , 
					spd.s_stud_contact AS contact,
                   	spd.s_img_name AS image,
                    Year.s_year_val AS year,
                    scl.i_roll_no AS roll,
                    ss.s_name AS status
					FROM 
					Personal_details AS spd LEFT JOIN Student_classes AS scl ON spd.i_stud_id=scl.i_student_id 
					LEFT JOIN City AS ct ON spd.i_city_id=ct.i_id LEFT JOIN State AS st ON spd.i_state_id=st.i_id 
					LEFT JOIN Pincode AS pn ON spd.i_pin_id=pn.i_id LEFT JOIN Class AS cl ON scl.i_class_id=cl.i_id 
					LEFT JOIN Section AS sc ON scl.i_secion_id=sc.i_id 
                    LEFT JOIN Year ON scl.i_year_id = Year.i_year_id
                    LEFT JOIN Student_status AS ss ON scl.i_status_id = ss.i_id
                    WHERE spd.i_stud_id = '17'

DELETE spd.*, scl.* 
FROM Personal_details AS spd ,Student_classes as scl 
WHERE spd.i_stud_id = scl.i_student_id AND spd.i_stud_id = '31'
