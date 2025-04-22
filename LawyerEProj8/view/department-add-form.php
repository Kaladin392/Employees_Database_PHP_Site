<h2>Add New Department</h2>

<?php if (!empty($errors)): ?>
    <ul class="error-list">
        <?php foreach ($errors as $error): ?>
            <li style="color: red;"><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="index.php?action=add_department" method="post">
    <label>Department Code (4 chars):</label>
    <input type="text" name="department" maxlength="4" required value="<?= htmlspecialchars($input['department'] ?? '') ?>"><br>

    <label>Department Name:</label>
    <input type="text" name="department_name" required value="<?= htmlspecialchars($input['department_name'] ?? '') ?>"><br>

    <label>Account Number:</label>
    <input type="number" name="dept_acct_num" required value="<?= htmlspecialchars($input['dept_acct_num'] ?? '') ?>"><br><br>

    <button type="submit">Submit</button>
</form>
