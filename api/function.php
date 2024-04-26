<?php

include 'connection.php';
include 'query.php';

session_start();

function check_server()
{
    if ($_SERVER['SERVER_NAME'] != constant("SERVER_NAME")) {
        echo json_encode(array("success" => false, "message" => "Bad request"));
        die;
    }
    return true;
}

function check_method($method)
{
    check_server();
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo json_encode(array("success" => false, "message" => "Method not found"));
        die;
    }
    return true;
}

function check_user($conn)
{
    check_server();
    if (isset($_SESSION['user']['check_user']) && isset($_SESSION['user']['check_iv'])) {
        $user_id = decryption($_SESSION['user']['check_user'], hex2bin($_SESSION['user']['check_iv']));
        $user_check = "select id, role from user where id = '$user_id'";
        $query = mysqli_query($conn, $user_check);
        if (mysqli_num_rows($query) > 0) {
            $user = mysqli_fetch_assoc($query);
            return $_SESSION['user']['role'] == $user['role'];
        }
    }
    return false;
}

function check_user_api($conn)
{
    if (check_user($conn)) return true;
    else echo json_encode(array("success" => false, "message" => "User not logged in"));
}

function check_user_page($conn, $role)
{
    if (check_user($conn)){
        if($_SESSION['user']['role'] == $role) return true;
        else redirect_dashboard();
    }
    else header('location:' . BASE_URL . 'api/logout.php');
}

function redirect_dashboard()
{
    $role = $_SESSION['user']['role'];
    if ($role == USER_ROLE['admin']) header('location:' . BASE_URL . 'admin/');
    else if ($role == USER_ROLE['teacher']) header('location:' . BASE_URL . 'teacher/');
    else if ($role == USER_ROLE['student']) header('location:' . BASE_URL . 'student/');
    else header('location:' . BASE_URL . 'api/logout.php');
}


function xss_prevent($value)
{
    return strip_tags(htmlspecialchars($value));
}

function sql_prevent($conn, $value)
{
    return mysqli_real_escape_string($conn, $value);
}

function encryption($value, $iv)
{
    return openssl_encrypt($value, constant("CIPHER"), constant("KEY"), constant("OPTIONS"), $iv);
}

function decryption($value, $iv)
{
    return openssl_decrypt($value, constant("CIPHER"), constant("KEY"), constant("OPTIONS"), $iv);
}

function sendData($success, $data){
    if(gettype($data) == 'string') echo json_encode(array("success"=>$success, "message"=>$data));
    else echo json_encode(array("success"=>$success, "data"=>$data));
    die;
}

function get_branches($conn)
{
    return query_getData($conn, "select * from branch");
}

function get_attendance_types($conn)
{
    return query_getData($conn, "select * from attendance_type");
}
function get_subjects($conn)
{
    return query_getData($conn, "select * from subject");
}
function get_courseTypes($conn)
{
    return query_getData($conn, "select * from course_type");
}
function get_teachers($conn)
{
    return query_getData($conn, "select * from teacher_detail");
}
function get_students($conn)
{
    return query_getData($conn, "select * from student_detail");
}
function get_classes($conn){
    return query_getData($conn,"SELECT c.id,ct.name as course_type,b.short_name as branch_name,s.name as subject_name,c.semester from classes c INNER JOIN course_type ct ON c.course_type_id = ct.id INNER JOIN branch b ON c.branch_id = b.id INNER JOIN subject s ON c.subject_id = s.id");
}

function get_teacher_id($conn,$user_id){
    $particular_teacher =  query_getData1($conn, "select id from teacher_detail WHERE user_id = $user_id");
    $teacher_id = $particular_teacher["id"];
    return $teacher_id;
}
function get_student_id($conn,$user_id){
    $particular_student =  query_getData1($conn, "select id from student_detail WHERE user_id = $user_id");
    $student_id = $particular_student["id"];
    return $student_id;
}
function get_class_id($conn,$courseType,$branch,$subject,$semester){
    $classes =  query_getData1($conn,"SELECT c.id from classes c INNER JOIN course_type ct ON c.course_type_id = ct.id INNER JOIN branch b ON c.branch_id = b.id INNER JOIN subject s ON c.subject_id = s.id WHERE ct.name = '$courseType' AND b.short_name = '$branch' AND s.name = '$subject' AND c.semester = '$semester'");
    $classes_id = $classes["id"];
    return $classes_id;
}
