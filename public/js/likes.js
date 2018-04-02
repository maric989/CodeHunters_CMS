// $(document).ready( function () {
//     $('.poster_single > .btn_down').on('click', function () {
//         // console.log('hej');
//
//         var post = $('#post_id').val();
//         console.log(post);
//        // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//            $.ajax({
//               url: 'downlike',
//               type: 'POST',
//               headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//               },
//               data:  {post_id:post ,_token: $('meta[name="csrf-token"]').attr('content')},
//
//               success:function(response) {
//                  console.log(response);
//            }
//         })
//     })
// });
//
// $(function() {
//     $(document).ready(function () {
//         $('#downvote').on('submit', function (e) {
//             console.log('fffff');
//             $.ajaxSetup({
//                 header: $('meta[name="_token"]').attr('content')
//             })
//             e.preventDefault(e);
//
//             $.ajax({
//
//                 type: "POST",
//                 url: '/posteri/downlike',
//                 data: $(this).serialize(),
//                 dataType: 'json',
//                 success: function (data) {
//                     console.log(data);
//                 },
//                 error: function (data) {
//
//                 }
//             })
//         });
//     });
// });