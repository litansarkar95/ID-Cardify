<div class="d-flex justify-content-between align-items-center mb-3 no-print">
  <h1 class="page-title mb-0"><?= html_escape($group->title) ?></h1>
  <a href="<?= site_url('main/badgemake') ?>" class="btn btn-light border">Back</a>
</div>

<div class="row g-3">
  <div class="col-xl-5 no-print">
    <div class="card mb-3">
      <div class="card-header">ডিজাইনের নাম</div>
      <div class="card-body">
        <input type="text" id="dTitle" class="form-control" placeholder="যেমন: অফিস কার্ড ২০২৬"
               value="<?= html_escape($design ? $design->title : '') ?>">
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header">টেমপ্লেট</div>
      <div class="card-body d-flex flex-wrap gap-2">
        <?php foreach ($templates as $t): ?>
          <button type="button"
                  class="btn border tpl-btn <?= ($design && $design->template_id == $t->id) ? 'btn-primary' : 'btn-light' ?>"
                  data-id="<?= (int) $t->id ?>"><?= html_escape($t->name) ?></button>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="card">
      <div class="card-header">কার্ডে কোন ফিল্ড থাকবে (টিক দিন, ড্র্যাগ করে ক্রম ঠিক করুন)</div>
      <ul class="list-group list-group-flush" id="fieldList">
        <?php foreach ($fields as $f): ?>
          <li class="list-group-item d-flex align-items-center gap-2">
            <i class="bi bi-grip-vertical drag" style="cursor:grab"></i>
            <input type="checkbox" class="form-check-input mt-0" value="<?= (int) $f->id ?>"
                   <?= in_array($f->id, $selected) ? 'checked' : '' ?>>
            <span class="flex-grow-1"><?= html_escape($f->field_label_bn) ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="card-footer small text-muted">
        ১ম ফিল্ড কার্ডে বড় করে (নাম হিসেবে) বসে, বাকিগুলো তালিকায়।
      </div>
    </div>
  </div>

  <div class="col-xl-7">
    <div class="card print-area">
      <div class="card-header d-flex justify-content-between align-items-center no-print">
        Live preview
        <div class="d-flex gap-2">
          <button class="btn btn-sm btn-light border" id="btnSave"><i class="bi bi-save"></i> Save</button>
          <button class="btn btn-sm btn-primary" id="btnPrint"><i class="bi bi-printer"></i> Print</button>
        </div>
      </div>
      <div class="card-body" id="cardPreview">
        <p class="text-muted mb-0">বাম থেকে একটি টেমপ্লেট বেছে নিন</p>
      </div>
    </div>
  </div>
</div>

<style>
@media print {
  body * { visibility: hidden; }
  #cardPreview, #cardPreview * { visibility: visible; }
  #cardPreview { position: absolute; left: 0; top: 0; }
  .id-card { page-break-inside: avoid; margin-bottom: 4mm; }
}
.id-card { border: 1px solid #ddd; margin: 0 auto 12px; overflow: hidden; background-color: #fff; }
</style>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
<script>
$(function () {
  var G = <?= (int) $group->id ?>,
      TPL = <?= $design ? (int) $design->template_id : 0 ?>,
      DESIGN = <?= $design ? (int) $design->id : 0 ?>,
      csrfName = '<?= $this->security->get_csrf_token_name() ?>',
      csrfHash = '<?= $this->security->get_csrf_hash() ?>';

  function ids() { return $('#fieldList input:checked').map(function () { return this.value; }).get(); }
  function payload(extra) {
    var d = { group_id: G, template_id: TPL, field_ids: ids() };
    d[csrfName] = csrfHash;
    return $.extend(d, extra || {});
  }
  function refresh() {
    if (!TPL) return;
    $.post('<?= site_url('main/badgemake/preview') ?>', payload(), function (html) {
      $('#cardPreview').html(html);
    });
  }

  Sortable.create(document.getElementById('fieldList'), { handle: '.drag', animation: 150, onEnd: refresh });
  $('#fieldList').on('change', 'input', refresh);

  $('.tpl-btn').on('click', function () {
    TPL = $(this).data('id');
    $('.tpl-btn').removeClass('btn-primary').addClass('btn-light');
    $(this).removeClass('btn-light').addClass('btn-primary');
    refresh();
  });

  $('#btnSave').on('click', function () {
    if (!TPL) { alert('আগে টেমপ্লেট বেছে নিন'); return; }
    $.post('<?= site_url('main/badgemake/save') ?>', payload({ design_id: DESIGN, title: $('#dTitle').val() }), function (r) {
      if (r.ok) { DESIGN = r.id; alert('সেভ হয়েছে'); } else { alert(r.msg || 'সেভ হয়নি'); }
    }, 'json');
  });

  $('#btnPrint').on('click', function () {
    if (!TPL) { alert('আগে টেমপ্লেট বেছে নিন'); return; }
    window.print();
  });

  refresh();   // সেভ করা ডিজাইন খুললে সাথে সাথে প্রিভিউ
});
</script>