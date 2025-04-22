<?php
require_once 'db.php';

function get_all_departments() {
    global $db;
    $query = "
        SELECT department, department_name, dept_acct_num
        FROM department
        ORDER BY department_name;
    ";
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function validate_department_input($data, &$errors) {
	if (!empty($data['department']) && department_code_exists($data['department'])) {
		$errors['department'] = 'That department code is already in use.';
	}
	
    if (empty($data['department']) || strlen($data['department']) !== 3 && strlen($data['department']) !== 4) {
        $errors['department'] = "Department code must be 3-4 characters.";
    }

    if (empty($data['department_name'])) {
        $errors['department_name'] = "Department name is required.";
    }

    if (!is_numeric($data['dept_acct_num']) || $data['dept_acct_num'] < 0) {
        $errors['dept_acct_num'] = "Valid account number required.";
    }
}

function add_department($data) {
    global $db;
    $query = "
        INSERT INTO department (department, department_name, dept_acct_num)
        VALUES (:department, :department_name, :acct_num)
    ";
    $stmt = $db->prepare($query);
    $stmt->execute([
        ':department' => $data['department'],
        ':department_name' => $data['department_name'],
        ':acct_num' => $data['dept_acct_num']
    ]);
}

function delete_department($dept_code) {
    global $db;
    $stmt = $db->prepare("DELETE FROM department WHERE department = :code");
    $stmt->execute([':code' => $dept_code]);
}

function get_department_by_code($code) {
    global $db;
    $query = "SELECT * FROM department WHERE department = :code";
    $stmt = $db->prepare($query);
    $stmt->execute([':code' => $code]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function update_department($data) {
    global $db;
    $query = "
        UPDATE department
        SET department_name = :name, dept_acct_num = :acct
        WHERE department = :code
    ";
    $stmt = $db->prepare($query);
    $stmt->execute([
        ':name' => $data['department_name'],
        ':acct' => $data['dept_acct_num'],
        ':code' => $data['department']
    ]);
}

function get_employees_by_department($code) {
    global $db;
    $query = "
        SELECT payroll_number, first_name, last_name, current_position
        FROM employee
        WHERE fk_department = :code
        ORDER BY last_name
    ";
    $stmt = $db->prepare($query);
    $stmt->execute([':code' => $code]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function department_code_exists($code) {
    global $db;
    $stmt = $db->prepare("SELECT COUNT(*) FROM department WHERE department = :code");
    $stmt->execute([':code' => $code]);
    return $stmt->fetchColumn() > 0;
}
