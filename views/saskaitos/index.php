<div class="acc-list">
    <div>
        <h1>Sąskaitų sąrašas</h1>
    </div>
    <?php if (empty($saskaitoss)) : ?>
        <p>No raccoons found.</p>
    <?php else : ?>
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
                        <td><?= $saskaitos['name'] ?></td>
                        <td><?= $saskaitos['lastName'] ?></td>
                        <td><?= $saskaitos['PersonId'] ?></td>
                        <td><?= $saskaitos['accountNumber'] ?></td>
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