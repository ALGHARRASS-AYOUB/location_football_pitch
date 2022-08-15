{{-- <x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Reservations
                </div>
            </div>
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reservations.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-800 rounded-lg">⤶  reservations table</a>
            </div>
        </div>
    </div>

    <span id="success-record" class="text-green-500"></span>
    <div class="text-gray-800"><h2>Update Reservation [ {{ $reservation->id }} ]</h2></div>
 <div class="container bg-gray-100 m-3 my-10  px-8 py-20 rounded-lg">
    <form id="reservation-form-id" method="put" action="{{ route('admin.reservations.update',$reservation->id) }}" >
        @csrf
        @method('POST')

            <div class="relative z-0 mb-6 w-full group">
                <input  type="date" min="{{ $min_date->format('Y-m-d') }}" name="res_date" id="res_date" class="@error('res_date') border-red-600 @enderror  block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" >
                <label for="res_date" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date of reservation</label>
                <span class="text-red-500 error-text text-sm res_date_error"></span>
            </div>

            <div class="relative z-0 mb-6 w-full group  @error('pitch_id') border-red-700 @enderror">
                <h4 class="mt-4 mb-1 font-semibold text-gray-900 dark:text-white">pitch </h4>
                @foreach ($pitches as $pitch )
                        <select  id="pitch_id" name="pitch_id" class="block py-2.5 px-2  w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option value="{{ $pitch->id }}" @selected($reservation->pitch_id==$pitch->id)> {{ $pitch->name }}</option>
                        </select>

                @endforeach
                <span class="text-red-500 error-text text-sm pitch_id_error"></span>
            </div>

            <div class="relative z-0 mb-6 w-full group  @error('period_id') border-red-700 @enderror">
                <h4 class="mt-4 mb-1 font-semibold text-gray-900 dark:text-white">period time </h4>
                @foreach ($periods as $period )
                        <select id="period_id" name="period_id" class="block py-2.5 px-2  w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option value="{{ $period->id }}" @selected($reservation->period_id==$period->id)> {{ $period->period_time }}</option>
                        </select>
                @endforeach
                <span class="text-red-500 error-text text-sm period_id_error"></span>
            </div>


            <button id='create' type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">update</button>
        </form>
    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
     let res_date='',period_id='';
    $(document).ready(function () {

	        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content') }
        });

	  //date ajax verifiyDate
        $('#res_date').on('change',function(){

            res_date=$('#res_date').val();
            console.log('data clicked value : '+res_date)
            $.ajax({
               method:'get',
               dataType:'json',
               url:"{{ route('verifyDate',$id) }}",
               data:{
                'res_date':res_date,
               },

               beforeSend:function(){
                            $(document).find('span.res_date_error').text('');

                        },

               success:function(res){
                    if(res.status==false){
                        $('span.res_date_error').text(res.errors.res_date[0])
                    }else{
                        console.log(res_date)
                        }
                        console.log('the request succeeded res :'+res)
                }
            });//end ajax
          });

          // places verification

        $('#period_id').on('change',function(){
            res_date=$('#res_date').val();
            period_id=$('#period_id').val();
            console.log('data clicked value period id is : '+period_id)
            $.ajax({
               method:'get',
               dataType:'json',
               url:"{{ route('verifyPlace',$id) }}",
               data:{
                'date':res_date,
                'period_id':period_id,
                'pitch_id': $('#pitch_id').val(),
               },

               beforeSend:function(){
                            $(document).find('span.period_id_error').text('');
                        },

               success:function(res){
                if(res.status==false){
                    $('span.period_id_error').text(res.msg_error);
                }else{
                    console.log('the request succeeded res :'+res.msg_done)
                    }
                }
            });//end ajax
          });
          // end places verification


    });
    </script>
</x-admin-layout>
 --}}


 <x-admin-layout>

<div class="flex justify-start py-24  min-h-screen">

    <div data-aos="fade-up" class="bg-opacity-75 w-96 bg-gray-100 mx-3 px-10 py-9 max-h-min rounded-lg">
        <div class="justify-start">
            <h1 data-aos="fade-up" class="pb-6 text-slate-900" data-aos-delay="400">update reservation</h1><hr>
            <h4 data-aos="fade-up" class="text-slate-900" data-aos-delay="400">USER ID: {{ $user->id }}</h4>
            <h4 data-aos="fade-up" class="text-slate-900" data-aos-delay="400">{{ $user->first_name }} {{ $user->last_name }}</h4>
            <h4 data-aos="fade-up" class="text-slate-900 text-xs" data-aos-delay="400">{{ $user->email }}</h4>

        </div>
        <div class="my-2 flex justify-end content-start space-x-2 flex-wrap border-b-2 border-slate-600  " >
            <a href="{{ url('/') }}" class=" font-extrabold border-2 rounded-lg border-orange-600 mt-6 mb-2 px-3 py-1 " data-aos="fade-up" data-aos-delay="800">⥻ GO VIEW</a>
            <a href="{{ route('admin.reservations.index') }}" class=" font-extrabold border-2 rounded-lg border-orange-600 mt-6 mb-2 px-3 py-1 " data-aos="fade-up" data-aos-delay="800">⥻ BACK </a>
        </div>
    <ul class="flex justify-center bg-red-300 bg-opacity-50  border-0 border-red-600 rounded-lg"><li><span class=" text-sm font-bold text-center text-red-700 error_submit " ></span></li></ul>
