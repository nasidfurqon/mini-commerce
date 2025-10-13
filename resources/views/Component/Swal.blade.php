
@once
<script>
document.addEventListener('DOMContentLoaded', function () {
  function isSwalAvailable() {
    return typeof Swal !== 'undefined';
  }

  var buttons = document.querySelectorAll('[data-form-id][data-type]');
  buttons.forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      var formId = btn.getAttribute('data-form-id');
      var nama = btn.getAttribute('data-nama') || '';
      var type = btn.getAttribute('data-type') || 'data';
      var itemLabel = type === 'product' ? 'produk' : (type === 'category' ? 'kategori' : 'data');
      var messageText = nama ? ('Data ' + itemLabel + ' \"' + nama + '\" akan dihapus. Tindakan ini tidak dapat dibatalkan!') : 'Tindakan ini tidak dapat dibatalkan!';

      if (!isSwalAvailable()) {
        if (confirm('Yakin ingin menghapus ' + (nama || itemLabel) + '?')) {
          var fallbackForm = document.getElementById(formId);
          if (fallbackForm) fallbackForm.submit();
        }
        return;
      }

      Swal.fire({
        title: 'Are you sure?',
        text: messageText,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
        cancelButtonClass: 'btn btn-danger w-xs mt-2',
        buttonsStyling: false,
        showCloseButton: false
      }).then(function (result) {
        if (result.value) {
          var form = document.getElementById(formId);
          if (form) {
            Swal.fire({
              title: 'Deleted!',
              text: 'Your file has been deleted.',
              icon: 'success',
              confirmButtonClass: 'btn btn-primary w-xs mt-2',
              buttonsStyling: false
            }).then(function(){
              form.submit();
            });
          } else {
            Swal.fire({
              title: 'Form not found',
              text: 'Form penghapusan tidak ditemukan.',
              icon: 'error',
              confirmButtonClass: 'btn btn-primary mt-2',
              buttonsStyling: false
            });
          }
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire({
            title: 'Cancelled',
            text: 'Penghapusan dibatalkan.',
            icon: 'error',
            confirmButtonClass: 'btn btn-primary mt-2',
            buttonsStyling: false
          });
        }
      });
    });
  });
});
</script>
@endonce