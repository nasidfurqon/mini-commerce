@once
<script>
document.addEventListener('DOMContentLoaded', function () {
  function isSwalAvailable() {
    return typeof Swal !== 'undefined';
  }

  var buttons = document.querySelectorAll('[data-swal-checkout="true"]');
  if (!buttons || buttons.length === 0) return;

  var homeUrl = "{{ url('/') }}";
  var messageText = 'Yakin ingin melanjutkan checkout?';

  buttons.forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();

      if (!isSwalAvailable()) {
        if (confirm(messageText)) {
          alert('Checkout telah berhasil.');
          window.location.href = homeUrl;
        }
        return;
      }

      Swal.fire({
        title: 'Konfirmasi Checkout',
        text: messageText,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
        cancelButtonClass: 'btn btn-danger w-xs mt-2',
        buttonsStyling: false,
        showCloseButton: false
      }).then(function (result) {
        if (result.value) {
          Swal.fire({
            title: 'Berhasil',
            text: 'Checkout telah berhasil.',
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonClass: 'btn btn-primary w-xs mt-2',
            buttonsStyling: false
          }).then(function(){
            window.location.href = homeUrl;
          });
        }
      });
    });
  });
});
</script>
@endonce