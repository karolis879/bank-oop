<div class="edit-bank">
    <h1>Atnaujinti saskaitą</h1>
    <form action="/saskaitos/update/<?= $saskaitos['id'] ?>" method="post">
        <div class="mb-3">
            <label for="name">Name</label>
            <?= $saskaitos['name'] ?>
        </div>
        <div class="mb-3">
            <label for="lastName">Pavardė</label>
            <?= $saskaitos['lastName'] ?>
            <input type="hidden" name="lastName" value="<?= $saskaitos['lastName'] ?>">
        </div>
        <div class="mb-3">
            <label for="accountNumber">Sąskaitos numeris</label>
            <?= $saskaitos['accountNumber'] ?>
            <input type="hidden" name="accountNumber" value="<?= $saskaitos['accountNumber'] ?>">
        </div>
        <div class="mb-3">
            <label for="PersonalId">Asmens kodas</label>
            <?= $saskaitos['PersonId'] ?>
            <input type="hidden" name="PersonId" value="<?= $saskaitos['PersonId'] ?>">
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
