$(".changeprintmethod").click(function () {
    var status = $(".print:checked").val();
    $.ajax({
        type:'POST',
        url:'',
        data:{
            'printstatus':status
        },
        // success:function(data) {
        //     if(data == 'remove') {
        //         $("#orderid-"+ id).remove();
        //     }
        // }
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