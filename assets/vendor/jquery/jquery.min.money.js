$(document).ready(function() {

    function makePaymentWithGisenyiInnovaHub() {

        $(".btn-ginnova-hub-money").on("click", function() {

            let clientName = $(".clientName").val();
            let amountToBePayed = $(".amountToBePayed").val();
            let clientPhone = $(".clientPhone").val();
            let clientId = $(".clientId").val();
            let urlTobeAddresedfor = "../spHundler.php?brilliant=paymentProcess&clientId=" + clientId;


            FlutterwaveCheckout({
                public_key: "FLWPUBK-cf8cc87a6fff2489e71617a066282abe-X",
                tx_ref: "hooli-tx-1920bbtyt",
                // amount: "<?php echo $amountToBePayed ?>",
                amount: "100",
                currency: "RWF",
                country: "RWF",
                payment_options: "card,mobile_money_rwanda, ussd",
                redirect_url: urlTobeAddresedfor,
                meta: {
                    consumer_id: 23,
                    consumer_mac: "92a3-912ba-1192a",
                },
                customer: {
                    email: "mjeanclaude23@gmail.com",
                    phone_number: clientPhone,
                    name: clientName,
                },
                callback: function(data) {
                    console.log(data);
                },

                onclose: function() {
                    // close modal
                },

                customizations: {
                    title: "Société Pétrolière",
                    description: "Payment For SP , To Confirm That You Buy Our Fuel",
                },
            });


        });
    }
    makePaymentWithGisenyiInnovaHub();
});