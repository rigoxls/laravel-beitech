(function(win){

    var TBP;

    TBP = (function(){
        var self = this;

        this.init = function(){
            this.initJqueryEvents();
        };

        this.initJqueryEvents = function(){
            $("#customerId").change(function(e){
                win.location = win.location.origin +"/create-order/"+ $(this).val();
            });

            $(".select-product").on('change',function(e){
                var cPrice = $('option:selected', this).attr('price');

                $(this).next("input[name=price]").val(cPrice);
                $(this).nextAll("input[name=quantity]").val('');
                $(this).nextAll("input[name=eur-price]").val('');
                $(this).nextAll("input[name=usd-price]").val('');
            });

            $(".input-price").on('keyup', function(e){
                var uPrice = parseFloat($(this).prev('input[name=price]').val());
                var eurPrice = parseFloat($(this).val()) * uPrice;
                var usdPrice = parseFloat($(this).prevAll(".select-product").attr('usd')) * parseFloat($(this).val());

                $(this).next('input[name=eur-price]').val(eurPrice);
                $(this).nextAll('input[name=usd-price]').val(usdPrice);
            });

            $("#addRow").click(function(){
                $( "div.product-row" ).clone(true).appendTo( "div.container-rows" );
            })
        };

        this.init();
    })();

    win.TBP = TBP;

})(window);