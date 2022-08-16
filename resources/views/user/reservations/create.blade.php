<x-guest-layout>
    <div class="m-4 flex   justify-start border-b-2 border-slate-600 bg-slate-500 bg-opacity-30 rounded-xl " ><span class="p-2 font-semibold text-3xl text-black">{{ $user->first_name }} {{ $user->last_name }}</span></div>

<div class="flex justify-start py-24  min-h-screen">

    <div data-aos="fade-up" class="bg-opacity-75 w-96 bg-gray-100 mx-3 px-10 py-9 max-h-min rounded-lg">
        <div class="justify-start"><h2 data-aos="fade-up" class="text-slate-900" data-aos-delay="400">new Reservation</h2></div>
        <div class="my-2 flex justify-end content-start space-x-2 flex-wrap border-b-2 border-slate-600  " >
            <a href="{{ url('/') }}" class=" font-extrabold border-2 rounded-lg border-orange-600 mt-6 mb-2 px-3 py-1 " data-aos="fade-up" data-aos-delay="800">⥻ BACK HOME</a>
            <a href="{{ route('user.reservations.index') }}" class=" font-extrabold border-2 rounded-lg border-orange-600 mt-6 mb-2 px-3 py-1 " data-aos="fade-up" data-aos-delay="800">⥻ BACK </a>
        </div>    <ul class="flex justify-center bg-red-300 bg-opacity-50  border-0 border-red-600 rounded-lg"><li><span class=" text-sm font-bold text-center text-red-700 error_submit " ></span></li></ul>
<form id="reservation_form_id" method="post" action="{{ route('user.reservations.store') }}" >
    @csrf
    @method('POST')

        <div class=" z-0 mb-6 w-full group">
            <label for="res_date" class="peer-focus:font-medium  text-xl   text-black dark:text-black">Date of reservation</label>
            <input  type="date" name="res_date" min="{{ $min_date->format('Y-m-d') }}" id="res_date" class="@error('res_date') border-red-600 @enderror   py-1  w-full text text-gray-900 bg-transparent border-x-0 border-t-0 border-b-1 border-gray-500 " >
            <span class="text-red-500 error-text text-sm res_date_error"></span>
        </div>

        <div class="relative z-0 mb-6 w-full group  @error('pitch_id') border-red-700 @enderror">
            <h4 class="mt-4 mb-1 font-semibold text-black">pitch </h4>
            <select  id="pitch_id" name="pitch_id" class="block py-2.5 px-2  w-44 text-sm text-black bg-transparent border-0 border-b-1 border-gray-400 appearance-none dark:text-black dark:border-gray-500 focus:outline-none focus:ring-0 focus:border-gray-900 peer">
                <option value="" >pick a your Pitch</option>
                @foreach ($pitches as $pitch )
                        <option value="{{ $pitch->id }}"> {{ $pitch->name }}</option>

                        @endforeach
                    </select>
            <span class="text-red-500 error-text text-sm pitch_id_error"></span>
        </div>

        <div class="relative z-0 mb-6 w-full group border-b-2 border-slate-900  @error('period_id') border-red-700 @enderror">
            <h4 class="mt-4 mb-1 font-semibold text-black">period time </h4>
            <select id="period_id" name="period_id" class="block py-2.5 px-2 mb-6 w-32 text-sm text-black bg-transparent border-0 border-b-2 border-gray-900 appearance-none dark:text-black dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-900 peer">
                <option value="" >pick a period</option>
                    @foreach ($periods as $period )
                        <option value="{{ $period->id }}" > {{ $period->period_time }}</option>
                    @endforeach
                    </select>
            <span class="text-red-500 error-text text-sm period_id_error"></span>
            <span class="text-green-500 text-sm period_id_success"></span>
        </div>


        <button id='create' type="submit"  class="text-black font-extrabold bg-opacity-20 border-blue-700 border-2 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  rounded-lg text-sm w-full sm:w-auto px-5 py-2 text-center">SUBMIT</button>
    </form>
</div>
<i ></i>
</div>

{{-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

<script>
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
</script>

</x-guest-layout>
