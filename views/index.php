    <div class="container-md">
        <button class="update btn btn-primary">Обновить курсы валют</button>
        <table class="table mb-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID валюты,</th>
                    <th scope="col">Код валюты</th>
                    <th scope="col">Буквенный код</th>
                    <th scope="col">Имя валюты</th>
                    <th scope="col">Курс к руб.</th>
                    <th scope="col">Дата</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($currency as $item) : ?>
                    <tr>
                        <th scope="row"><?= $item['id'] ?></th>
                        <td><?= $item['valuteID'] ?></td>
                        <td><?= $item['numCode'] ?></td>
                        <td><?= $item['charCode'] ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['value'] ?></td>
                        <td><?= $item['date_update'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form action="/index/dynamic" method="POST">
            <div class="row mb-5">
                <div class="col">
                    <select name="valuteID" class="form-select valute-id" aria-label="Default select example" required>
                        <option selected>Выбрать валюту</option>
                        <?php foreach ($currency as $item) : ?>
                            <option value="<?= $item['valuteID'] ?>"><?= $item['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-text">В БД есть данные только по USD</div>
                </div>
                <div class="col">
                    <input type="date" name="date-from" class="form-control date" required>
                    <div class="form-text">С какой даты</div>
                </div>
                <div class="col">
                    <input type="date" name="date-to" class="form-control date" required>
                    <div class="form-text">По какую дату</div>
                </div>
                <div class="col">
                    <button type="submit" class="get-currency btn btn-primary">Получить данные</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        let xhr = new XMLHttpRequest();

        let update = document.querySelector('.update');

        update.onclick = function() {
            xhr.open('GET', '/index/update');
            xhr.send();
            location.reload();
            return false;
        };
    </script>