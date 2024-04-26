let VIEW_STUDENT_TABLE;
function show_student_list() {
    VIEW_STUDENT_TABLE = $('#view-student-table').DataTable({
        responsive: true,
        "bDestroy": true,
        "searching": false,
        "paging": true, 
        "info": false,         
        "lengthChange":false,
        ajax: {
            url: "api/admin.php",
            type: 'POST',
            data: { submit: "get-student-list" }
        },
        'columns': [
            { 'data': 'stud_id' },
            { 'data': 'name' },
            { 'data': 'd_id' },
            { 'data': 'cgpa' },
            { 'data': 'address' },
            { 'data': 'contact_no' },
            { 'data': 'co_id' }
        ]
    });
}
function show_coordinator_list() {
    VIEW_COORDINATOR_TABLE = $('#view-coordinator-table').DataTable({
        responsive: true,
        "bDestroy": true,
        "searching": false,
        "paging": true, 
        "info": false,         
        "lengthChange":false,
        ajax: {
            url: "api/admin.php",
            type: 'POST',
            data: { submit: "get-coordinator-list" }
        },
        'columns': [
            { 'data': 'coord_id' },
            { 'data': 'contact_no' },
            { 'data': 'address' },
            { 'data': 'coord_name' }
        ]
    });
}
function show_company_list() {
    VIEW_COMPANY_TABLE = $('#view-company-table').DataTable({
        responsive: true,
        "bDestroy": true,
        "searching": false,
        "paging": true, 
        "info": false,         
        "lengthChange":false,
        ajax: {
            url: "api/admin.php",
            type: 'POST',
            data: { submit: "get-company-list" }
        },
        'columns': [
            { 'data': 'comp_id' },
            { 'data': 'company_name' },
            { 'data': 'address' },
            { 'data': 'grade' },
            { 'data': 'package' },
            { 'data': 'contact_no' },
            { 'data': 'criteria_id' }
        ]
    });
}
function show_placement_list() {
    VIEW_PLACEMENT_TABLE = $('#view-placement-table').DataTable({
        responsive: true,
        "bDestroy": true,
        "searching": false,
        "paging": true, 
        "info": false,         
        "lengthChange":false,
        ajax: {
            url: "api/admin.php",
            type: 'POST',
            data: { submit: "get-placements-list" }
        },
        'columns': [
            { 'data': 'placement_id' },
            { 'data': 'stud_name' },
            { 'data': 'company_name' }
        ]
    });
}

function show_eligible_student_list() {
    VIEW_ELIGIBLE_STUDENT_TABLE = $('#view-eligible-student-table').DataTable({
        responsive: true,
        "bDestroy": true,
        "searching": false,
        "paging": true, 
        "info": false,         
        "lengthChange":false,
        ajax: {
            url: "api/admin.php",
            type: 'POST',
            data: { submit: "get-eligible-student-list" }
        },
        'columns': [
            { 'data': 'stud_id' },
            { 'data': 'name' },
            { 'data': 'd_id' },
            { 'data': 'cgpa' },
            { 'data': 'address' },
            { 'data': 'contact_no' },
            { 'data': 'co_id' }
        ]
    });
}

function show_comp_and_criteria_list() {
    VIEW_COMP_AND_CRITERIA_TABLE = $('#view-comp-and-criteria-table').DataTable({
        responsive: true,
        "bDestroy": true,
        "searching": false,
        "paging": true, 
        "info": false,         
        "lengthChange":false,
        ajax: {
            url: "api/admin.php",
            type: 'POST',
            data: { submit: "get-comp-and-criteria-list" }
        },
        'columns': [
            { 'data': 'comp_id' },
            { 'data': 'company_name' },
            { 'data': 'address' },
            { 'data': 'grade' },
            { 'data': 'package' },
            { 'data': 'contact_no' },
            { 'data': 'dept_allowed' },
            { 'data': 'cgpa_required' }
        ]
    });
}

$('#student-btn').on('click', function (e) {
  show_student_list();
});
$('#coordinator-btn').on('click', function (e) {
  show_coordinator_list();
});
$('#company-btn').on('click', function (e) {
  show_company_list();
});
$('#placement-btn').on('click', function (e) {
  show_placement_list();
});
$("#company-and-criteria-btn").on('click', function (e) {
    show_comp_and_criteria_list();
});
 
$("#eligile-student-btn").on('click', function (e) {
    show_eligible_student_list();
});
 
