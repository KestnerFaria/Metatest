<?php include 'header.php'; ?>
<h2>Lista de Pets</h2>
<table class="table table-striped">
  <thead>
    <tr><th>#</th><th>Nome</th><th>Tutor</th><th>Ações</th></tr>
  </thead>
  <tbody>
  <?php foreach($pets as $p): ?>
    <tr>
      <td><?= $p->id ?></td>
      <td><?= htmlspecialchars($p->nome) ?></td>
      <td><?= htmlspecialchars($p->tutor) ?></td>
      <td>
        <a class="btn btn-sm btn-warning" href="?action=edit&id=<?= $p->id ?>">Editar</a>
        <a class="btn btn-sm btn-danger" href="?action=delete&id=<?= $p->id ?>"
           onclick="return confirm('Excluir esse pet?')">Excluir</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php include 'footer.php'; ?>
