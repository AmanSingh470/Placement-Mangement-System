<?php

include 'function.php';
$submit = sql_prevent($conn, xss_prevent($_POST['submit']));

switch ($submit) {
    
    case 'get-student-list':
        $query = "SELECT * from student";
        $student_list = query_getData($conn,$query);
        sendData(true,$student_list); 
        break;

    case 'get-coordinator-list':
        $query = "SELECT * from coordinator";
        $coordinator_list = query_getData($conn,$query);
        sendData(true,$coordinator_list); 
        break;

    case 'get-company-list':
        $query = "SELECT * from company";
        $company_list = query_getData($conn,$query);
        sendData(true,$company_list); 
        break;

    case 'get-placements-list':
        $query = "select placement.placement_id,student.name as stud_name,company.company_name from placement join student on placement.stud_id=student.stud_id join company on placement.comp_id=company.comp_id";
        $placement_list = query_getData($conn,$query);
        sendData(true,$placement_list); 

    case 'get-comp-and-criteria-list':
        $query = "select c.comp_id,c.company_name,c.address,c.grade,c.package,c.contact_no,cr.dept_allowed,cr.cgpa_required from company c join criteria cr on c.criteria_id = cr.criteria_id";
        $comp_and_criteria_list = query_getData($conn,$query);
        sendData(true,$comp_and_criteria_list); 
        break;

    case 'get-eligible-student-list':
        $query = "select * from student where (d_id IN (select dept_allowed from criteria)) and cgpa>= ANY (select cgpa_required from criteria)";
        $eligible_student = query_getData($conn,$query);
        sendData(true,$eligible_student); 
        break;

    default:
        sendData(false, "Method not found");
        break;
}

?>
