<div class="edit-bank">
    <h1>Atnaujinti saskaitą</h1>
    <form action="/saskaitos/update/<?= $saskaitos['id'] ?>" method="post">
        <div class="mb-3">
            <label for="first_name">Name</label>
            <?= $saskaitos['first_name'] ?>
        </div>
        <div class="mb-3">
            <label for="last_name">Pavardė</label>
            <?= $saskaitos['last_name'] ?>
            <input type="hidden" name="last_name" value="<?= $saskaitos['last_name'] ?>">
        </div>
        <div class="mb-3">
            <label for="iban">Sąskaitos numeris</label>
            <?= $saskaitos['iban'] ?>
            <input type="hidden" name="iban" value="<?= $saskaitos['iban'] ?>">
        </div>
        <div class="mb-3">
            <label for="personal_id">Asmens kodas</label>
            <?= $saskaitos['personal_id'] ?>
            <input type="hidden" name="personal_id" value="<?= $saskaitos['personal_id'] ?>">
        </div>
        <div class="mb-3">
            <label for="description">Likutis</label>
            <?= $saskaitos['balance'] ?>
            <input type="hidden" name="balance" value="<?= $saskaitos['balance'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1">Funds</label>
            <input class="form-control" type="number" name="funds" id="exampleFormControlInput1" placeholder="Enter funds">
        </div>
        <div style="display: flex; gap: 5px">
            <button style="padding: 10px; display: inline-block" name="addFunds" value="1" class="btn btn-secondary" type="submit" class="mb-3">prideti</button>
            <button class="btn btn-secondary" type="submit" name="removeFunds" value="1" class="mb-3">atimti</button>
        </div>
    </form>
</div>
