


// $(document).on('click','edit', function(event){
//     event.preventDefault();
//     var id = $(this).val();
//     alert(id);

//     // if(check){
//     //     $.ajax({
//     //         url : 'server/del.php',
//     //         type : POST ,
//     //         dataType  : 'html',
//     //         data : { id : id},


//     //         success : function (data){
//     //             $("#table-cart").load(".data-table");
//     //         }
//     //     });
//     // }

//    // edit


// });
// $(document).ready  (function(){
//      $('.edit').click(function(){
//         let id = $(this).data('id');

//         // edit
//         $.ajax({
//             URL: 'hoctructuyen/public/edit/' + id,
//             dataType : 'json',
//             type: 'get',
//             success: function($result){
//                 console.log($result);
//                 $('name').val
//             }

//         });

//      });
// });



 // xóa giảng viên
 $(document).on("click", ".delete" , function() {
        let id = $(this).data('id');
        $('.del').click(function(){
            $.ajax({
                url: 'delete_admin/'+id,
                dataType : 'json',
                type: 'get',
                success: function (data) {
                   console.log(data);
                   $("#table_giangvien").load(" .data-table");
                   $('#delete').modal('hide');
                },

            });
        });
      });

// xóa khóa học
$(document).on("click", ".xoa" , function() {
    let id = $(this).data('id');
    $('.del').click(function(){
        $.ajax({
            url: 'delete_courses/'+id,
            dataType : 'json',
            type: 'get',
            success: function (data) {
               console.log(data);
               $("#khoahoc").load(" .courses");
               $('#xoa').modal('hide');
            },

        });
    });
  });

  $(document).on("click", ".xoa_nhom" , function() {
    let id = $(this).data('id');
    $('.del').click(function(){
        $.ajax({
            url: 'xoa_group/'+id,
            dataType : 'json',
            type: 'get',
            success: function (data) {
                console.log(data);
                $("#table_giangvien").load(" .data-table");
                $('#delete').modal('hide');
             },

        });
    });
  });
// thêm cod


// $(document).on("click", ".insert", function(){
//     $.ajax({
//         url:'themgv',
//         dataType: 'json',
//         type: 'post',
//         success:function(data){
//             console.log(data);
//             $("#table_giangvien").load(" .data-table");
//         },
//     });
// })

// xóa Student courses

// Delete record
// $(document).on("click", ".delete" , function() {
//     var delete_id = $(this).data('id');
//     var el = this;
//     $('.del').click(function(){
//     $.ajax({
//       url: 'delete_admin/'+delete_id,
//       type: 'get',
//       success: function(response){
//         $(el).closest( "tr" ).remove();
//         alert(response);
//       }
//     });
//     });
//   });

