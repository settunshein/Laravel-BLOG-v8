$(document).on('click', '.del-user-btn', function(e){
    e.preventDefault();
    let id = $(this).data('id');
    Swal.fire({
        title: 'Are You Sure?',
        text: "Do You Want to Delete this User?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        onfirmButtonText: 'OK',
        cancelButtonText: 'CANCEL',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $('.deleteUserForm'+id).submit();
        }
    })
})/* End of User Confirm Delete */