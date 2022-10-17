$(document).on('click', '.del-post-btn', function(e){
    e.preventDefault();
    let id = $(this).data('id');
    Swal.fire({
        title: 'Are You Sure?',
        text: "Do You Want to Delete this Post?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        onfirmButtonText: 'OK',
        cancelButtonText: 'CANCEL',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $('.deletePostForm'+id).submit();
        }
    })
})/* End of Post Confirm Delete */

$('.PostStatus').change(function(){
    let id = $(this).data('id');

    if($(this).prop('checked') == true){
        $.ajax({
            type: 'POST',
            url : '/admin/update-post-status/',
            data: { status: 1, id: id },

            success: function(response){
                if(response.message){
                    showSuccessMessage();
                }
            }
        })
    }else{
        $.ajax({
            type: 'POST',
            url : '/admin/update-post-status/',
            data: { status: 0, id: id },

            success: function(response){
                if(response.message){
                    showSuccessMessage();
                }
            }
        })
    }
});

function showSuccessMessage()
{
    Swal.fire({
        title: 'SUCCESS',
        text : "Post Status Update Successfully",
        icon : 'success',
    });
}