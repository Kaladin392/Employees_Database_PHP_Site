<?php
require_once 'model/department.php';
$errors ??= []; //
$input ??= []; //
$departments = get_all_departments();
?>

<h2>Add New Employee</h2>
<?php if (!empty($errors)): ?>
    <ul class="error-list">
        <?php foreach ($errors as $error): ?>
            <li style="color: red;"><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="index.php?action=add_employee" method="post">
    <label>Payroll Number:</label>
    <input type="number" name="payroll_number" required><br>

    <label>First Name:</label>
    <input type="text" name="first_name" required><br>

    <label>Last Name:</label>
    <input type="text" name="last_name" required><br>

    <label>Position:</label>
    <input type="text" name="current_position"><br>

    <label>Department:</label>
    <select name="fk_department" required>
        <option value="">Select a department</option>
        <?php foreach ($departments as $dept): ?>
            <option value="<?= htmlspecialchars($dept['department']) ?>">
                <?= htmlspecialchars($dept['department_name']) ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label>Phone:</label>
    <input type="text" name="phone" placeholder="999-999-9999"><br>

    <label>SSN:</label>
    <input type="text" name="social_security_number" placeholder="999-99-9999" required><br>

    <label>Employment Date:</label>
    <input type="date" name="employment_date"><br>

    <label>Birth Date:</label>
    <input type="date" name="birth_date"><br>

    <label>Gender:</label>
    <select name="gender">
        <option value="M">Male</option>
        <option value="F">Female</option>
    </select><br>
	
	<label>Wages:</label>
	<input type="number" name="wages" step="0.01" value="<?= htmlspecialchars($input['wages'] ?? '') ?>"><br>

	<label>Absences:</label>
	<input type="number" name="absences" value="<?= htmlspecialchars($input['absences'] ?? '') ?>"><br>

	<label>Street:</label>
	<input type="text" name="street" value="<?= htmlspecialchars($input['street'] ?? '') ?>"><br>

	<label>City:</label>
	<input type="text" name="city" value="<?= htmlspecialchars($input['city'] ?? '') ?>"><br>

	<label>State:</label>
	<input type="text" name="state" maxlength="2" value="<?= htmlspecialchars($input['state'] ?? 'SC') ?>"><br><br>

    <button type="submit">Submit</button>
</form>