<form id="reservation_form_id" method="put" action="{{ route('admin.reservations.update',$reservation->id) }}" >
    @csrf
    @method('PUT')

        <div class=" z-0 mb-6 w-full group">
            <label for="res_date" class="peer-focus:font-medium  text-xl   text-black dark:text-black">Date of reservation</label>
            <input  type="date" name="res_date" min="{{ $min_date->format('Y-m-d') }}" id="res_date" value="{{ $reservation->res_date->format('Y-m-d') }}" class="@error('res_date') border-red-600 @enderror py-1  w-full text text-gray-900 bg-transparent border-x-0 border-t-0 border-b-1 border-gray-400  dark:text-black dark:border-gray-400 dark:focus:border-blue-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer" >
            <span class="text-red-500 error-text text-sm res_date_error"></span>
        </div>

        <div class="relative z-0 mb-6 w-full group  @error('pitch_id') border-red-700 @enderror">
            <h4 class="mt-4 mb-1 font-semibold text-gray-900 dark:text-black">pitch </h4>
            <select  id="pitch_id" name="pitch_id" class="block py-2.5 px-2  w-44 text-sm text-black bg-transparent border-0 border-b-2 border-gray-900 appearance-none dark:text-black dark:border-gray-900 focus:outline-none focus:ring-0 focus:border-gray-900 peer">
                <option value="" >pick a your Pitch</option>
                @foreach ($pitches as $pitch )
                        <option value="{{ $pitch->id }}" @selected($reservation->pitch_id == $pitch->id)> {{ $pitch->name }}</option>
                        @endforeach
                    </select>
            <span class="text-red-500 error-text text-sm pitch_id_error"></span>
        </div>

        <div class="relative z-0 mb-6 w-full group border-b-2 border-slate-600  @error('period_id') border-red-700 @enderror">
            <h4 class="mt-4 mb-1 font-semibold text-gray-900 dark:text-black">period time </h4>
            <select id="period_id" name="period_id" class="block py-2.5 px-2 mb-6 w-32 text-sm text-black bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option value="" >pick a period</option>
                    @foreach ($periods as $period )
                        <option value="{{ $period->id }}"  @selected($reservation->period_id == $period->id) > {{ $period->period_time }}</option>
                    @endforeach
                    </select>
            <span class="text-red-500 error-text text-sm period_id_error"></span>
            <span class="text-green-500 text-sm period_id_success"></span>
        </div>


        <button id='create' type="submit"  class="text-black font-extrabold bg-opacity-20 border-blue-700 border-2 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  rounded-lg text-sm w-full sm:w-auto px-5 py-2 text-center ">update</button>
    </form>
</div>

</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // console.log('opning');
 let  res_date=$('#res_date').val();
 let  period_id=$('#period_id').val();
 let  pitch_id=$('#pitch_id').val();
 let flag=true;
$(document).ready(function () {

        $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content') }
    });





  //date ajax verifiyDate
    $('#res_date').on('change',function(){
        res_date=$('#res_date').val();
        console.log('data clicked value : '+res_date)
        $.ajax({
           method:'get',
           dataType:'json',
            url:"{{ route('verifyDate',$reservation->id) }}",
           data:{
            'res_date':res_date,
           },

           beforeSend:function(){
                        $('#period_id').val('');
                        $('#pitch_id').val('');
                         period_id=$('#period_id').val();
                         pitch_id=$('#pitch_id').val();
                         flag=false;

                        $(document).find('span.res_date_error').text('');
                    $('span.error_submit').text('')

                    },

           success:function(res){
                if(res.status==false){
                    $('span.res_date_error').text(res.errors.res_date[0])
                }else{
                    }

            }
        });//end ajax
      });

      // places verification

      $('#pitch_id').on('change',function(){
                $('#period_id').val('');
                period_id=$('#period_id').val();
                $(document).find('span.period_id_success').text('');
                flag=false;
      });

    $('#period_id').on('change',function(){
        res_date=$('#res_date').val();
        period_id=$('#period_id').val();
        $.ajax({
           method:'get',
           dataType:'json',
            url:"{{ route('verifyPlace',$reservation->id) }}",
           data:{
            'res_date':res_date,
            'period_id':period_id,
            'pitch_id': $('#pitch_id').val(),
           },

           beforeSend:function(){
                        $(document).find('span.period_id_error').text('');

                    $('span.error_submit').text('')


                    },

           success:function(res){
            if(res.status==false){
                $('span.period_id_error').text(res.msg_error);
                flag=false;
            }else{
                flag=true;
                $('span.period_id_success').text('places avaliables for this schedule are [ '+res.places_av+' ]');
                }
            }
        });//end ajax
      });
      // end places verification

      // submit the form
    $('#reservation_form_id').on('submit',function(e){

        e.preventDefault();
        if(!flag){
            console.log(flag)

            $('span.error_submit').text('all fields must be valid before submit.');
        }else{


            $.ajax({
                method:$(this).attr('method'),
                url:$(this).attr('action'),
                dataType:'json',
                data:{
                    'res_date':res_date,
                    'period_id':period_id,
                    'pitch_id': $('#pitch_id').val(),
                },
                beforeSend:function(){
                    console.log('sending ....')
                    $('span.error_submit').text('')

                },

                success: function(res,st){

                    console.log('status is false in success funciton')
                    if(!res.status){
                        $.each(res.error,function(prefix,val){
                                    $('span.'+prefix+'_error').text(val[0]);
                                });
                    }
                    else{
                        window.location.reload();

                    }

                },
                errors: function(res){

                    console.log('error in sending ajax request')
                }
        });
    //end ajax

    }//end condition else



    });


});
</script>

</x-admin-layout>
