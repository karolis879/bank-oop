<div class="acc-list">
    <div>
        <h1>Sąskaitų sąrašas</h1>
    </div>
    <?php if (empty($saskaitoss)) : ?>
        <p>Nėra saskaitų.</p>
    <?php else : ?>
        <?php
        // Sort the account list by last name
        usort($saskaitoss, function ($a, $b) {
            return strcmp($a['last_name'], $b['last_name']);
        });
        ?>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Vardas</th>
                    <th scope="col">Pavardė</th>
                    <th scope="col">Asmens kodas</th>
                    <th scope="col">Sąskaitos numeris</th>
                    <th scope="col">Balansas</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($saskaitoss as $saskaitos) : ?>
                    <tr>
                        <th scope="row"><?= $saskaitos['id'] ?></th>
                        <td><?= $saskaitos['first_name'] ?></td>
                        <td><?= $saskaitos['last_name'] ?></td>
                        <td><?= $saskaitos['personal_id'] ?></td>
                        <td><?= $saskaitos['iban'] ?></td>
                        <td><?= $saskaitos['balance'] ?></td>
                        <td>
                            <div style="display: flex; gap:20px">
                                <a class="btn btn-secondary" href="/saskaitos/edit/<?= $saskaitos['id'] ?>">Keisti</a>
                                <a class="btn btn-secondary" href="/saskaitos/delete/<?= $saskaitos['id'] ?>">Ištrinti</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>
</div>
