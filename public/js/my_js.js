$(document).ready( function () {
    $('#btn_down').on('click', function (e) {
        // console.log('hej');
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
           $.ajax({
              url: '/posteri/downlike',
              type: 'POST',
              data: {
                  id : 12
              },
              dataType : 'JSON',

              success:function(response) {
                  alert(response);
           }
        })
    })
});
