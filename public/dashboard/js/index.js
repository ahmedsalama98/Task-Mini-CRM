$(function(){


    $('form.delete-btn').on('submit', function(event){
        event.preventDefault()

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {


              event.target.submit();
            }
          })


    })



    $('.image-preview-container input').on('change', function(event){
        let output = $(this).parent('div').parent('.image-preview-container').find('img');

   let reader = new FileReader();
    reader.onload = function(){

      output.attr('src', reader.result)

    };

    reader.readAsDataURL(event.target.files[0]);


    })

})
