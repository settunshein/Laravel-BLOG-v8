$(document).on('click', '.del-comment-btn', function(e){
    e.preventDefault();
    let id = $(this).data('id');
    Swal.fire({
        title: 'Are You Sure?',
        text: "Do You Want to Delete this Comment?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        onfirmButtonText: 'OK',
        cancelButtonText: 'CANCEL',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $('.deleteCommentForm'+id).submit();
        }
    })
})/* End of Post Confirm Delete */