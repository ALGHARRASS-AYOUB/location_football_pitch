let res_date = '',
    period_id = '',
    flag = false;
$(document).ready(function() {

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content') }
    });




    //date ajax verifiyDate
    $('#res_date').on('change', function() {
        res_date = $('#res_date').val();
        console.log('data clicked value : ' + res_date)
        $.ajax({
            method: 'get',
            dataType: 'json',
            url: "{{ route('verifyDate') }}",
            data: {
                'res_date': res_date,
            },

            beforeSend: function() {
                $('#period_id').val('');
                $('#pitch_id').val('');
                period_id = $('#period_id').val();
                pitch_id = $('#pitch_id').val();

                $(document).find('span.res_date_error').text('');
                $(document).find('span.period_id_success').text('');
                $('span.error_submit').text('')

            },

            success: function(res) {
                if (res.status == false) {
                    $('span.res_date_error').text(res.errors.res_date[0])
                } else {}

            }
        }); //end ajax
    });

    $('#pitch_id').on('change', function() {
            $('#period_id').val('');
            period_id = $('#period_id').val();
            $(document).find('span.period_id_success').text('');
        })
        // places verification

    $('#period_id').on('change', function() {
        res_date = $('#res_date').val();
        period_id = $('#period_id').val();
        $.ajax({
            method: 'get',
            dataType: 'json',
            url: "{{ route('verifyPlace') }}",
            data: {
                'res_date': res_date,
                'period_id': period_id,
                'pitch_id': $('#pitch_id').val(),
            },

            beforeSend: function() {
                $(document).find('span.period_id_error').text('');
                $('span.error_submit').text('')
                $(document).find('span.period_id_success').text('');

            },

            success: function(res) {
                if (res.status == false) {
                    $('span.period_id_error').text(res.msg_error);
                } else {
                    flag = true;
                    $('span.period_id_success').text('places avaliables for this schedule are [ ' + res.places_av + ' ]');

                }
            }
        }); //end ajax
    });
    // end places verification

    // submit the form
    $('#reservation_form_id').on('submit', function(e) {
        e.preventDefault();

        if (!flag) {
            $('span.error_submit').text('all fields must be valid before submit.');
        } else {
            $.ajax({
                method: 'post',
                dataType: 'json',
                url: "{{ route('user.reservations.store') }}",
                data: {
                    'res_date': res_date,
                    'period_id': period_id,
                    'pitch_id': $('#pitch_id').val(),
                },
                beforeSend: function() {
                    $('span.error_submit').text('')

                },

                success: function(res, st) {

                    if (!res.status) {
                        $.each(res.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0])
                        });
                    } else {
                        window.location.reload();
                    }

                },
                errors: function(res) {

                }
            }); //end ajax

        } //end condition else



    });


});