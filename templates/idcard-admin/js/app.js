/* ============ Admin Panel – small helper script ============
   Sidebar, topbar and all page content are plain HTML.
   This file only adds behaviour: menu toggle, clock, Select2, date picker. */
(function () {
  const body = document.body;
  const desktop = window.matchMedia('(min-width: 992px)');
  const save = v => { try { localStorage.setItem('sidebar-mini', v); } catch (e) {} };
  try { if (localStorage.getItem('sidebar-mini') === '1') body.classList.add('sidebar-mini'); } catch (e) {}

  /* Sidebar: desktop = mini (icons only), mobile = slide-in with close button */
  document.addEventListener('click', function (e) {
    if (e.target.closest('#toggleSidebar')) {
      if (desktop.matches) { body.classList.toggle('sidebar-mini'); save(body.classList.contains('sidebar-mini') ? '1' : '0'); }
      else body.classList.toggle('sidebar-open');
    } else if (e.target.closest('#closeSidebar, #sidebarOverlay')) {
      body.classList.remove('sidebar-open');
    } else if (!desktop.matches && e.target.closest('.sidebar .menu a[href]:not([data-bs-toggle])')) {
      body.classList.remove('sidebar-open');
    }
    // language sub-menu (tap on touch screens)
    const sm = e.target.closest('[data-submenu]');
    if (sm) { e.preventDefault(); e.stopPropagation(); sm.parentElement.classList.toggle('open'); }
    const lang = e.target.closest('.dropdown-submenu .sub a');
    if (lang) {
      e.preventDefault();
      lang.closest('.sub').querySelectorAll('a').forEach(a => a.classList.remove('checked'));
      lang.classList.add('checked');
    }
  });
  document.addEventListener('keydown', e => { if (e.key === 'Escape') body.classList.remove('sidebar-open'); });
  desktop.addEventListener('change', () => body.classList.remove('sidebar-open'));

  /* Live clock */
  const t = document.getElementById('clockTime'), d = document.getElementById('clockDate');
  if (t) {
    const tick = () => {
      const n = new Date();
      t.textContent = n.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
      d.textContent = n.toLocaleDateString('en-GB', { weekday: 'short', day: '2-digit', month: 'short', year: 'numeric' });
    };
    tick(); setInterval(tick, 1000);
  }

  /* Select2 on every <select> (add class "no-select2" to skip one) */
  if (window.jQuery && jQuery.fn.select2) {
    jQuery('select').not('.no-select2').each(function () {
      const $s = jQuery(this);
      if ($s.hasClass('form-select-sm')) $s.addClass('select2-sm');
      $s.removeClass('form-select form-select-sm').select2({
        width: this.style.width || '100%',
        placeholder: $s.data('placeholder') || undefined,
        allowClear: !!$s.data('clear'),
        tags: !!$s.data('tags'),
        minimumResultsForSearch: $s.find('option').length > 7 || $s.data('search') ? 0 : Infinity,
        dropdownParent: $s.closest('.modal').length ? $s.closest('.modal') : jQuery(document.body)
      });
    });
  }

  /* Date picker: <input class="datepicker"> + calendar button */
  if (window.flatpickr) {
    document.querySelectorAll('input.datepicker').forEach(inp => {
      const fp = flatpickr(inp, { dateFormat: 'Y-m-d', allowInput: true, disableMobile: true });
      const btn = inp.parentElement.querySelector('.btn-icon');
      if (btn) btn.addEventListener('click', () => fp.open());
    });
  }
})();
