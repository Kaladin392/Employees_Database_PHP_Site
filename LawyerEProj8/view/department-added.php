<h2>Department Added Successfully</h2>

<ul>
    <li><strong>Code:</strong> <?= htmlspecialchars($submitted['department']) ?></li>
    <li><strong>Name:</strong> <?= htmlspecialchars($submitted['department_name']) ?></li>
    <li><strong>Account Number:</strong> <?= htmlspecialchars($submitted['dept_acct_num']) ?></li>
</ul>

<p><a href="index.php?action=departments">Return to Department List</a></p>
