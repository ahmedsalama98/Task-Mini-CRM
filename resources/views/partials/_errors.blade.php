{{-- @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif --}}

@if (session('failed'))

    <script>
        // toastr.error("{{ session('failed') }}");
        // toastr.options.closeButton = true;

Swal.fire({
  icon: 'error',
  title: "{{ __('site.OOPS') }}",
  text: '{{ session('failed') }}',
})
    </script>



@endif
