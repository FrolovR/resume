<!-- Форма для добавления новой записи -->
<form class="fixR" method="POST" action="/admin/about/create">
    <div class="form-group row">
        <div class="col-2">
            <label for="">Заголовок</label>
        </div>
        <div class="col-8">
            <input class="form-control" type="text" name="title" id="title" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-2">
            <label for="">Информация</label>
        </div>
        <div class="col-8">
            <textarea class="form-control" name="info" id="info" required></textarea>
        </div>
    </div>
    <div class="col-10">
      <button class="btn btn-primary float-end" type="submit">Добавить запись</button>
    </div>
</form>


<table class="table">
    <!-- Список записей -->
    <?php foreach ($aboutList as $post): ?>

            <tr>
                <td><?php echo htmlspecialchars($post['title']); ?></td>
                <td><?php echo htmlspecialchars($post['info']); ?></td>
                <td>
                    <!-- Ссылка на редактирование записи -->
                    <a href="update/<?php echo $post['id']; ?>">Редактировать</a>
                </td>
                <td>
                    <!-- Используем роутинг для удаления записи -->
                    <a href="delete/<?php echo $post['id']; ?>" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')">Удалить</a>
                </td>
            </tr>
    <?php endforeach; ?>
</table>

