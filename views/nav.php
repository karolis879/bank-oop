<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>">Pradinis puslapis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL . 'saskaitos' ?>">Sąskaitos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL . 'saskaitos/create' ?>">Pridėti naują sąskaitą</a>
        </li>
        <?php if (isset($_SESSION['email'])) : ?>
            <li class="nav-item">
                <form action="<?= URL . 'logout' ?>" method="post" style="display: inline;">
                    <button type="submit" class="nav-link">Atsijungti, <?= $_SESSION['name'] ?></button>
                </form>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= URL . 'login' ?>">Login</a>
            </li>
        <?php endif ?>
      </ul>

    </div>
  </div>
</nav>
