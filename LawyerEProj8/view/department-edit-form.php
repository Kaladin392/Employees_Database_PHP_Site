<h2>Edit Department</h2>

<?php if (!empty($errors)): ?>
    <ul class="error-list">
        <?php foreach ($errors as $error): ?>
            <li style="color: red;"><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" action="index.php?action=edit_department&code=<?= urlencode($input['department']) ?>">
    <input type="hidden" name="department" value="<?= htmlspecialchars($input['department']) ?>">

    <label>Department Name:</label>
    <input type="text" name="department_name" required value="<?= htmlspecialchars($input['department_name']) ?>"><br>

    <label>Account Number:</label>
    <input type="number" name="dept_acct_num" required value="<?= htmlspecialchars($input['dept_acct_num']) ?>"><br><br>

    <button type="submit">Update</button>
</form>
