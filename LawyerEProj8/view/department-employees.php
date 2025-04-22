<h2>Employees in Department <?= htmlspecialchars($_GET['code']) ?></h2>

<?php if (empty($employees)): ?>
    <p>No employees found in this department.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Payroll #</th>
                <th>Name</th>
                <th>Position</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $emp): ?>
                <tr>
                    <td><?= htmlspecialchars($emp['payroll_number']) ?></td>
                    <td><?= htmlspecialchars($emp['first_name'] . ' ' . $emp['last_name']) ?></td>
                    <td><?= htmlspecialchars($emp['current_position']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<p><a href="index.php?action=departments">Return to Departments</a></p>