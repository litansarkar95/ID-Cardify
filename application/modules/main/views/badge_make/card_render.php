<?php
// $data ইউজারের পছন্দের ক্রমে আছে। ছবি/ফাইল টাইপ বাদ দিয়ে টেক্সট আইটেম:
$texts = array_values(array_filter($data, function ($r) { return !in_array($r['type'], ['image', 'file']); }));
?>
<?php foreach (['front', 'back'] as $side):
    if ($side == 'back' && !$tpl->has_back) continue;
    $bg = $side == 'front' ? $tpl->front_bg : $tpl->back_bg; ?>
<div class="id-card" style="width:<?= $tpl->width_mm ?>mm;height:<?= $tpl->height_mm ?>mm;position:relative;
     <?= $bg ? "background-image:url('" . base_url($bg) . "');background-size:cover;" : '' ?>">
  <?php foreach ($elements as $e): if ($e->side != $side) continue;
    $style = "position:absolute;left:{$e->pos_x}mm;top:{$e->pos_y}mm;"
           . ($e->width  ? "width:{$e->width}mm;"   : '')
           . ($e->height ? "height:{$e->height}mm;" : '')
           . "font-size:{$e->font_size}pt;font-weight:{$e->font_weight};color:{$e->font_color};"
           . "text-align:{$e->text_align};z-index:{$e->z_index};line-height:1.25;overflow:hidden;"
           . ($e->bg_color ? "background:{$e->bg_color};" : '')
           . ($e->border_radius ? "border-radius:{$e->border_radius}mm;" : ''); ?>
    <div style="<?= $style ?>">
    <?php
    $key = $e->source_key;
    switch ($e->element_type) {

      case 'text':
        if ($e->source_type == 'field' && preg_match('/^@(\d+)$/', $key, $m)) {
            $row = $texts[$m[1] - 1] ?? null;
            echo $row ? html_escape($e->label_text . $row['value']) : '';
        } elseif ($key == 'institution_name')    { echo html_escape($inst->name); }
        elseif ($key == 'institution_address')   { echo html_escape($inst->address); }
        break;

      case 'field_list':
        $start = preg_match('/^@(\d+)\+$/', $key, $m) ? $m[1] - 1 : 1;
        foreach (array_slice($texts, $start) as $row) {
            echo '<div>' . html_escape($row['label']) . ': ' . html_escape($row['value']) . '</div>';
        }
        break;

      case 'image':
        if ($key == 'photo') {
            echo '<img src="' . base_url('assets/img/demo-photo.png') . '" style="width:100%;height:100%;object-fit:cover" alt="">';
        } elseif ($key == 'institution_logo' && $inst->picture) {
            echo '<img src="' . base_url($inst->picture) . '" style="max-width:100%;max-height:100%" alt="">';
        } elseif ($key == 'signature' && $inst->signature_picture) {
            echo '<img src="' . base_url($inst->signature_picture) . '" style="max-width:100%;max-height:100%" alt="">';
        }
        break;

      case 'qr':
        echo '<img src="' . site_url('qr/demo') . '" style="width:100%;height:100%" alt="QR">';
        break;

      case 'static_text':
        echo nl2br(html_escape($e->static_text));
        break;

      // shape: শুধু ব্যাকগ্রাউন্ড, কিছু আঁকতে হয় না
    } ?>
    </div>
  <?php endforeach; ?>
</div>
<?php endforeach; ?>