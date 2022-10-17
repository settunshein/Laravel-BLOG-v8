$(document).on('click', '.del-category-btn', function(e){
    e.preventDefault();
    let id = $(this).data('id');
    Swal.fire({
        title: 'Are You Sure?',
        text: "Do You Want to Delete this Category?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        onfirmButtonText: 'OK',
        cancelButtonText: 'CANCEL',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $('.deleteCategoryForm'+id).submit();
        }
    })
})/* End of Category Confirm Delete */