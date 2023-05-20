
    <script type="module">

        import { HidePreLoader } from "/site/js/index.js";


        let successMessage = '{{ session("success") }}';
        let errorMessage = '{{ session("failed") }}';





        $(function() {
            HidePreLoader();


if(successMessage && successMessage.length){
         Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: successMessage,
                    showConfirmButton: false,
                    timer: 3000
                    })
}

if(errorMessage && errorMessage.length){
    Swal.fire({
        icon: 'error',
           title: "{{ __('OOPS') }}",

            text:errorMessage,
            });
}

        })






    </script>



