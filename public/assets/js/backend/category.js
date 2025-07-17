$(document).ready(function () {

   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });



    $('#create-form-category').on('submit', function(e) {
        e.preventDefault();
    
        let formData = new FormData(this); 
    
        $.ajax({
            url: "/category/store",
            type: "POST",
            data: formData,
            processData: false, 
            contentType: false, 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            success: function(res) {
                console.log(res);
                Swal.fire({
                    title:" Created !",
                    text:res.message,
                    icon:"success"
                });
                $("#createModalCategory").modal('hide');
                $('#category-table').DataTable().ajax.reload(); 
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    
     $(document).on('click','#btn_edit_category',function(e){
        e.preventDefault();
        let id =  $(this).data('category-id');
        $.ajax({
            url:'/category/edit/'+id,
            type:"GET",
            success:function(response){
                let data = response.data;

                $('#category-id').val(data.id);
                $('#name').val(data.name);
                $('#slug').val(data.slug);
                $('#description').val(data.description);
                $('#image').val(data.image);
                $('#meta_title').val(data.meta_title);
                $('#meta_description').val(data.meta_description);
            },
            error:function(response){

            }
        })
    });

    $('#edit-form-category').on('submit', function(e) {
        e.preventDefault();
        let id =  $('#category-id').val();
        let formData = new FormData(this); 
        $.ajax({
            url: "/category/update/"+id,
            type: "POST",
            data: formData,
            processData: false, 
            contentType: false, 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            success: function(res) {
                console.log(res);
                Swal.fire({
                    title:" Updated !",
                    text:res.message,
                    icon:"success"
                });
                $("#editModalCategory").modal('hide');
                $('#category-table').DataTable().ajax.reload(); 
            },
            error: function(error) {
                console.log(error);
            }
        });
    });



     $(document).on("click","#btn_delete_category",function(e){
        e.preventDefault();
        let id = $(this).data('category-id');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
          }).then((result) => {
            if (result.isConfirmed) {
          
                $.ajax({
                    url:"/category/delete/"+id,
                    type:"DELETE",
                    success:function(res){
                        Swal.fire({
                            title: "Deleted!",
                            text: res.message,
                            icon: "success"
                          });
                          $('#category-table').DataTable().ajax.reload(); 

                    },
                    error:function(res){
                        Swal.fire({
                            title: "Deleted failed!",
                            text: res.message,
                            icon: "error"
                          });                    }
                })
            }
          });
    });



});
