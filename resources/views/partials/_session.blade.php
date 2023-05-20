@if (session('success'))

    <script>
        // toastr.success("{{ session('success') }}");
        // toastr.options.closeButton = true;




Swal.fire({
  position: 'top-center',
  icon: 'success',
  title: '{{ session('success') }}',
  showConfirmButton: false,
  timer: 3000
})

    </script>



@endif
