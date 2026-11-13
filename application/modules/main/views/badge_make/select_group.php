<h1 class="page-title mb-3">Badge Make</h1>
<div class="card" style="max-width:520px">
  <div class="card-header">ফর্ম সিলেক্ট করুন</div>
  <div class="card-body">
    <?php if (!$groups): ?>
      <p class="text-muted mb-0">কোনো ফর্ম নেই। আগে একটি ফর্ম তৈরি করুন।</p>
    <?php else: ?>
      <select class="form-select mb-3" id="grp">
        <option value="">-- ফর্ম বেছে নিন --</option>
        <?php foreach ($groups as $g): ?>
          <option value="<?= (int) $g->id ?>"><?= html_escape($g->title) ?></option>
        <?php endforeach; ?>
      </select>
      <button class="btn btn-primary" id="go">পরবর্তী</button>
    <?php endif; ?>
  </div>
</div>
<script>
$('#go').on('click', function () {
  var id = $('#grp').val();
  if (id) location.href = '<?= site_url('main/badgemake/create/') ?>' + id;
});
</script>