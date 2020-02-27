$(document).ready(function () {
    $('#selectyear').change(function () {
        var value = $(this).val();
        $.ajax({
            url:'./class/ajax/yearrange.php',
            type:'GET',
            //dataType:'',
            data:'selectyear='+value,
            beforeSend:function () {
                $(".backgroundalerts").css('display','block');
                $(".backgroundalerts").append("<p class='text-success loading'> <i class='fa fa-spinner fa-spin fa-1x fa-fw'></i> მიმდინარეობს ჩატვირთვა.. </p>");
                $(".text-warning").remove();
            },
            success:function (data) {
                if(data){
                    $('#yearrange').remove();
                    $('#yearrangeprogressbar').html(data);
                    $(".backgroundalerts").css('display','none');
                }
            }
        })
    });
    $(".remove").click(function(){
        if(confirm("გსურთ წაიშალოს ?")){
            var id = $(this).attr('id');
            $.ajax({
                type:'POST',
                url:'',
                data:'delperson='+id,
                success:function(data) {
                    if(data) {
                        // $("#alert").css('display','');
                        $("#admin-"+ id).remove();
                    }
                }
            });
        }
    });
    $(".changeprintmethod").click(function () {
        var status = $(".print:checked").val();
        $.ajax({
            type:'POST',
            url:'',
            data:{
                'printstatus':status
            },
            beforeSend:function () {
                $(".backgroundalerts").css('display','block');
                $(".backgroundalerts").append("<p class='text-success loading'> <i class='fa fa-spinner fa-spin fa-1x fa-fw'></i> მიმდინარეობს ჩასწორება.. </p>");
            },
            success:function(data) {
                if(data) {
                    $(".loading").remove();
                    $(".backgroundalerts").css('display','none');
                }
            }
        });
    })
    $('#addProduct').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var username = button.data('username');
        //var id = $(this).attr('id');
        $(this).find('#userid').val(id);
        $(this).find('#username').val(username);
        //$(this).find('.modal-footer [name=addadmin]').text('განახლება');
    });
    // $('.update').click(function () {
    //     var id = $(this).attr('id');
    //     var username = $('#username').val();
    //     var password = $('#password').val();
    //     if(id > 0){
    //         $.ajax({
    //             url:'',
    //             type:'POST',
    //             dataType:'html',
    //             data:{
    //                 'id':id,
    //                 'username':username,
    //                 'password':password,
    //                 'update':'update'
    //             },
    //             beforeSend:function () {
    //                 $(".backgroundalerts").css('display','block');
    //                 $(".backgroundalerts").append("<p class='text-success loading'> <i class='fa fa-spinner fa-spin fa-1x fa-fw'></i> მიმდინარეობს ჩასწორება.. </p>");
    //             },
    //             success:function(data) {
    //                 $('#addProduct').modal('hide');
    //                 if(data==='success') {
    //                     console.log(data);
    //                     $(".loading").remove();
    //                     $(".backgroundalerts").css('display','none');
    //                 }else{
    //
    //                 }
    //             }
    //         })
    //     }else{
    //         $.ajax({
    //             url:'',
    //             type:'POST',
    //             dataType:'JSON',
    //             data:{
    //                 'username':username,
    //                 'password':password,
    //                 'addadmin':'addadmin'
    //             },
    //             beforeSend:function () {
    //                 $(".backgroundalerts").css('display','block');
    //                 $(".backgroundalerts").append("<p class='text-success loading'> <i class='fa fa-spinner fa-spin fa-1x fa-fw'></i> მიმდინარეობს დამატება.. </p>");
    //             },
    //             success:function(data) {
    //                 //var returnedData = JSON.parse(data);
    //                 $('#addProduct').modal('hide');
    //                 console.log(data);
    //                 //$('#user_data').text(data.username);
    //                 $(".loading").remove();
    //                 $(".backgroundalerts").css('display','none');
    //             }
    //         })
    //     }
    //
    // })
});