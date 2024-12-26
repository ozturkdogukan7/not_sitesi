<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Sistemi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <i class="fas fa-book-open me-2"></i>Not Sistemi
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <?php if (session()->get('is_admin')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin') ?>">Kullanıcılar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin/notes') ?>">Tüm Notlar</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('notes') ?>">Notlarım</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('notes/create') ?>">Not Ekle</a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <li class="nav-item">
                            <span class="nav-link">
                                <i class="fas fa-user me-2"></i><?= session()->get('username') ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                                <i class="fas fa-sign-out-alt me-2"></i>Çıkış
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth/login') ?>">
                                <i class="fas fa-sign-in-alt me-2"></i>Giriş
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth/register') ?>">
                                <i class="fas fa-user-plus me-2"></i>Kayıt Ol
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-<?= session()->getFlashdata('type') ?> alert-dismissible fade show">
                <?= session()->getFlashdata('message') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
