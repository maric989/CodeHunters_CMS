// $(function() {
//     $(document).ready(function () {
//         console.log('ddddd');
//         $('#downvote').on('click', function (e) {
//             $.ajaxSetup({
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 }
//             })
//             e.preventDefault(e);
//             var post_id = $('post_id')
//             $.ajax({
//
//                 type: "POST",
//                 url: 'downlike',
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