<?php
require_once 'db.php';

function get_all_employees() {
    global $db;
    $query = "
        SELECT e.payroll_number, e.first_name, e.last_name, e.current_position, d.department_name
        FROM employee e
        LEFT JOIN department d ON e.fk_department = d.department
        ORDER BY e.last_name, e.first_name;
    ";
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function add_employee($data) {
    global $db;
    $query = "
        INSERT INTO employee (
            payroll_number, first_name, last_name, current_position,
            fk_department, phone, social_security_number,
            employment_date, birth_date, gender,
            wages, absences, street, city, state
        ) VALUES (
            :payroll_number, :first_name, :last_name, :current_position,
            :fk_department, :phone, :ssn,
            :employment_date, :birth_date, :gender,
            :wages, :absences, :street, :city, :state
        )
    ";

    $stmt = $db->prepare($query);
    $stmt->execute([
        ':payroll_number' => $data['payroll_number'],
        ':first_name' => $data['first_name'],
        ':last_name' => $data['last_name'],
        ':current_position' => $data['current_position'],
        ':fk_department' => $data['fk_department'],
        ':phone' => $data['phone'],
        ':ssn' => $data['social_security_number'],
        ':employment_date' => $data['employment_date'],
        ':birth_date' => $data['birth_date'],
        ':gender' => $data['gender'],
        ':wages' => $data['wages'] ?? null,
        ':absences' => $data['absences'] ?? null,
        ':street' => $data['street'] ?? null,
        ':city' => $data['city'] ?? null,
        ':state' => $data['state'] ?? 'SC'
    ]);
}

function validate_employee_input($data, &$errors) {
    $required = ['payroll_number', 'first_name', 'last_name', 'fk_department', 'social_security_number'];

    foreach ($required as $field) {
        if (empty(trim($data[$field] ?? ''))) {
            $errors[$field] = ucfirst(str_replace("_", " ", $field)) . ' is required.';
        }
    }
	
	if (!empty($data['payroll_number']) && payroll_number_exists($data['payroll_number'])) {
		$errors['payroll_number'] = 'That payroll number is already in use. Please use another.';
	}

    if (!empty($data['social_security_number']) && !preg_match('/^\d{3}-\d{2}-\d{4}$/', $data['social_security_number'])) {
        $errors['social_security_number'] = 'SSN must be in the format 999-99-9999.';
    }

    if (!empty($data['phone']) && !preg_match('/^\d{3}-\d{3}-\d{4}$/', $data['phone'])) {
        $errors['phone'] = 'Phone must be in the format 999-999-9999.';
    }

    if (!empty($data['gender']) && !in_array($data['gender'], ['M', 'F'])) {
        $errors['gender'] = 'Invalid gender value.';
    }
	
	if (!empty($data['state']) && strlen($data['state']) !== 2) {
		$errors['state'] = 'State must be 2 characters.';
	}

	if (!empty($data['wages']) && !is_numeric($data['wages'])) {
		$errors['wages'] = 'Wages must be a number.';
	}

	if (!empty($data['absences']) && !ctype_digit($data['absences'])) {
		$errors['absences'] = 'Absences must be a whole number.';
	}
}

function get_employee_by_id($id) {
    global $db;
    $query = "
        SELECT e.*, d.department_name
        FROM employee e
        LEFT JOIN department d ON e.fk_department = d.department
        WHERE e.payroll_number = :id
    ";
    $stmt = $db->prepare($query);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function payroll_number_exists($payroll_number) {
    global $db;
    $stmt = $db->prepare("SELECT COUNT(*) FROM employee WHERE payroll_number = :num");
    $stmt->execute([':num' => $payroll_number]);
    return $stmt->fetchColumn() > 0;
}
