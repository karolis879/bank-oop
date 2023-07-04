<div class="delete">
    <div class="card">
        <h5 class="card-header">Patvirtinti sąskaitos trinimą</h5>
        <div class="card-body">
            <h5 class="card-title">Ar tikrai norite ištrint šią sąskaitą?</h5>
            <h2><?= $saskaitos['first_name'] ?></h2>
            
            <form action="/saskaitos/destroy/<?= $saskaitos['id'] ?>" method="post">
                <div>
                    <button class="btn btn-dark" type="submit">Ištrinti</button>
                </div>
                <div>
                    <a  href="/saskaitos">Atšaukti</a>
                </div>
            </form>
            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        </div>
    </div>