<?php
require_once 'model/employee.php';

if (isset($_GET['add'])) {
    include 'view/employee-add-form.php';
    return;
}

$employees = get_all_employees();
?>

<h2>Employee List</h2>

<a href="index.php?action=employees&add=true" class="button">Add Employee</a>

<table>
    <thead>
        <tr>
            <th>Payroll #</th>
            <th>Name</th>
            <th>Position</th>
            <th>Department</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($employees as $emp) : ?>
            <tr>
                <td><?= htmlspecialchars($emp['payroll_number']) ?></td>
                <td><?= htmlspecialchars($emp['first_name'] . ' ' . $emp['last_name']) ?></td>
                <td><?= htmlspecialchars($emp['current_position']) ?></td>
                <td><?= htmlspecialchars($emp['department_name']) ?></td>
				<td><a href="index.php?action=view_employee&id=<?= urlencode($emp['payroll_number']) ?>">View</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
