"use strict";
var base_url = $('#base_url').val();
var cur = $('#currency').val();
var pay_fd;

$(".lds-ripple").fadeOut(1500, function () {
    $("#app").fadeIn(700);
});

function copyText(id) {
    var value = document.getElementById(id).textContent;
    var input_temp = document.createElement("input");
    input_temp.value = value;
    document.body.appendChild(input_temp);
    input_temp.select();
    document.execCommand("copy");
    document.body.removeChild(input_temp);

}

$(document).ready(function () {
    $(".select2").select2();
    var proQty = $('.pro-qty');
    var price = $('#ticket_price').val();
    var tax_total = $('#tax_total').val();
    // var amount_type = $('.amount_type').val();

    var total = 0;
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var currency_code = $('#currency_code').val();
        var tpo = parseInt($('#tpo').val());
        var available = parseInt($('#available').val());
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            if (oldValue < tpo && oldValue < available) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                newVal = oldValue;
            }
        } else {
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find('input').val(newVal);
        $('.event-middle .qty').html(newVal);
        var x = parseInt(parseInt(newVal * price));
        var tax_data = $('.tax_data').val();
        const obj = JSON.parse(tax_data);
        var newArr = [];
        var sum = 0;
        obj.forEach(element => {
            if (element['amount_type'] == 'percentage') {
                var per_price = (element['price'] * x) / 100;
                newArr.push(per_price);
            }
            if (element['amount_type'] == 'price') {
                var per_price = (element['price']);
                newArr.push(per_price);
            }
        });

        for (let i = 0; i < newArr.length; i++) {
            sum += newArr[i];
        }
        total = parseInt(parseInt(newVal * price) + parseInt(sum));
        $('.org_total').text(total);
    });

    $('#report_table').DataTable({
        dom: 'Bfrtip',
        dom: `<'row mb-2'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
        <'row'<'col-sm-12'tr>>
        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 'lp>>`,
        language: {
            paginate: {
                previous: "<i class='fas fa-angle-left'>",
                next: "<i class='fas fa-angle-right'>"
            }
        },
        buttons: [{

            text: '<i class="fas fa-print"></i> Print',
            extend: 'print',
            // autoPrint: false,
            exportOptions: {
                columns: ':not(:nth-child(10),:nth-child(12),:last-child)',
            },
        },
        {
            text: '<i class="far fa-file-excel"></i> Excel',
            extend: 'excelHtml5',
            title: new Date().toLocaleString('en-ca'),
            exportOptions: {
                columns: ':not(:nth-child(10),:nth-child(12),:last-child)',
            },
        },
        {
            text: '<i class="fas fa-file-csv"></i> CSV',
            extend: 'csvHtml5',
            title: new Date().toLocaleString('en-ca'),
            exportOptions: {
                columns: ':not(:nth-child(10),:nth-child(12),:last-child)',
            },
        },
        {
            text: '<i class="far fa-file-pdf"></i> PDF',
            extend: 'pdfHtml5',
            title: new Date().toLocaleString('en-ca'),
            exportOptions: {
                columns: ':not(:nth-child(10),:nth-child(12),:last-child)',
            },
        }
        ],
        columnDefs: [{
            orderable: true,
            className: 'select-checkbox',
            targets: 0
        }],
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
    });

    $('#feedback_table').DataTable({
        dom: 'Bfrtip',
        dom: `<'row mb-2'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
        <'row'<'col-sm-12'tr>>
        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 'lp>>`,
        language: {
            paginate: {
                previous: "<i class='fas fa-angle-left'>",
                next: "<i class='fas fa-angle-right'>"
            }
        },
        buttons: [{

            text: '<i class="fas fa-print"></i> Print',
            extend: 'print',
            // autoPrint: false,
            exportOptions: {
                columns: ':not(:nth-child(10),:nth-child(12),:last-child)',
            },
        },
        {
            text: '<i class="far fa-file-excel"></i> Excel',
            extend: 'excelHtml5',
            title: new Date().toLocaleString('en-ca'),
            exportOptions: {
                columns: ':not(:nth-child(10),:nth-child(12),:last-child)',
            },
        },
        {
            text: '<i class="fas fa-file-csv"></i> CSV',
            extend: 'csvHtml5',
            title: new Date().toLocaleString('en-ca'),
            exportOptions: {
                columns: ':not(:nth-child(10),:nth-child(12),:last-child)',
            },
        },
        {
            text: '<i class="far fa-file-pdf"></i> PDF',
            extend: 'pdfHtml5',
            title: new Date().toLocaleString('en-ca'),
            exportOptions: {
                columns: ':not(:nth-child(10),:nth-child(12),:last-child)',
                columns: [0, 1, 2]
            },
        }
        ],
        columnDefs: [{
            orderable: true,
            className: 'select-checkbox',
            targets: 0
        }],
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
    });
    $('#review_table').DataTable({
        dom: 'Bfrtip',
        dom: `<'row mb-2'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
        <'row'<'col-sm-12'tr>>
        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 'lp>>`,
        language: {
            paginate: {
                previous: "<i class='fas fa-angle-left'>",
                next: "<i class='fas fa-angle-right'>"
            }
        },
        buttons: [{

            text: '<i class="fas fa-print"></i> Print',
            extend: 'print',
            // autoPrint: false,
            exportOptions: {
                columns: ':not(:nth-child(10),:nth-child(12),:last-child)',
            },
        },
        {
            text: '<i class="far fa-file-excel"></i> Excel',
            extend: 'excelHtml5',
            title: new Date().toLocaleString('en-ca'),
            exportOptions: {
                columns: ':not(:nth-child(10),:nth-child(12),:last-child)',
            },
        },
        {
            text: '<i class="fas fa-file-csv"></i> CSV',
            extend: 'csvHtml5',
            title: new Date().toLocaleString('en-ca'),
            exportOptions: {
                columns: ':not(:nth-child(10),:nth-child(12),:last-child)',
            },
        },
        {
            text: '<i class="far fa-file-pdf"></i> PDF',
            extend: 'pdfHtml5',
            title: new Date().toLocaleString('en-ca'),
            exportOptions: {
                columns: ':not(:nth-child(10),:nth-child(12),:last-child)',
                columns: [0, 1, 2, 3]
            },
        }
        ],
        columnDefs: [{
            orderable: true,
            className: 'select-checkbox',
            targets: 0
        }],
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
    });
    $('#revenue_table').DataTable({
        dom: 'Bfrtip',
        dom: `<'row mb-2'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
        <'row'<'col-sm-12'tr>>
        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 'lp>>`,

        language: {
            paginate: {
                previous: "<i class='fas fa-angle-left'>",
                next: "<i class='fas fa-angle-right'>"
            }
        },
        buttons: [{
            text: '<i class="fas fa-print"></i> Print',
            extend: 'print',
        },
        {
            text: '<i class="far fa-file-excel"></i> Excel',
            extend: 'excelHtml5',
            title: new Date().toLocaleString('en-ca'),
        },
        {
            text: '<i class="fas fa-file-csv"></i> CSV',
            extend: 'csvHtml5',
            title: new Date().toLocaleString('en-ca'),
        },
        {
            text: '<i class="far fa-file-pdf"></i> PDF',
            extend: 'pdfHtml5',
            title: new Date().toLocaleString('en-ca'),
        }
        ],
        columnDefs: [{
            orderable: true,
            className: 'select-checkbox',
            targets: 0
        }],
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
        footerCallback: function (row, data, start, end, display) {

            var api = this.api();
            var tax_total = 0,
                tax = 0,
                payment_total = 0,
                payment = 0,
                com_total = 0,
                com = 0,
                rev_total = 0,
                rev = 0;
            var intVal = function (i) {
                return typeof i === 'string' ?
                    i.replace(cur, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            api.columns(6).every(function () {
                tax_total = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);

            });
            api.columns(6, { page: 'current' }).every(function () {
                tax = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            $(api.column(6).footer()).html(cur + tax + '<br><br>' + cur + tax_total + '');


            api.columns(7).every(function () {
                payment_total = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            api.columns(7, { page: 'current' }).every(function () {
                payment = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            $(api.column(7).footer()).html(cur + payment + '<br><br>' + cur + payment_total + '');

            api.columns(8).every(function () {
                com_total = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            api.columns(8, { page: 'current' }).every(function () {
                com = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            $(api.column(8).footer()).html(cur + com + '<br><br>' + cur + com_total + '');

            api.columns(9).every(function () {
                rev_total = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            api.columns(9, { page: 'current' }).every(function () {
                rev = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            $(api.column(9).footer()).html(cur + rev + '<br><br>' + cur + rev_total + '');
        }
    });
    $('#settlement_report').DataTable({
        dom: 'Bfrtip',
        dom: `<'row mb-2'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
        <'row'<'col-sm-12'tr>>
        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 'lp>>`,

        language: {
            paginate: {
                previous: "<i class='fas fa-angle-left'>",
                next: "<i class='fas fa-angle-right'>"
            }
        },
        buttons: [{
            text: '<i class="fas fa-print"></i> Print',
            extend: 'print',
        },
        {
            text: '<i class="far fa-file-excel"></i> Excel',
            extend: 'excelHtml5',
            title: new Date().toLocaleString('en-ca'),
        },
        {
            text: '<i class="fas fa-file-csv"></i> CSV',
            extend: 'csvHtml5',
            title: new Date().toLocaleString('en-ca'),
        },
        {
            text: '<i class="far fa-file-pdf"></i> PDF',
            extend: 'pdfHtml5',
            title: new Date().toLocaleString('en-ca'),
        }
        ],
        columnDefs: [{
            orderable: true,
            className: 'select-checkbox',
            targets: 0
        }],
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
        footerCallback: function (row, data, start, end, display) {

            var api = this.api();
            var com_total = 0,
                com = 0,
                paid_total = 0,
                paid = 0,
                remain = 0,
                remain_total = 0;
            var intVal = function (i) {
                return typeof i === 'string' ?
                    i.replace(cur, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            api.columns(3).every(function () {
                com_total = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            api.columns(3, { page: 'current' }).every(function () {
                com = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            $(api.column(3).footer()).html(cur + com + '<br><br>' + cur + com_total + '');

            api.columns(4).every(function () {
                paid_total = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            api.columns(4, { page: 'current' }).every(function () {
                paid = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            $(api.column(4).footer()).html(cur + paid + '<br><br>' + cur + paid_total + '');

            api.columns(5).every(function () {
                remain_total = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            api.columns(5, { page: 'current' }).every(function () {
                remain = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            $(api.column(5).footer()).html(cur + remain + '<br><br>' + cur + remain_total + '');

        }
    });
    $('#org-for-event').change(function () {
        $.ajax({
            type: "GET",
            url: base_url + '/getScanner/' + $(this).val(),
            success: function (result) {
                $('.scanner_id').html('<option value="">Choose Scanner</option>');
                if (result.data.length > 0) {
                    result.data.forEach(e => {
                        $('.scanner_id').append('<option value="' + e.id + '">' + e.first_name + ' ' + e.last_name + '</option>');
                    });
                }
            },
            error: function (err) {
                console.log('err ', err)
            }
        });
    });
    $("#role").change(function (e) {
        var vals = $(this).val();
        vals = JSON.stringify(vals);
        console.log(vals);
        if (vals.search("3") > 0) {
            $('#org').show();
        } else {
            $('#org').hide();
        }
    });
    $('#org_order_report').DataTable({
        dom: 'Bfrtip',
        dom: `<'row mb-2'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
        <'row'<'col-sm-12'tr>>
        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 'lp>>`,

        language: {
            paginate: {
                previous: "<i class='fas fa-angle-left'>",
                next: "<i class='fas fa-angle-right'>"
            }
        },
        buttons: [{
            text: '<i class="fas fa-print"></i> Print',
            extend: 'print',
        },
        {
            text: '<i class="far fa-file-excel"></i> Excel',
            extend: 'excelHtml5',
            title: new Date().toLocaleString('en-ca'),
        },
        {
            text: '<i class="fas fa-file-csv"></i> CSV',
            extend: 'csvHtml5',
            title: new Date().toLocaleString('en-ca'),
        },
        {
            text: '<i class="far fa-file-pdf"></i> PDF',
            extend: 'pdfHtml5',
            title: new Date().toLocaleString('en-ca'),
        }
        ],
        columnDefs: [{
            orderable: true,
            className: 'select-checkbox',
            targets: 0
        }],
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
        footerCallback: function (row, data, start, end, display) {

            var api = this.api();
            var payment_total = 0,
                payment = 0,
                tax_total = 0,
                tax = 0,
                com = 0,
                com_total = 0;
            var intVal = function (i) {
                return typeof i === 'string' ?
                    i.replace(cur, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            api.columns(7).every(function () {
                payment_total = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            api.columns(7, { page: 'current' }).every(function () {
                payment = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            $(api.column(7).footer()).html(cur + payment + '<br><br>' + cur + payment_total + '');

            api.columns(8).every(function () {
                tax_total = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            api.columns(8, { page: 'current' }).every(function () {
                tax = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            $(api.column(8).footer()).html(cur + tax + '<br><br>' + cur + tax_total + '');


            api.columns(9).every(function () {
                com_total = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            api.columns(9, { page: 'current' }).every(function () {
                com = this.data()
                    .reduce(function (a, b) {
                        var x = intVal(a) || 0;
                        var y = intVal(b) || 0;
                        return x + y;
                    }, 0);
            });
            $(api.column(9).footer()).html(cur + com + '<br><br>' + cur + com_total + '');


        }
    });
    $(document).on("click", ".btn-pay", function () {
        var user_id = $(this).data('id');
        var payment = $(this).data('payment');
        $(".modal-body #user_id").val(user_id);
        $(".modal-body #payment").val(payment);
        pay_fd = new FormData();
        pay_fd.append('user_id', user_id);
        pay_fd.append('payment', payment);
    });
    if (document.getElementById('paypal-button-container')) {
        paypal_sdk.Buttons({
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: $('#payment').val()
                        },
                    }]
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    pay_fd.append('payment_status', 1);
                    pay_fd.append('payment_type', 'PAYPAL');
                    pay_fd.append('payment_token', details.id);
                    payToOrg();
                });
            },

        }).render('#paypal-button-container');
    }


    $.uploadPreview({
        input_field: "#image-upload",
        preview_box: "#image-preview",
        label_field: "#image-label",
        label_default: "<i class='fas fa-plus'></i>",
        label_selected: "<i class='fas fa-plus'></i>",
        no_label: false,
        success_callback: null
    });

    $('#start_time,#end_time').flatpickr({
        minDate: "today",
        enableTime: true,
        dateFormat: "Y-m-d h:i K",
    });

    $('.duration').flatpickr({
        mode: 'range',
        dateFormat: "Y-m-d",
    });
    if ($('#eventDate').val()) {
        $('#home_calender').flatpickr({
            inline: true,
            defaultDate: JSON.parse($('#eventDate').val()),
            dateFormat: "Y-m-d",
            onMonthChange: function (selectedDates, dateStr, instance) {

                var month = ("0" + (instance.currentMonth + 1)).slice(-2);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: base_url + '/get-month-event',
                    data: {
                        month: month,
                        year: instance.currentYear,
                    },
                    success: function (result) {
                        $('.calender-event h5').html(moment(month, 'MM').format('MMMM') + ' Events');
                        $('.home-upcoming-event').html('');
                        if (result.data.length == 0) {
                            $('.home-upcoming-event').html('<div class="row"> <div class="col-12 text-center"> <div class="empty-data"><div class="card-icon shadow-primary"><i class="fas fa-search"></i> </div> <h6 class="mt-3">No events found </h6> </div></div></div>');
                        } else {
                            result.data.forEach(element => {
                                $('.home-upcoming-event').append('<div class="row mb-4"><div class="col-3"><div class="date-left"><h3 class="mb-0">' + element.date + '</h3><p class="mb-0">' + element.day + '</p></div></div><div class="col-9 event-right"><p class="mb-0 name">' + element.name + '</p><p class="mb-0">Ticket Sold <span>' + element.sold_ticket + '/' + element.tickets + '</span></p><div class="progress progress-sm mb-3" ><div class="progress-bar" id="progress-' + element.id + '" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div> </div></div></div>');
                                $("#progress-" + element.id).css('width', element.average + '%');
                            });

                        }
                    },
                    error: function (err) {
                        console.log('err ', err)
                    }
                });

            }
        });
    }



    $('#start_date,#end_date').flatpickr({
        minDate: "today",
        dateFormat: "Y-m-d",
    });

    $('.textarea_editor').summernote({
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['picture']],
        ]
    });

    $('.event-form input[type=radio][name=type]').change(function () {
        if (this.value == 'online') {
            $('.location-detail').hide(500);
            $('.scanner').hide(500);
            $('.url').show(500);
        } else if (this.value == 'offline') {
            $('.location-detail').show(500);
            $('.scanner').show(500);
            $('.url').hide(500);
        }
    });

    $('.ticket-form input[type=radio][name=type]').change(function () {
        if (this.value == 'free') {
            $('.ticket-form #price').prop('disabled', true);
        } else if (this.value == 'paid') {
            $('.ticket-form #price').prop('disabled', false);
        }
    });
    $(".inputtags").tagsinput('items');

    $('.event-form').on('keyup keypress', function (e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });

    $(".colorpickerinput").colorpicker({
        format: 'hex',
        component: '.input-group-append',
    });

});

function notificationDetail(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        url: base_url + '/notification-template/' + id + '/edit',
        success: function (result) {
            $("#edit-template-form input[name='subject']").val(result.data.subject);
            $('#edit-template-form').get(0).setAttribute('action', base_url + '/notification-template/' + result.data.id);
            $('.textarea_editor').summernote('code', result.data.mail_content);
            $("#edit-template-form textarea#message_content").html(result.data.message_content);
        },
        error: function (err) {
            console.log('err ', err)
        }
    });
}

function addRatee(id) {
    console.log(id);
    $('.rating i').css('color', '#d2d2d2');
    $('.feedback-form input[name="rate"]').val(id);
    for (let i = 1; i <= id; i++) {
        $('.rating #rate-' + i).css('color', '#fec009');
    }

}

function deleteData(url, id) {

    Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this record and all connected data with this record",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete all'
    }).then((result) => {
        if (result.value) {

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "DELETE",
                dataType: "JSON",
                url: base_url + '/' + url + '/' + id,
                success: function (result) {
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'Record has deleted successfully.'
                    })
                },
                error: function (err) {
                    console.log('err ', err)
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'This record has connect with another data!'
                    })
                }
            });
        }
    })

}

function getStatistics(number, month_name) {
    var month = ("0" + (number)).slice(-2);
    $('.month').text(month_name);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        url: base_url + '/getStatistics/' + month,
        success: function (result) {
            $('.card-stats .order-pending').html(result.data.pending_order);
            $('.card-stats .order-complete').html(result.data.complete_order);
            $('.card-stats .order-cancel').html(result.data.cancel_order);
            $('.card-statistic-2 .order-total').html(result.data.total_order);
        },
        error: function (err) {
            console.log('err ', err)
        }
    });
}

function payLocally() {
    pay_fd.append('payment_type', "LOCAL");
    pay_fd.append('payment_status', 1);
    payToOrg();
}

function payToOrg() {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: base_url + '/pay-to-organization',
        data: pay_fd,
        cache: false,
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.success == true) {
                Swal.fire({
                    icon: 'success',
                    title: 'Payment done Successfully!',
                })
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            }
        },
        error: function (err) {
            console.log('err ', err)
        }
    });
}

function changeOrderStatus(id) {
    var con = "#status-" + id;
    var order_status = $(con).val();
    $.ajax({
        url: 'order/changestatus',
        method: 'post',
        data: { id: id, order_status: order_status, _token: $('meta[name="csrf-token"]').attr('content') },
        success: function (res) {
            if (order_status == 'Complete' || order_status == 'Cancel') {
                $(con).prop("disabled", true);
            }
        },
        error: function (error) { }
    });
}

function changePaymentStatus(id) {
    var con = "#payment-" + id;
    var payment_status = $(con).val();
    $.ajax({
        url: 'order/changepaymentstatus',
        method: 'post',
        data: {
            id: id,
            payment_status: payment_status,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (res) {
            if (payment_status == 1) {
                $(con).prop("disabled", true);
            }
        },
        error: function (error) {

        },
    })
}

$('#TestMail').on('click', function (event) {
    event.preventDefault();
    var mail_to = $('[name="mail_to"]').val();
    $('.emailstatus').html('');
    $('.emailerror').html('');
    $('.emailstatus').html('<div class=" mt-3"><h6>Sending...</h6></div>');
    $.ajax({
        type: "GET",
        data: { mail_to: mail_to },
        url: base_url + '/check-email',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (result) {
            if (result.success == true) {
                $('.emailstatus').html('');
                $('.emailstatus').html(' <div class="text-success mt-3 clear"><h6>' + result.message + '</h6></div>');

            } else if (result.success == false) {
                $('.emailstatus').html('');
                $('.emailstatus').html(' <div class="text-danger mt-3 clear"><h6>' + result.message + '</h6></div>');
                $('.emailerror').html(' <div class="text-danger mt-2 clear"><p>' + result.data + '</p></div>');
            }
        }
    });
});

function deleteModule(id) {
    $.ajax({
        type: "DELETE",
        url: '/module/' + id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (result) {
            if (result.success == true) {
                window.location.href = '/module';
            } else if (result.success == false) {
                $('#moduleRemove-error').addClass('d-block');
                $('#moduleRemove-error').removeClass('d-none');
                $('#errorMessageText').text(result.message);
            }
        }
    });
}

function checkboxChanged(checkbox) {
    var param1 = checkbox.getAttribute('data-param1');
    $.ajax({
        type: "PUT",
        url: '/module/' + param1,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (result) {
            if (result.success == true) {
                window.location.href = '/module';
            } else if (result.success == false) {
                $('#moduleRemove-error').addClass('d-block');
                $('#moduleRemove-error').removeClass('d-none');
                $('#errorMessageText').text(result.message);
            }
        }
    });
}


function stopwork(params) {
    alert("Sorry, but you're not authorized to perform this action on the demo version.");
}
$('#payButton').on('click',function(){
    var orgId = $(this).data('id');
    var total = $(this).data('total');
    var key = null;
    $.ajax({
        type: "post",
        headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "org-key",
        data: {
            "id":orgId
        },
        dataType: "json",
        success: function (response) {
            key  = response.key;
            if (response.key == null){
                $('#stripebtn').attr('disabled',true);  
            }else{
                $('#stripebtn').attr('disabled',false); 
            }
        }
    });
    $('#stripebtn').on('click',function(e){
        var stripe = Stripe(key);
        var origin = window.location.origin;
        var url = origin + "/organization/stripe/create-session";
        $.ajax({
            url: url,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                id:orgId,
                total:total,
            },
            dataType: "json",
            success: function (session) {
                stripe.redirectToCheckout({
                        sessionId: session.id,
                    })
                    .then(function (result) {
                        console.log(result);
                        if (result.error) {
                            alert(result.error.message);
                        }
                    });
            },
            error: function (error) {
                console.error("Error:", error);
            },
        });
    });
});