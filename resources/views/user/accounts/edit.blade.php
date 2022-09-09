<x-guest-layout>

    <div   class="container bg-slate-100 opacity-90 m-1 p-4 mt-3 rounded-lg"  >
        <h4   data-aos-delay="400" data-aos="fade-up" class="text-slate-900 ">{{ $user->first_name }} {{ $user->last_name }}</h4>
        <h6 data-aos="fade-up" class="text-black text-xs py-0 my-0" data-aos-delay="400">{{ $user->email }}</h6>
        <div class="mb-6 p-2 pb-3  " data-aos="fade-right"><h3>you can chnage your accont information.</h3></div>

    <form id="user_create_form_id" method="post" action="{{ route('user.account.update',$user->id) }}" >
        @method('PUT')
        @csrf
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 mb-6 w-full group">
                <input   type="text" name="first_name" id="first_name" value="{{ $user->first_name }}" class=" @error('first_name')   border-red-400 @enderror  block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                <label for="first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
                @error('first_name')
                    <span class="text-red-500 text-sm error-text first_name_error">
                        {{ $message }}
                    </span>
                 @enderror
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input   type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" class="@error('last_name')  border-red-400 @enderror  block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                    <label for="last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
                    @error('last_name')
                    <span class="text-red-500 text-sm error-text last_name_error">
                        {{ $message }}
                    </span>
                    @enderror

                </div>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input   type="email" name="email" id="email" value="{{ $user->email }}" class=" @error('email') border-red-400 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
                @error('email')
                <span class="text-red-500 text-sm error-text email_error">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="relative z-0 mb-6 w-full group my-5">
                <input    type="tel" pattern="[0-9]{10}" value="{{ $user->tel_number }}"  name="tel_number" id="tel_number" class="@error('tel_number') border-red-400 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                <label for="tel_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone number </label>
                @error('tel_number')
                <span class="text-red-500 text-sm error-text tel_number_error">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="relative z-0 mb-6 w-full group my-5">
                <input    type="password"  name="old_password" id="old_password" class="@error('old_password') border-red-400 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                <label for="old_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Current Password</label>
                @error('old_password')
                <span class="text-red-500 text-sm error-text old_password_error">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="relative z-0 mb-6 w-full group my-5">
                <input    type="password"  name="password" id="password" class="@error('password') border-red-400 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">New Password</label>
                @error('password')
                <span class="text-red-500 text-sm error-text password_error">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <div class="relative z-0 mb-6 w-full group my-5">
                <input    type="password"  name="password_confirmation" id="password_confirmation" class="@error('password') border-red-400 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                <label for="password_confirmation" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm Password </label>
                @error('password_confirmation')
                <span class="text-red-500 text-sm error-text password_confirmation_error">
                    {{ $message }}
                </span>
                @enderror
            </div>




            <button id='create' type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Information</button>
        </form>
</div>

{{-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
{{-- <script>
$(document).ready(function(){

    $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content') }
        });

          //form validation
          $('#user_create_form_id').on('submit',function(e){
            e.preventDefault();

                    this_data={
                                'first_name':$('#first_name').val(),
                                'last_name':$('#last_name').val() ,
                                'email': $('#email').val() ,
                                'tel_number': $('#tel_number').val(),
                                'password':$('#password').val(),
                                'password_confirmation':$('#password_confirmation').val(),

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
                            location.reload();
                            }
                        },
                        error: function( xhr,st,tr){alert('ERROR OCCURED WHILE UPDATING THE RECORD !')}
                    }); //end ajax

    })
    //form validation


})

</script> --}}
    </div>
</x-guest-layout>
