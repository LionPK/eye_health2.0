    $(document).ready( function () {
        // $('#dataTables-user-log').DataTable();
        $('#dataTables-user-list').DataTable({
            "bFilter": true,
            "paging":   false,

            // "iDisplayLength": 20,
            "order": [[ 0, "asc" ]]
            // "bDestroy": true,
        });
     } );


    function reset_confirmation(email,id) {
        $( "#reset-users-email" ).html(email);
        $('#resetYesButton').attr("onclick","reset_submit('"+email+"',"+id+")");
    }


    function reset_submit(email,id) {
        show_loading();
            $.ajax({
            url: $("#base-url").val()+"user/reset_users_password/"+email+"/"+id,
            cache: false,
            success: function (result) {
                var result = $.parseJSON(result);

                if(result.status=='success') {
                    location.reload();
                }else {
                    alert("มีบางอย่างผิดปกติ!");

                }
            },
            error: ajax_error_handling
        });
    }