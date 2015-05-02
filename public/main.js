(function(win){

    var TBP;

    TBP = (function(){
        var self = this;

        this.init = function(){
            this.initJqueryEvents();
        };

        this.initJqueryEvents = function(){

            $("#saveOrder").click(function(){
                self.saveOrder();
            });

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

        this.saveOrder = function(){
            var ordersObject = [];

            $('.product-row').each(function(i,el){
                if($.isNumeric($(el).find('input.price').val())){
                    var productInfo = {
                        productId: $(el).find('select option:selected').val(),
                        price: $(el).find('input.price').val(),
                        currencyId: $(el).find('input.price').attr('currency'),
                        quantity: $(el).find('input.quantity').val(),
                    }
                    ordersObject.push(productInfo);
                }
            });

            var customerId = $("#customerId").val();

            if(ordersObject.length && customerId > 0){
                ordersObject.action = 'saveOrder';
                $.ajax({
                    method:'POST',
                    url: '/store',
                    data: {
                        action: 'saveOrder',
                        totalUsd : $('input.total-usd').val(),
                        rate : $('select.select-product:first').attr('usd'),
                        orderList: ordersObject,
                        customerId: customerId
                    },
                })
                .done(function(msg){
                    win.location.href = '/create-order/';
                })
            }
        };

        this.init();
    })();

    win.TBP = TBP;

})(window);