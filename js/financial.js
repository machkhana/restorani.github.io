
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
});
$(function () {
    $(".knob").knob({
        draw: function() {
            // "tron" case
            if (this.$.data('skin') == 'tron') {

                var a = this.angle(this.cv)  // Angle
                    , sa = this.startAngle          // Previous start angle
                    , sat = this.startAngle         // Start angle
                    , ea                            // Previous end angle
                    , eat = sat + a                 // End angle
                    , r = true;

                this.g.lineWidth = this.lineWidth;

                this.o.cursor
                && (sat = eat - 0.3)
                && (eat = eat + 0.3);

                if (this.o.displayPrevious) {
                    ea = this.startAngle + this.angle(this.value);
                    this.o.cursor
                    && (sa = ea - 0.3)
                    && (ea = ea + 0.3);
                    this.g.beginPath();
                    this.g.strokeStyle = this.previousColor;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                    this.g.stroke();
                }

                this.g.beginPath();
                this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                this.g.stroke();

                this.g.lineWidth = 2;
                this.g.beginPath();
                this.g.strokeStyle = this.o.fgColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                this.g.stroke();

                return false;
            }
        }
    });
    /* END JQUERY KNOB */
});