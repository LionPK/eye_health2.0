//    
    window.onload = hideErrorMessages();

    function hideErrorMessages(){
        $("#error_email").hide();
        $("#error_email2").hide();
        $("#error_email3").hide();
        $("#error_name").hide();
        $("#error_name2").hide();
        $("#error_surname").hide();
        $("#edit-error_email").hide();
        $("#edit-error_email2").hide();
        $("#edit-error_email3").hide();
        $("#edit-error_name").hide();
        $("#edit-error_name2").hide();
        $("#edit-error_surname").hide();
        hide_loading();
    }

    $(document).ready( function () {

        //$('#dataTables-user-log').DataTable();
        $('#dataTables-user-list').DataTable({
            "bFilter": true,
            "paging":   false,
            //"iDisplayLength": 20,
            "order": [[ 0, "asc" ]]
            //"bDestroy": true,
        });
     } );

    function edit_user_popup(email,id,name,surname){
        $( "#edit-email" ).val(email);
        $( "#edit-user-id" ).val(id);
        $( "#edit-name" ).val(name);
        $( "#edit-surname" ).val(surname);
        $('#editUserSubmit').attr("onclick","update_user_details("+id+")");
    }

    function deactivate_confirmation(email,id){
        $( "#user-email" ).html(email);
        $('#deactivateYesButton').attr("onclick","deactivate_submit('"+email+"',"+id+")");
    }

    function deactivate_submit(email,id){
        show_loading();
            $.ajax({
            url: $("#base-url").val()+"admin/deactivate_user/"+email+"/"+id,
            cache: false,
            success: function (result) {
                var result = $.parseJSON(result);
                if(result.status=='success'){
                    location.reload();
                }
                else{
                    alert("มีบางอย่างผิดปกติ!");
                }
            },
            error: ajax_error_handling
        });
    }

    function update_user_details(id){
        hideErrorMessages();
        show_loading();
        var i=0;
        var name = $('#edit-name').val().trim();
        var surname = $('#edit-surname').val().trim();
        var email = $('#edit-email').val().trim();

        if(name == ""){
            $("#edit-error_name").show();
            i++;
        }
        else if (!name.match(/^[A-Za-z0-9\s]+$/)) {
            $("#edit-error_name2").show();
            i++;
        }

        if(name == ""){
            $("#edit-error_surname").show();
            i++;
        }

        if(email == ""){
            $("#edit-error_email").show();
            i++;
        }
        else if (!email.match(/^[\w -._]+@[\-0-9a-zA-Z_.]+?\.[a-zA-Z]{2,3}$/)) {
            $("#edit-error_email3").show();
            i++;
        }

        if(i == 0){
            $.ajax({
                url: $("#base-url").val()+"admin/update_user_details/",
                traditional: true,
                type: "post",
                dataType: "text",
                data: {email: email, id:id, name:name, surname:surname},
                success: function (result) {
                    var result = $.parseJSON(result);
                    if(result.status=='success'){
                        location.reload();
                    }
                    else if(result.status=='exist'){
                        $("#edit-error_email2").show();
                        hide_loading();
                    }
                    else{
                        alert("มีบางอย่างผิดปกติ!");
                    }
                },
                error: ajax_error_handling
            });
        }
    }



    $( "#newUserSubmit" ).click(function() {
        hideErrorMessages();
        show_loading();
        var i=0;
        var name = $('#name').val().trim();
        var surname = $('#surname').val().trim();
        var email = $('#email').val().trim();
        var role = 'admin';

        if(name == ""){
            $("#error_name").show();
            i++;
        }
        else if (!name.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_name2").show();
            i++;
        }

        if(surname == ""){
            $("#error_surname").show();
            i++;
        }

        if(email == ""){
            $("#error_email").show();
            i++;
        }
        else if (!email.match(/^[\w -._]+@[\-0-9a-zA-Z_.]+?\.[a-zA-Z]{2,3}$/)) {
            $("#error_email3").show();
            i++;
        }

        if(i == 0){
            $.ajax({
                url: $("#base-url").val() + "admin/add_user",
                traditional: true,
                type: "post",
                dataType: "text",
                data: {email:email, role:role, name:name, surname:surname},
                success: function (result) {
                    var result = $.parseJSON(result);
                    if(result.status=='success'){
                        location.reload();
                    }
                    else if(result.status=='exist'){
                        $("#error_email2").show();
                        hide_loading();
                    }
                    else{
                        alert("มีบางอย่างผิดปกติ!");
                    }
                  
                },
                error: ajax_error_handling
            });
        }else{
            hide_loading();
        }
            
    });


