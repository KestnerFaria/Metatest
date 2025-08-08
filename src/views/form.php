<?php include 'header.php'; ?>
<?php $isEdit = isset($pet); ?>
<h2><?= $isEdit ? 'Editar Pet' : 'Novo Pet' ?></h2>
<form method="post" action="?action=save">
  <?php if($isEdit): ?>
    <input type="hidden" name="id" value="<?= $pet->id ?>">
  <?php endif; ?>

  <div class="mb-3">
    <label class="form-label">Nome</label>
    <input name="nome" class="form-control"
           value="<?= $isEdit ? htmlspecialchars($pet->nome) : '' ?>" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Tutor</label>
    <input name="tutor" class="form-control"
           value="<?= $isEdit ? htmlspecialchars($pet->tutor) : '' ?>" required>
  </div>

  <button class="btn btn-success"><?= $isEdit ? 'Atualizar' : 'Cadastrar' ?></button>
  <a class="btn btn-secondary" href="?action=list">Cancelar</a>
</form>
<?php include 'footer.php'; ?>
