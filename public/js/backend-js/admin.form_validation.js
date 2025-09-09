$(document).ready(function(){

    // admin panel delete function popups
    $(document).on('click', '.sa-confirm-delete', function() {
        var id = $(this).attr('param-id');
        var deleteFunction = $(this).attr('param-route');
        console.log(id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {

            if (result.value) {
                window.location.href="/admin/"+deleteFunction+"/"+id;
            }
        })
    }); 


});