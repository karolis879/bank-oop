<div class="containeris">
    <div class="form-containeris">
        <h1>Login</h1>
        <form action="<?= '/login' ?>" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com" value="<?= $old['email'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-dark">Login</button>
        </form>
    </div>
</div>
