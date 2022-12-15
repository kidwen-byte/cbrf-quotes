<div class="container-md">
    <?php if ($currencies) : ?>
        <table class="table mb-5">
            <thead>
                <tr>
                    <th scope="col">Код валюты</th>
                    <th scope="col">Курс к руб.</th>
                    <th scope="col">Дата</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($currencies as $item) : ?>
                    <tr>
                        <td><?= $item['valuteID'] ?></td>
                        <td><?= $item['value'] ?></td>
                        <td><?= $item['date_update'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Данные в базе отсутствуют</p>
    <?php endif; ?>
</div>