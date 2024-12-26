
<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="container py-4">
    <?php if (session()->has('message')): ?>
        <div class="alert alert-<?= session('type') ?> alert-dismissible fade show">
            <i class="fas fa-<?= session('type') === 'success' ? 'check-circle' : 'exclamation-circle' ?> me-2"></i>
            <?= session('message') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="row mb-4">
        <div class="col">
            <h2><i class="fas fa-sticky-note me-2"></i>Notlarım</h2>
        </div>
        <div class="col text-end">
            <a href="<?= base_url('notes/create') ?>" class="btn btn-primary">
                <i class="fas fa-plus-circle me-2"></i>Yeni Not
            </a>
        </div>
    </div>

    <?php if (empty($notes)): ?>
        <div class="alert alert-info">
            <i class="fas fa-info-circle me-2"></i>Henüz not eklenmemiş.
            <a href="<?= base_url('notes/create') ?>" class="alert-link">Hemen bir not ekleyin!</a>
        </div>
    <?php else: ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($notes as $note): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header d-flex justify-content-between align-items-center <?= $note['is_private'] ? 'bg-warning bg-opacity-10' : '' ?>">
                            <h5 class="card-title mb-0 text-truncate" title="<?= esc($note['title']) ?>">
                                <?= esc($note['title']) ?>
                            </h5>
                            <?php if ($note['is_private']): ?>
                                <i class="fas fa-lock text-warning" title="Özel Not"></i>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <p class="card-text" style="min-height: 4.5rem;">
                                <?= character_limiter(esc($note['content']), 100) ?>
                            </p>
                            <p class="card-text">
                                <small class="text-muted">
                                    <i class="fas fa-folder me-1"></i>
                                    <?= esc($note['category_name']) ?>
                                </small>
                            </p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="btn-group w-100">
                                <a href="<?= base_url('notes/edit/' . $note['id']) ?>" class="btn btn-outline-primary">
                                    <i class="fas fa-edit"></i> Düzenle
                                </a>
                                <button type="button" class="btn btn-outline-danger" 
                                        onclick="confirmDelete(<?= $note['id'] ?>, '<?= esc($note['title']) ?>')">
                                    <i class="fas fa-trash"></i> Sil
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<script>
function confirmDelete(id, title) {
    if (confirm(`"${title}" notunu silmek istediğinizden emin misiniz?`)) {
        window.location.href = `<?= base_url('notes/delete/') ?>/${id}`;
    }
}
</script>
<?= $this->endSection() ?>
