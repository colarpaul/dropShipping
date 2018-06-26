paypal.Button.render({
        env: 'production', // Or 'sandbox'

        client: {
            sandbox:    'AeDmk6gq7CSJteknV_pTnU7vAwIjt7BpJe8p5TVKemGikqBpYybsKkda19jC2oXOhN5ERqVMFmzXG5U-',
            production: 'AeUYFKcelIG2FZMVIktKLdewcgov36_XDnP_3TbKifh7ZEY57i60tsxaqnsNdVOrX-w2FVGBt5jqv_Pt'
        },

        commit: true, // Show a 'Pay Now' button

        style: {
            size: 'medium',
            color: 'gold',
            shape: 'rect',
            label: 'checkout'
        },

        payment: function(data, actions) {

            return actions.payment.create({
                payment: {
                    transactions: [
                    {
                        amount: { total: '@if(Cart::subtotal() < 5){{ Cart::subtotal() + 2 }}@else{{ Cart::subtotal() }}@endif', currency: 'EUR' }
                    }
                    ]
                }
            });
        },

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function(payment) {
                $.ajax({
                    url: "{{ route('checkoutComplete') }}",
                });
            });
        }

    }, '#paypal-button');