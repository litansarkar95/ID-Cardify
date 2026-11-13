<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="page-title mb-0">সেভ করা ডিজাইন</h1>
  <a href="<?= site_url('badgemake/create') ?>" class="btn btn-primary">নতুন ডিজাইন</a>
</div>
<div class="card"><div class="table-responsive">
<table class="table mb-0">
  <thead><tr><th>ডিজাইন</th><th>ফর্ম</th><th>টেমপ্লেট</th><th></th></tr></thead>
  <tbody>
  <?php foreach ($designs as $d): ?>
    <tr>
      <td><?= html_escape($d->title) ?></td>
      <td><?= html_escape($d->group_title) ?></td>
      <td><?= html_escape($d->template_name) ?></td>
      <td class="text-end">
        <a class="btn btn-sm btn-light border" href="<?= site_url("main/badgemake/create/{$d->group_id}/{$d->id}") ?>">খুলুন / প্রিন্ট</a>
        <a class="btn btn-sm btn-light border text-danger" onclick="return confirm('মুছবেন?')" href="<?= site_url('main/badgemake/delete/' . $d->id) ?>">মুছুন</a>
      </td>
    </tr>
  <?php endforeach; ?>
  <?php if (!$designs): ?><tr><td colspan="4" class="text-muted">এখনো কোনো ডিজাইন নেই</td></tr><?php endif; ?>
  </tbody>
</table></div></div>