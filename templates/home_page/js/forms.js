/* Select2 + ক্যালেন্ডার (flatpickr) চালু করা */
(function () {
  function init() {
    if (window.jQuery && jQuery.fn.select2) {
      jQuery('.js-select2').each(function () {
        jQuery(this).select2({
          theme: 'bootstrap-5',
          width: '100%',
          minimumResultsForSearch: 8,
          language: { noResults: function () { return 'কিছু পাওয়া যায়নি'; } }
        });
      });
    }
    if (window.flatpickr) {
      if (flatpickr.l10ns && flatpickr.l10ns.bn) { flatpickr.localize(flatpickr.l10ns.bn); }
      document.querySelectorAll('.js-date').forEach(function (box) {
        flatpickr(box, {
          wrap: true,
          dateFormat: 'Y-m-d',
          maxDate: 'today',
          allowInput: true,
          disableMobile: true,
          monthSelectorType: 'dropdown'
        });
      });
    }
  }
  if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', init); } else { init(); }
})();
