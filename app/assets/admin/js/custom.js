



$(document).ready(function() {

    $('a.nav-link').on('click', function() {
        var url = $(this).data('url');
        if(url) {
            localStorage.page_url = url;
        }
    });



    $(document).find('a[data-url="'+ localStorage.page_url +'"]').addClass('active');

    $(document).find('li.nav-item > a.active').parents('li.nav-item').addClass('open');



    $('.add-menu').on('click', function() {
        $.ajax({
            url: base_url + 'role/get-main-menu',
            dataType: 'html',
            success: (res => {
                $('.main-menu').prepend(res);
                $('.sortable').sortable({
                    placeholder: 'ui-state-highlight',
                });

                // $('select').select2();
            })
        });
    });

    $('.collapse-menu').on('click', function() {
        $(document).find('.sub-menu').toggleClass('show');
    });

    $(document).on('click', '.btn-remove-main-menu-panel', function() {
        $(this).closest('.main-menu-panel').remove();
    });

    $(document).on('click', '.btn-remove-sub-menu-panel', function() {
        $(this).closest('.sub-menu-panel').remove();
    });

    $(document).on('click', '.btn-add-sub-menu', function() {
        var self = this;
        var main_key = $(self).closest('.main-menu-panel').data('key');

        console.log(main_key);
        
        $.ajax({
            url: base_url + 'role/get-sub-menu',
            data: {main_key: main_key},
            method: 'get',
            dataType: 'html',
            success: (res => {
                $(self).closest('.main-menu-panel').find('.sub-menu').prepend(res);
                
                $(self).closest('.main-menu-panel').find('.collapse').addClass('show');

                $('.sortable').sortable({
                    placeholder: 'ui-state-highlight',
                });
                // $('select').select2();
            })
        });
    });

    

    $('select').select2();

    $('.check-all-action').on('click', function() {
        if($(this).is(':checked')) {
            $(document).find('input[name="'+ $(this).data('key') +'"]').prop('checked', true);
        }
        else {
            $(document).find('input[name="'+ $(this).data('key') +'"]').prop('checked', false);
        }
    });


    $('#check-all-checkbox').on('click', function() {
        if($(this).is(':checked')) {
            $(document).find('input[type="checkbox"]').prop('checked', true);
        } 
        else {
            $(document).find('input[type="checkbox"]').prop('checked', false);
        }
    });

        

    
    var createChart = function(element, labels, data) {
        var cardChart1 = new Chart(element, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Registered',
                    backgroundColor: getStyle('--primary'),
                    borderColor: 'rgba(255,255,255,.55)',
                    data: data
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            color: 'transparent',
                            zeroLineColor: 'transparent'
                        },
                        ticks: {
                            fontSize: 2,
                            fontColor: 'transparent'
                        }
                    }],
                    yAxes: [{
                        display: false,
                        ticks: {
                            display: false,
                            // max: ,
                            // min: 
                        }
                    }]
                },
                elements: {
                    line: {
                        borderWidth: 1
                    },
                    point: {
                        radius: 4,
                        hitRadius: 10,
                        hoverRadius: 4
                    }
                }
            }
        }); 
    }


    var isPromo = function() {
        if ($('#egift-promo').is(':checked')) {
            $('#div-range').show();
        } 
        else {
            $('#div-range').hide();
        }
    }

    $('#egift-promo').on('click', function() {
        isPromo();
    })
    isPromo();


    if ($('#card-chart1').length) {

        $.ajax({
            url: base_url + 'dashboard/chart',
            dataType: 'json',
            method: 'get',
            data: {type: 'merchants'},
            success: (res => {

                var total = [];
                var month = [];
                res.forEach(r => {
                    total.push(Number(r.total))
                    month.push(r.month)
                });

                createChart($('#card-chart1'), month, total);

            })
        })
        
    }




    var loadIncludedEgifts = function(merchant_id, id="") {
        $.ajax({
            url: base_url + "promo/included-egift-form" ,
            data: {merchant_id: merchant_id, id: id},
            method: 'get',
            dataType: 'html',
            success: (res => {
               $('#div-included-egifts').html(res);
           })
        });
    }


    if ($('#promo-merchant_id').length) {
        loadIncludedEgifts(
            $('#promo-merchant_id').val(),
            $('#promo-id').val()
            );
    }

    $('#promo-merchant_id').on('change', function() {
        loadIncludedEgifts($(this).val(), $('#promo-id').val());
    });


    $('.fa-spinner').hide();

    $('#deploy-to-branches').on('change', function() {
        if ($(this).is(':checked')) {
            $('.deploy-to-branches').prop('checked', true);
        } else {
            $('.deploy-to-branches').prop('checked', false);
        }
    });

    $('#included-egifts').on('change', function() {
        if ($(this).is(':checked')) {
            $('.included-egifts').prop('checked', true);
        } else {
            $('.included-egifts').prop('checked', false);
        }
    });



    $('.summernote').summernote({
        height: 300,
        tabsize: 2,
        followingToolbar: true,
    });

    $('.summernote-merchant').summernote({
        height: 650,
        tabsize: 2,
        followingToolbar: true,
    });


    $('.btn-generate-referral-code').on('click', function() {
        $(this).find('i').addClass('fa-spin');
        $('#egift-referral_code').val('....')
        $.ajax({
            url: base_url + "egift/generate-referral-code" ,
            success: (res => {
                $('#egift-referral_code').val(res)
                $('.btn-generate-referral-code').find('i').removeClass('fa-spin');
            })
        });

    })


    var freebiesDetails = function($freebies_id) {
        $.ajax({
            url: base_url + "freebies/details" ,
            dataType: 'html',
            data: {id: $freebies_id},
            method: 'get',
            success: (res => {
                $('.freebies-details').html(res);
            })
        });
    }


    $('#freebies-select').on('change', function() {
        freebiesDetails($(this).val());
    });



    $('.btn-add-freebies').on('click', function() {
        var freebies = $('#freebies-select');
        var qty = $('#freebies-qty');

        if (freebies.val() === null) {
                   freebies.parent('div').removeClass('has-success');
                   freebies.parent('div').addClass('has-error');
               } else {
                freebies.parent('div').removeClass('has-error');
                freebies.parent('div').addClass('has-success');
            }

            if (qty.val() === "") {
               qty.parent('div').removeClass('has-success');
               qty.parent('div').addClass('has-error');
           } else {
            qty.parent('div').removeClass('has-error');
            qty.parent('div').addClass('has-success');
        }


        if (freebies.val() !== null && qty.val() !== "") {
            var egift_id = 0;

            if ($('.freebies-table').length) {
                egift_id = $('#freebies-id').val();
            }

            var data = {
                freebies_id: freebies.val(),
                qty: qty.val(),
                egift_id:egift_id
            }


            addFreebies(data);
        }

        freebies.val(null);
        qty.val("");
        $('.freebies-details').html("");
        // freebiesDetails(freebies.val());
    });



    var addFreebies = function(data={}) {
        $('.loader-2').show();
        $.ajax({
            url: base_url + "egift-freebies/add-freebies" ,
            dataType: 'html',
            data: data,
            method: 'get',
            success: (res => {
                $('.freebies-table').html(res);
                $('.loader-2').hide();
            })
        });
    }


    var loadFreebies = function() {
        if ($('.freebies-table').length) {

            if ($('.egift-update').length) {
                addFreebies({egift_id: $('#freebies-id').val()})
            } else {
                addFreebies();
            }
        }
        $('.loader-2').hide();
    }

    var loadPriceVariety = function(egift_id=0) {
        $.ajax({
            url: base_url + "price-variety/load" ,
            data: {egift_id: egift_id},
            method: 'get',
            dataType: 'html',
            success: (res => {
                $('.price-variety').html(res);
                $('.loader').hide();
            })
        });
    }



    loadFreebies();
    loadPriceVariety($('#freebies-id').val());

    var validateInput = function(inputs=[]) {
        inputs.forEach(input => {
            if (input.val() === "" || input.val() === null) {
                input.parent('div').removeClass('has-success');
                input.parent('div').addClass('has-error');
            } else {
                input.parent('div').removeClass('has-error');
                input.parent('div').addClass('has-success');
            }
        }); 
    }

    $('.btn-add-price-variety').find('i').hide();

    $('#percent-discount').on('change', function() {
        
    });

    $('.btn-add-price-variety').on('click', function() {


        if($('#percent-discount').val() && $('#pricevariety-orig_price').val()) {

            var discounted = ($('#pricevariety-orig_price').val() / 100) * $('#percent-discount').val();

            discounted = discounted.toFixed(2);


            $('#pricevariety-sale_price').val($('#pricevariety-orig_price').val() - discounted);

            $('.loader').show();

            $(this).find('i').show();
            $(this).find('i').addClass('fa-spin');
            var orig_price = $('#pricevariety-orig_price');
            var sale_price = $('#pricevariety-sale_price');
            var egift_id = $('#freebies-id').val();

            validateInput([orig_price, sale_price]);


            if (orig_price.val() && sale_price.val()) {
                $.ajax({
                    url: base_url + "price-variety/add-variety" ,
                    data: {
                        orig_price: orig_price.val(), 
                        sale_price: sale_price.val(),
                        egift_id: egift_id
                    },
                    method: 'get',
                    success: (res => {
                        $(this).find('i').removeClass('fa-spin')
                        $(this).find('i').hide();
                        orig_price.val("");
                        sale_price.val("");
                        $('#percent-discount').val("");
                        loadPriceVariety(egift_id);
                        $('.loader').hide();
                    })
                });
            }  else {
                $(this).find('i').hide();
                $(this).closest('.loader').hide();
            }
            
            
        }
        else {
            alert('Original Price must be a number\nPlease fill out Original Price and Discount Percentage.');
        }
        
    });

    $(document).on('click', '.btn-remove-price-variety', function() {
        $('.loader').show();


        var id = $(this).data('id');

        $.ajax({
            url: base_url + "price-variety/remove-variety" ,
            data: {id: id},
            method: 'get',
            success: (res => {
                loadPriceVariety($('#freebies-id').val());  
            })
        });
    });



    $(document).on('click', '.btn-remove-freebies', function() {
        $('.loader-2').show();
        var id = $(this).data('id');

        $.ajax({
            url: base_url + "egift-freebies/remove-freebies" ,
            data: {id: id},
            method: 'get',
            success: (res => {
                loadFreebies();
                $('#freebies-select').val(null);
                $('#freebies-qty').val("");
                $('.freebies-details').html("");
                $('.loader-2').hide();
            })
        });
    });









    $('.natures').on('click', function() {
        if ($(this).is(':checked')) {
            $(this).parents('li').addClass('list-group-item-primary')
        } else {
            $(this).parents('li').removeClass('list-group-item-primary')
        }
    })

    $('.btn-logout').on('click', function() {
        $('#frm-logout').submit();
    });

    var showLoader = function() {
        $('.fa-spinner').addClass('fa-spin');
        $('.fa-spinner').show();
        $('#image-preview').hide();
    }

    $('#profile-logo_input').on("change", function() {
        showLoader();
        previewImage('profile-logo_input');
    });



    $('#egift-image_input').on("change", function() {
        showLoader();
        previewImage('egift-image_input');
    });


    $('#freebies-image_input').on("change", function() {
        showLoader();
        previewImage('freebies-image_input');
    });


    $('#about-logo_input').on("change", function() {
        showLoader();
        previewImage('about-logo_input');
    });

    $('#personnel-logo_input').on("change", function() {
        showLoader();
        previewImage('personnel-logo_input');
    });





    function previewImage(id) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById(id).files[0]);

        oFReader.onload = function(oFREvent) {
            $('#image-preview').attr('src', oFREvent.target.result);
            $('#image-preview').show();
            $('.fa-spinner').removeClass('fa-spin');
            $('.fa-spinner').hide();
        };
    }


    $(".delete").on("click", function() {
        var id = $(this).data("key");
        var page = $(this).data("page");
        var selected = $(this).data("selected");
        swal({
            title: "Are you sure?",
            text: "You are going to delete " + selected,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            $.ajax({
                url: base_url + page + "/delete" ,
                method: "post",
                data: {id: id},
                success: (response => {
                    swal({
                        title: "Deleted! ",
                        text: selected +" was deleted!",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#337ab7",
                        confirmButtonText: "Done",
                        closeOnConfirm: false
                    }, function () {
                        window.location.href = base_url + page;
                    });
                })
            });
        });
    });



    if ($('.profile-index').length) {
        var pos = $('th').text().search("Status");

        if (pos) {
            $('th').css('color', '#20a8d8')
        } 
    }






    $('.sortable').sortable({
        placeholder: 'ui-state-highlight',
    });



    $('.sortable').disableSelection();

    $('input[name="EgiftSearch[date_start]"]').attr('type', 'date');
    $('input[name="EgiftSearch[date_end]"]').attr('type', 'date');


})