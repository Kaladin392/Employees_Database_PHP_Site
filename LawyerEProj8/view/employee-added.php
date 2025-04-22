<h2>Employee Added Successfully</h2>

<p>The following employee has been added to the system:</p>

<ul>
    <li><strong>Name:</strong> <?= htmlspecialchars($submitted['first_name'] . ' ' . $submitted['last_name']) ?></li>
    <li><strong>Payroll Number:</strong> <?= htmlspecialchars($submitted['payroll_number']) ?></li>
    <li><strong>Position:</strong> <?= htmlspecialchars($submitted['current_position']) ?></li>
    <li><strong>Department:</strong> <?= htmlspecialchars($submitted['fk_department']) ?></li>
    <li><strong>Phone:</strong> <?= htmlspecialchars($submitted['phone']) ?></li>
    <li><strong>SSN:</strong> <?= htmlspecialchars($submitted['social_security_number']) ?></li>
    <li><strong>Employment Date:</strong> <?= htmlspecialchars($submitted['employment_date']) ?></li>
    <li><strong>Birth Date:</strong> <?= htmlspecialchars($submitted['birth_date']) ?></li>
    <li><strong>Gender:</strong> <?= htmlspecialchars($submitted['gender']) ?></li>
	<li><strong>Wages:</strong>
		<?= isset($submitted['wages']) && is_numeric($submitted['wages'])
			? '$' . number_format((float)$submitted['wages'], 2)
			: 'N/A' ?>
	</li>
	<li><strong>Absences:</strong> <?= htmlspecialchars($submitted['absences']) ?></li>
	<li><strong>Address:</strong>
		<?= !empty($submitted['street']) || !empty($submitted['city']) || !empty($submitted['state'])
		? htmlspecialchars("{$submitted['street']}, {$submitted['city']}, {$submitted['state']}")
		: 'N/A' ?>
	</li>
</ul>

<p><a href="index.php?action=employees">Return to Employee List</a></p>
