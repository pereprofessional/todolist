<div class="todo-wrapper">
    <button class="add-task">Добавить задачу</button>
    <? if (count($data['tasks']) > 0) : ?>
    	<div class="todo">
    		<div class="todo-items">
                <? foreach ($data['tasks'] as $item) : ?>
                    <div class="todo-item <?=$item['status']?>">
                        <div class="todo-cell cell-name">
                            <span class="user-name"><?=$item['name']?></span>
                            <?= (($item['email']) ? '<span class="user-email">'.$item['email'].'</span>' : '') ?>
                            <?= (($item['status'] == 'edited') ? '<span class="user-edited">(отредачено админом)</span>' : '') ?>
                        </div>
                        <div class="todo-cell cell-text">
                            <span><?=$item['text']?></span>
                        </div>
                        <div class="todo-cell cell-dependency">
                            <span class="task-status"><?= (($item['status'] == 'done') ? 'Выполнено' : 'В разработке') ?></span>
                            <? if ($data['user']) : ?>
                                <? if ($item['status'] != 'done') : ?>
                                    <button class="task-edit" id="<?=$item['id']?>">Изменить</button>
                                    <button class="task-makedone" id="<?=$item['id']?>">Сделано!</button>
                                <? endif ?>
                            <? endif; ?>
                        </div>
                    </div>
    			<? endforeach; ?>
    		</div>
            <? if (($data['number_of_pages']) > 1) : ?>
                <div class="pagination">
                    Страница:&nbsp;&nbsp;
                    <div class="pages">
                        <?
                        $query = $_GET;
                        for ($i = 1; $i <= $data['number_of_pages']; $i++) {
                            $query['page'] = $i;
                            $query_res = http_build_query($query);
                            if ($i == $data['current_page'])
                                echo '<a class="active" href="?'.$query_res.'">'.$i.'</a>';
                            else
                                echo '<a href="?'.$query_res.'">'.$i.'</a>';
                        }
                        ?>
                    </div>
                </div>
            <? endif; ?>
            <br/>
            <div class="sort">
                Сортировать по:&nbsp;&nbsp;
                <div class="pages">
                    <?
                    $query = $_GET;
                    $query['sort'] = 'id';
                    $query_res = http_build_query($query);
                    echo '<a href="?'.$query_res.'">умолчанию</a>';
                    $query['sort'] = 'name';
                    $query_res = http_build_query($query);
                    echo '<a href="?'.$query_res.'">имени</a>';
                    $query['sort'] = 'email';
                    $query_res = http_build_query($query);
                    echo '<a href="?'.$query_res.'">email</a>';
                    $query['sort'] = 'status';
                    $query_res = http_build_query($query);
                    echo '<a href="?'.$query_res.'">статусу</a>';
                    ?>
                </div>
            </div>
            <br/>
            <div class="sort">
                Порядок по:&nbsp;&nbsp;
                <div class="pages">
                    <?
                    $query = $_GET;
                    $query['order'] = 'desc';
                    $query_res = http_build_query($query);
                    echo '<a href="?'.$query_res.'">убыванию</a>';
                    $query['order'] = 'asc';
                    $query_res = http_build_query($query);
                    echo '<a href="?'.$query_res.'">возрастанию</a>';
                    ?>
                </div>
            </div>
    	</div>
    <? else : ?>
        <br/>
        <h3>Хорошая новость, нет ни одной задачи! Или плохая? :/</h3>
        <h4>Авторизируйся по admin:123, чтобы добавить задачу</h4>
        <br/>
    <? endif; ?>
</div>
<div class="authorization">
    <? if (!$data['user']) : ?>
    <form class="auth_user">
        <div class="auth-field">
            <label for="username">Имя пользователя:</label>
            <input type="text" name="username" minlength="5" required />
        </div>
        <div class="auth-field">
            <label for="username">Пароль:</label>
            <input type="password" name="password" required />
        </div>
        <input class="auth-submit" type="submit" value="Войти" />
        <span class="auth-error"></span>
    </form>
    <? else : ?>
    <span>Вы вошли под именем <strong><?= $data['user'][0]['username'] ?></strong>!</span>
    <button class="action-logout">Выйти :(</button>
    <? endif; ?>
</div>

<div class="popup-editor" style="display: none;">
    <div class="frame">
        <form class="add-task-form">
            <div class="field">
                <label for="username">Имя пользователя:</label>
                <input type="text" name="username" required="" />
            </div>
            <div class="field">
                <label for="email">Email:</label>
                <input type="email" name="email" required="" />
            </div>
            <div class="field">
                <label for="text">Текст:</label>
                <textarea rows="5" name="text" required="" ></textarea>
            </div>
            <input type="submit" value="Добавить задачу">
            <span class="add-task-form-error"></span>
        </form>
        <form class="edit-task-form">
            <div class="field">
                <label for="text">Текст:</label>
                <textarea rows="5" name="text" required="" ></textarea>
            </div>
            <input type="hidden" name="id" value="" />
            <input type="submit" value="Отредактировать задачу">
            <span class="edit-task-form-error"></span>
        </form>
    </div>
    <div class="bg"></div>
</div>