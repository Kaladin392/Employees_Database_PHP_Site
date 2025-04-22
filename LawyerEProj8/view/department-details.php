<h2>Department Details</h2>

<?php if (!$department): ?>
    <p style="color: red;">Department not found.</p>
<?php else: ?>
    <ul>
        <li><strong>Code:</strong> <?= htmlspecialchars($department['department']) ?></li>
        <li><strong>Name:</strong> <?= htmlspecialchars($department['department_name']) ?></li>
        <li><strong>Account Number:</strong> <?= htmlspecialchars($department['dept_acct_num']) ?></li>
    </ul>

    <p>
        <a href="index.php?action=edit_department&code=<?= urlencode($department['department']) ?>">Edit Department</a> |
        <a href="index.php?action=department_employees&code=<?= urlencode($department['department']) ?>">View Employees</a>
    </p>
<?php endif; ?>
