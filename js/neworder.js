function checkCode() {
    var inputedtext = $("#code").val();
    if(inputedtext.length == false){

    }else{
        $.ajax({
            type:'GET',
            url:'class/requests/checkorder.php',
            data: 'checkorder='+inputedtext,
            beforeSend:function(){
                $("#checkcode").append("<p class='text-success checkemail'> <i class='fa fa-spinner fa-spin fa-1x fa-fw'></i> მოწმდება ქვითრის ნომერი.. </p>");
            },
            success:function(data) {
                if(data == 'exist') {
                    $(".checkemail").remove();
                    $('#code').css('border','1px solid red');
                    $("#checkcode").append("<p class='text-danger'> ამ ნომრით ქვითარი უკვე არსებობს ! </p>");
                    $(".addorder").prop('disabled',true);
                    console.log('giorgi');
                }else if(data == 'no exist'){
                    $('#code').css('border','');
                    $(".text-danger").remove();
                    $(".checkemail").remove();
                    $(".addorder").prop('disabled',false);
                }
            },
            error:function (data) {

            }
        });
    }
}
//////////////////////////////////////////////////////
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
//////////////////////////////////////////////////////
$(document).ready(function () {
    $("#printorder").on('click',function (e) {
        e.preventDefault();
        var $this = $(this);
        var originalContent = $('body').html();
        var printArea = $this.parents('#printarea').html();
        $('body').html(printArea);
        // window.open('', '', 'height=100%, width=301');
        window.print();
        $('body').html(originalContent);
    });
    $(".remove").click(function(){
        if(confirm("გსურთ ცვლილება შეკვეთაზე ?")){
            var id = $(this).attr('id');
            var status = $(this).data("status");
            $.ajax({
                type:'GET',
                url:'class/requests/checkorder.php',
                data:{
                    'disableorder':id,
                    'status':status
                },
                success:function(data) {
                    if(data == 'remove') {
                        $("#orderid-"+ id).remove();
                    }
                }
            });
        }
    });
    $('#addside').hide();
    $('.reset').hide();
    $('.addbutton').click(function () {
        $('#viewside').hide();
        $('#addside').show();
        $('.reset').show();
        $('#removebuttons').hide();
    });
    $('.reset').click(function () {
        $('#viewside').show();
        $('#addside').hide();
        $('.reset').hide();
        $('#removebuttons').show();
    });
    $('.addproduct').click(function (e) {
        var productid = $('#selectproduct').val();
        var prodname = $('#selectproduct option:selected').text();
        var quantity = $('#quant').val();
        if(productid==null) {
            alert('მიუთითეთ პროდუქცია !');
            e.preventDefault();
        }else if(quantity==0){
            alert('მიუთითეთ რაოდენობა !');
            e.preventDefault();
        }else{
            $('#hereproduct').append(// amatebs producqiis divs
                "<div id='prodid-"+productid+"'>"+
                "<div class='col-sm-8'><input  name='productid[]' type='hidden' class='form-control' value='"+ productid +"'><input type='text' class='form-control' value='"+ prodname +"'></div>"+
                "<div class='col-sm-2'><input name='quantity[]' type='text' class='form-control' value='"+ quantity +"'></div>"+
                "<div class='col-sm-2'><button id='"+productid+"' type='button' class='btn btn-sm btn-danger removeproduct' ><i class='fa fa-trash-o'></i></button></div>"+
                "</div>"
            );
            //გავასუფთავოთ პროდუქციის ფორმა
            //$("#selectproduct").val($("#selectproduct").data("default-value"));
            $("#selectproduct").prop('selectedIndex','0');
            $('#quant').val('');
            // შლის დამატებულ პროდუქტს
            $('.removeproduct').on('click', function () {
                var removeid = $(this).attr('id');
                $("#prodid-"+removeid).remove();
            });
        }
    });

});
