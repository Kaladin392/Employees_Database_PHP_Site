<?php
require_once 'model/db.php';

$action = $_GET['action'] ?? 'home';

include 'view/header.php';

switch ($action) {
    case 'employees':
        include 'view/employees.php';
        break;
		
	case 'view_employee':
		require_once 'model/employee.php';
		$id = $_GET['id'] ?? '';
		$employee = get_employee_by_id($id);
		include 'view/employee-details.php';
		break;
		
	case 'add_employee':
		require_once 'model/employee.php';
		$errors = [];
		validate_employee_input($_POST, $errors);
		if (!empty($errors)) {
			$input = $_POST;
			include 'view/employee-add-form.php';
		} else {
			add_employee($_POST);
			$submitted = $_POST;
			include 'view/employee-added.php';
		}
		break;

    case 'departments':
        include 'view/departments.php';
        break;
		
	case 'view_department':
		require_once 'model/department.php';
		$code = $_GET['code'] ?? '';
		$department = get_department_by_code($code);
		include 'view/department-details.php';
		break;
		
	case 'department_employees':
		require_once 'model/department.php';
		$code = $_GET['code'] ?? '';
		$employees = get_employees_by_department($code);
		include 'view/department-employees.php';
		break;

	case 'add_department':
		require_once 'model/department.php';
		$errors = [];
		validate_department_input($_POST, $errors);
		if (!empty($errors)) {
			$input = $_POST;
			include 'view/department-add-form.php';
		} else {
			add_department($_POST);
			$submitted = $_POST;
			include 'view/department-added.php';
		}
		break;
		
	case 'edit_department':
		require_once 'model/department.php';
		$code = $_GET['code'] ?? '';
		$department = get_department_by_code($code);
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$errors = [];
			validate_department_input($_POST, $errors);
			if ($errors) {
				$input = $_POST;
				include 'view/department-edit-form.php';
			} else {
				update_department($_POST);
				header("Location: index.php?action=view_department&code=" . urlencode($_POST['department']));
				exit();
			}
		} else {
			$input = $department;
			include 'view/department-edit-form.php';
		}
		break;
	
	case 'delete_department':
		require_once 'model/department.php';
		$code = $_GET['code'] ?? '';
		delete_department($code);
		header("Location: index.php?action=departments");
		exit();
		
    default:
        include 'view/home.php';
        break;

}
include 'view/footer.php';
