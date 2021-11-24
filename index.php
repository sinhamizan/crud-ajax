<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Request</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="modal">
        <div class="modal-form">
            <div class="modal-title">
                <h3>Edit Data</h3>
            </div>

            <div class="modal-close">
                <p id="close_icon">X</p>
            </div>

            <div class="modal-body">
                
            </div>
        </div>
    </div>

    <form action="" id="reset_form">
        <input type="text" placeholder="Name" id="name" required>
        <input type="email" placeholder="Email" id="email" required>
        <input type="submit" value="Submit" id="submit">
    </form>
    <div id="error_msg"></div>
    <div id="success_msg"></div>
    <br><br>

    <!-- <button id="load_data">Load Data</button> -->

    <div class="search">
        <input type="text" placeholder="Search......" id="search">
    </div><br> <br> <br>

    <div id="show_data"></div>

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
    <script href="js/main.js"></script>

    <script>

        $( document ).ready(function(){
            // $('#load_data').on('click', function(e){
            //     $.ajax({
            //         url: 'ajax-load.php',
            //         type: 'POST',
            //         success: function(data){
            //             $('#show_data').html(data)
            //         }
            //     })
            // });

            function load_data() {
                $.ajax({
                    url: 'ajax-load.php',
                    type: 'POST',
                    success: function(data) {
                        $('#show_data').html(data)
                    }
                })
            }
            load_data();


            $('#submit').on('click', function(e){
                e.preventDefault(); //reload off korar jonno ai method use hoi

                var name = $('#name').val();
                var email = $('#email').val();
                
                if ( name === '' || email === '' ) {
                    $('#error_msg').html("Please Fill Up all fields.").slideDown();
                }else {
                    $.ajax({
                        url: 'data-insert.php',
                        type: 'POST',
                        data: {name:name, email:email},
                        success: function(data) {
                            if( data == 1 ) {
                                load_data();
                                $('#reset_form').trigger('reset');
                            }else{
                                alert("Don't Saved!");
                            }
                        }
                    })
                    $('#success_msg').html('Successfully added Data.');
                }

            });

            $(document).on('click', '#delete_data', function(){
                if ( confirm("Do you want to delete this data?") ) {
                    var delete_id = $(this).data('id');
                    var element = this;
                    
                    $.ajax({
                        url: 'delete-data.php',
                        type: 'POST',
                        data: {id:delete_id},
                        success: function(data) {
                            if( data == 1 ) {
                                $(element).closest('tr').fadeOut();
                            }else{
                                alert("Don't Deteled!");
                            }
                        }
                    })
                }
            });

            $(document). on('click', '#edit_data', function(){
                $('#modal').show();
                var edit_id = $(this).data('eid');
                
                $.ajax({
                    url: 'edit-data.php',
                    type: 'POST',
                    data: {id:edit_id},
                    success: function(data) {
                        $('.modal-body').html(data);
                    }
                })
            });

            $(document). on('click', '#update', function(){
                var id = $('#edit_id').val();
                var name = $('#edit_name').val();
                var email = $('#edit_email').val();

                $.ajax({
                    url: 'save-edit-data.php',
                    type: 'POST',
                    data: {id: id, name: name, email: email},
                    success: function(data) {
                        if ( data == 1 ) {
                            $('#modal').hide();
                            load_data();
                        } else {
                            alert("not woring");
                        }
                    }
                });
            });

            $('#close_icon').on('click', function(){
                $('#modal').hide();
            })

            $('#search'). on('keyup', function(){
                var search_data = $(this).val();
                
                $.ajax({
                    url: 'search-data.php',
                    type: 'POST',
                    data: {search_data:search_data},
                    success: function(data) {
                        $('#show_data').html(data);
                    }
                });
            });







        });
    </script>
</body>
</html>