<?php
require_once 'model/department.php';

if (isset($_GET['add'])) {
    include 'view/department-add-form.php';
    return;
}

$departments = get_all_departments();
?>

<h2>Department List</h2>

<a href="index.php?action=departments&add=true" class="button">Add Department</a>

<table>
    <thead>
        <tr>
            <th>Dept. Code</th>
            <th>Name</th>
            <th>Account #</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($departments as $dept): ?>
            <tr>
                <td><?= htmlspecialchars($dept['department']) ?></td>
                <td><?= htmlspecialchars($dept['department_name']) ?></td>
                <td><?= htmlspecialchars($dept['dept_acct_num']) ?></td>
                <td>
					<a href="index.php?action=view_department&code=<?= urlencode($dept['department']) ?>">View</a> |
                    <a href="index.php?action=delete_department&code=<?= urlencode($dept['department']) ?>"
                       onclick="return confirm('Are you sure you want to delete this department?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
