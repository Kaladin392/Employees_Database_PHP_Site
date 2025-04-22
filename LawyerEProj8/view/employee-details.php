<h2>Employee Details</h2>

<?php if (!$employee): ?>
    <p style="color: red;">Employee not found.</p>
<?php else: ?>
    <ul>
        <li><strong>Payroll #:</strong> <?= htmlspecialchars($employee['payroll_number']) ?></li>
        <li><strong>Name:</strong> <?= htmlspecialchars($employee['first_name'] . ' ' . $employee['last_name']) ?></li>
        <li><strong>Position:</strong> <?= htmlspecialchars($employee['current_position']) ?></li>
        <li><strong>Department:</strong> <?= htmlspecialchars($employee['department_name']) ?></li>
        <li><strong>Phone:</strong> <?= htmlspecialchars($employee['phone']) ?></li>
        <li><strong>SSN:</strong> <?= htmlspecialchars($employee['social_security_number']) ?></li>
        <li><strong>Employment Date:</strong> <?= htmlspecialchars($employee['employment_date']) ?></li>
        <li><strong>Birth Date:</strong> <?= htmlspecialchars($employee['birth_date']) ?></li>
        <li><strong>Gender:</strong> <?= htmlspecialchars($employee['gender']) ?></li>
        <li><strong>Wages:</strong> $<?= number_format($employee['wages'], 2) ?></li>
        <li><strong>Absences:</strong> <?= htmlspecialchars($employee['absences']) ?></li>
        <li><strong>Address:</strong>
            <?= htmlspecialchars($employee['street']) ?>,
            <?= htmlspecialchars($employee['city']) ?>,
            <?= htmlspecialchars($employee['state']) ?>
        </li>
    </ul>
    <p><a href="index.php?action=employees">Return to Employee List</a></p>
<?php endif; ?>