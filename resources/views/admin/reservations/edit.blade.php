<x-admin-layout>
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
        @method('PUT')
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 mb-6 w-full group">
                <input   type="text" name="first_name" id="first_nameid" class=" @error('first_name')  border-red-400 @enderror  block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $reservation->first_name }} " >
                <label for="first_nameid" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
                <span class="text-red-500 error-text first_name_error"></span>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input   type="text" name="last_name" id="last_nameid" class="@error('last_name')  border-red-400 @enderror  block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $reservation->last_name }}">
                <label for="last_nameid" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
                <span class="text-red-500 error-text last_name_error"></span>

            </div>
          </div>
        <div class="relative z-0 mb-6 w-full group">
            <input   type="email" name="email" id="emailid" class=" @error('email') border-red-400 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $reservation->email }}">
            <label for="emailid" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
            <span class="text-red-500 error-text email_error"></span>

        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 mb-6 w-full group">
                <input   type="date" min="{{ $min_date->format('Y-m-d') }}" name="res_date" id="res_dateid" class="@error('res_date') border-red-600 @enderror  block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" >
                <label for="res_dateid" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date of reservation</label>
                <span class="text-red-500 error-text res_date_error"></span>

            </div>



            <div class="relative z-0 mb-6 w-full group">
                <input   type="text" name="guests_number" id="guests_numberid" class=" @error('guests_number')  border-red-400 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $reservation->guests_number }} ">
                <label for="guests_numberid" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">number of guests</label>
                <span class="text-red-500 error-text guests_number_error"></span>
            </div>

        </div>

        <div class="relative z-0 mb-6 w-full group  @error('meal') border-red-700 @enderror">
            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">choose your meal </h3>
            <select id="ul-meal" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"><option></option></select>
            <span class="text-red-500 error-text meal_error"></span>

        </div>


        <div class="relative z-0 mb-6 w-full group  ">
            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">pick your table </h3>
            <select id="ul-dropdown-menu" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"><option></option></select>
            <span id="selected_table" class="text-green-500"></span>


        </div>

        <!-- Dropdown menu -->
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 mb-6 w-full group">
                <div id="dropdown-menu" class="hidden z-10 w-60 bg-white rounded shadow dark:bg-gray-700">
                    <ul id="ul-dropdown-menu" class="overflow-y-auto px-3 pb-3 h-48 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton"></ul>
                </div>
            </div>
             <span class="text-red-500 error-text table_error"></span>
         </div>


         {{-- end of dropdown --}}

         <div class="relative z-0 mb-6 w-full group my-5">
             <input    type="tel" pattern="[0-9]{10}" name="tel_number" id="tel_numberid" class="@error('tel_number') border-red-400 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $reservation->tel_number }}">
             <label for="tel_numberid" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone number </label>
             <span class="text-red-500 error-text tel_number_error"></span>
            </div>
            <button id='create' type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let  this_data,table_id='';
        let meal='',res_date='',ul_tables=$('#ul-dropdown-menu'),ul_meal=$('#ul-meal');


    let menuContent = document.getElementById('dropdown-menu');
    $(document).ready(function(){

        $('#ul-dropdown-menu').on('click',function(){
            console.log('table clk')
            if($('#res_dateid').val()==='')
                $('span.table_error').text('you should choose  date and the meal');

        })
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content') }
        });


        //form validation
        $('#reservation-form-id').on('submit',function(e){
            e.preventDefault();
            table_id=$('#ul-dropdown-menu').val();

                    this_data={
                                'first_name':$('#first_nameid').val(),
                                'last_name':$('#last_nameid').val() ,
                                'email': $('#emailid').val() ,
                                'res_date': $('#res_dateid').val() ,
                                'tel_number': $('#tel_numberid').val() ,
                                'guests_number': $('#guests_numberid').val(),
                                'table':table_id ,
                                'meal': meal,
                                };
                    console.log(this_data);




                    // validation with ajax for all inputs
                    $.ajax({
                        dataType: "json",
                        method: $(this).attr('method'),
                        url: $(this).attr('action'),
                        data: this_data,
                        // processData:false,
                        beforeSend:function(){
                            $(document).find('span.error-text').text('');

                        },

                        success: function (res,st,xhr) {
                            console.log(res)
                            if(res.status==false){
                                $.each(res.error,function(prefix,val){
                                    $('span.'+prefix+'_error').text(val[0])
                                });

                            }
                            else if(res.status=='not'){

                                $('span.guests_number_error').text(res.guests_number_error);
                            }
                            else{
                                document.write(res.html_view)
                            }
                        },
                        error: function( xhr,st,tr){alert('ERROR OCCURED WHILE DELETING THE RECORD !')}
                    }); //end ajax

    })
    //form validation


        //date ajax verifiyDate
        $('#res_dateid').on('change',function(){
            ul_tables.children().remove();
            res_date=$('#res_dateid').val();
            meal='';
            // console.log('data clicked value : '+res_date)
            $.ajax({
               method:'get',
               dataType:'json',
               url:"{{ route('admin.reservation.verifyDate') }}",
               data:{
                'res_date':res_date,
               },

               beforeSend:function(){
                menuContent.className="hidden z-10 w-60 bg-white rounded shadow dark:bg-gray-700";
                            $(document).find('span.res_date_error').text('');
                            $(document).find('span.table_error').text('');
                            ul_meal.children().remove();
                            ul_tables.children().remove();


                        },

               success:function(res){
                if(res.status==false){
                    $('span.res_date_error').text(res.errors.res_date[0])
                }else{
                             ul_meal.append('<option></option>');
                            $.each(res.meal,function(index,value){
                            li_meal_node='<option value="'+value+'">'+value.toUpperCase()+'</option>';
                            ul_meal.append(li_meal_node);
                        });

                    }
                    // console.log('the request succeeded for meal :'+res)
                }

            });//end ajax

        });
            // //verifyMeal

            let span, selected;
            $('#ul-meal').on('change',function(){
                meal=$('#ul-meal').val();

                        $(document).find('span.table_error').text('');


        $.ajax({
               method:'get',
               dataType:'json',
               url:"{{ route('admin.reservation.verifyMeal') }}",
               data:{
                'res_date':res_date,
                'meal':meal,
               },

               beforeSend:function(){
                ul_tables.children().remove();

                if(meal===''){
                    $('span.table_error').text('you should choose the meal');

                }else{

                    $(document).find('span.table_error').text('');
                }
                            $(document).find('span.res_date_error').text('');
                            ul_tables.children().remove();
                            $(document).find('span.meal_error').text('');
                            $('#selected_table').text('');
                        },

               success:function(res){
                if(res.status==false){
                    console.log('All tables are on hold')
                    // $('span.res_date_error').text(res.errors.res_date[0])
                }else{
                    ul_tables.append('<option></option>');
                    $.each(res.tables,function(index,value){
                        console.log('table name: '+value.name);
                        li_table_node='<option value="'+value.id+'">'+value.name+' ('+value.guests_number +' Guests)'+'</option>';
                        ul_tables.append(li_table_node);



                    });

                    if(res.tables.length==0)
                      $(document).find('span.table_error').text('all tables in hold, try another date or meal');



                        }

               }

        });//end ajax

                    });// end verification date



    })

</script>

</x-admin-layout>

