<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Pitches
                </div>
            </div>
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.pitches.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-800 rounded-lg">⤶  Pitches table</a>
            </div>
        </div>
    </div>


    <div class="container bg-gray-100 m-3 p-8 rounded-lg">
        <div class="my-2 flex justify-end content-start space-x-2 flex-wrap border-b-2 border-slate-600  " >
            <a href="{{ url('/') }}" class=" font-extrabold border-2 rounded-lg border-orange-600 mt-6 mb-2 px-3 py-1 " data-aos="fade-up" data-aos-delay="800">⥻ GO VIEW</a>
            <a href="{{ route('admin.pitches.index') }}" class=" font-extrabold border-2 rounded-lg border-orange-600 mt-6 mb-2 px-3 py-1 " data-aos="fade-up" data-aos-delay="800">⥻ BACK </a>
        </div>
        <form id="create_pitch_form" action="{{ route('admin.pitches.update',$pitch->id) }}" method="put">
            @method('POST')
            @csrf
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="name" id="name" value="{{ $pitch->name }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                    <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                    <span class="text-red-500 error-text text-sm name_error"></span>
                </div>


                <div class="relative z-0 mb-6 w-full group">
                    <input type="number" name="places" id="places" value="{{ $pitch->places }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                    <label for="places" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Places Number</label>
                    <span class="text-red-500 error-text text-sm places_error"></span>
                </div>


                <div class="relative z-0 mb-6 w-full group">
                    <input type="number" name="price" id="price" value="{{ $pitch->price }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                    <label for="price" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price DH</label>
                    <span class="text-red-500 error-text text-sm price_error"></span>
                </div>


                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" value="{{ $pitch->location }}" name="location" id="location" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                    <label for="location" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Location</label>
                    <span class="text-red-500 error-text text-sm location_error"></span>
                </div>

                    <div class="relative z-0 mb-20 w-full group  @error('status') border-red-700 @enderror">
                        <h4 class="mb-1 mt-4 font-semibold text-gray-900 ">STAUTS</h4>
                        <select id="status" name="status" class=" block py-4 px-2 w-full font-bold text-sm text-black bg-transparent border-0 border-b-3 bg-slate-400 rounded-lg border-gray-200 appearance-none dark:text-gray-900 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            @foreach ($statuses as $status )
                            <option @selected($status==$pitch->status) >{{ $status }}</option>
                            @endforeach
                        </select>
                        <span class="text-red-500 error-text text-sm status_error"></span>
                    </div>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function(){

    $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content') }
        });

          //form validation
          $('#create_pitch_form').on('submit',function(e){
            e.preventDefault();

                    this_data={

                                'name':$('#name').val(),
                                'location': $('#location').val() ,
                                'status': $('#status').val(),
                                'places':$('#places').val(),
                                'price':$('#price').val(),

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
                            else{

                                location.reload()
                            }
                        },
                        error: function( xhr,st,tr){alert('ERROR OCCURED WHILE DELETING THE RECORD !')}
                    }); //end ajax

    })
    //form validation


})

</script>

</x-admin-layout>

