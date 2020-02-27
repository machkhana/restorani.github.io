$('document').ready(function () {
    $('.filter').click(function () {
        $('#daterange').slideToggle();
    });
    $('.applyBtn').click(function () {
        var daterange =  $(".drp-selected").text();
        $.ajax({
            type:'GET',
            url:'class/ajax/filter.php',
            data: 'daterange='+ daterange,
            dataType: 'html',
            beforeSend:function () {
                $(".backgroundalerts").css('display','block');
                $(".backgroundalerts").append("<p class='text-success loading'> <i class='fa fa-spinner fa-spin fa-1x fa-fw'></i> მიმდინარეობს ჩატვირთვა.. </p>");
                $(".text-warning").remove();
            },
            success:function(data) {
                if(data=='0') {
                    $(".loading").remove();
                    $(".backgroundalerts").css('display','none');
                    $("#reportbuttons").append("<p class='text-warning'>ფილტრის დიაპაზონი აირჩიეთ სწორათ, ან ბაზაში არ არის ჩანაწერი ! </p>");
                    $("#viewside").css('display','block');
                    $("#filterside").css('display','none');
                    $("#create_excel").val('all');
                }else{
                    $(".loading").remove();
                    $(".backgroundalerts").css('display','none');
                    $("#viewside").css('display','none');
                    $("#filterside").css('display','block').html(data);
                    $("#create_excel").val(daterange);
                    // $.get("./class/ajax/filterrange.php?daterange="+daterange, function ( data) {
                    //     $("#filterside").html(data);
                    // })
                }
            },
            error:function (data) {
                //#GE33TB7174136080100010
            }
        });
    });
    $("#sendexcel").click(function () {
        $("#exportform").submit();
    })
    // $('#create_excel').click(function(){
    //     var excel_data = $(this).data('range');
    //     $.ajax({
    //         type: 'GET',
    //         url: 'class/ajax/exportxls.php',
    //         data: 'exportexcel='+ excel_data,
    //         // beforeSend:function () {
    //         //     $(".backgroundalerts").css('display','block');
    //         //     $(".backgroundalerts").append("<p class='text-success loading'> <i class='fa fa-spinner fa-spin fa-1x fa-fw'></i> მიმდინარეობს ჩატვირთვა.. </p>");
    //         //     $(".text-warning").remove();
    //         // },
    //         success:function(data){
    //
    //         }
    //     });
    //     //var page = "class/ajax/exportxls.php?data=" + excel_data;
    //     //window.location = page;
    // });
});
