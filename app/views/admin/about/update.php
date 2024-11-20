<?php if (isset($_SESSION['error'])): ?>
    <div class="error"><?= $_SESSION['error'] ?></div>
    <?php unset($_SESSION['error']); ?>
<?php elseif (isset($_SESSION['success'])): ?>
    <div class="success"><?= $_SESSION['success'] ?></div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<form method="POST">
    <label for="title">Название:</label>
    <input type="text" id="title" name="title" value="<?= htmlspecialchars($about['title']) ?>" required>

    <label for="info">Информация:</label>
    <textarea id="info" name="info" required><?= htmlspecialchars($about['info']) ?></textarea>

    <button type="submit">Сохранить</button>
</form>