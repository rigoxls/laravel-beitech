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

                //set unitary price
                $(this).next("input.price").val(cPrice);

                //clean all fields on change product
                $(this).nextAll("input.quantity").val('');
                $(this).nextAll("input.eur-price").val('');
                $(this).nextAll("input.usd-price").val('');
            });

            $(".input-price").on('keyup', function(e){
                var uPrice = parseFloat($(this).prev("input.price").val());
                var eurPrice = parseFloat($(this).val()) * uPrice;
                var usdPrice = parseFloat($(this).prevAll(".select-product").attr("usd")) * parseFloat($(this).val()) * uPrice;

                //round values to 2
                $(this).next("input.eur-price").val(Math.round(eurPrice * 100) / 100);
                $(this).nextAll("input.usd-price").val(Math.round(usdPrice * 100) / 100);

                //update total prices
                var totalEur = 0;
                $("input.eur-price").each(function(){
                    if($.isNumeric($(this).val())){
                        totalEur += parseFloat($(this).val());
                    }
                });
                $("input.total-eur").val(totalEur);

                var totalUsd = 0;
                $("input.usd-price").each(function(){
                    if($.isNumeric($(this).val())){
                        totalUsd += parseFloat($(this).val());
                    }
                });
                $("input.total-usd").val(totalUsd);
            });

            $("#addRow").click(function(){
                $( "div.product-row:first" ).clone(true).appendTo( "div.container-rows" );
                $( "div.product-row:last" ).find('input').val('');
            })
        };

        this.init();
    })();

    win.TBP = TBP;

})(window);