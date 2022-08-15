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
                    Users
                </div>
            </div>
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-800 rounded-lg">⤶  users table</a>
            </div>
        </div>
    </div>
<div class="container bg-gray-100 m-1 p-4 rounded-lg" >

    <form id="user_create_form_id" method="post" action="{{ route('admin.users.store') }}" >
        @csrf
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 mb-6 w-full group">
                <input   type="text" name="first_name" id="first_name"  class=" @error('first_name')   border-red-400 @enderror  block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                <label for="first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
                {{-- @error('first_name') --}}
                    <span class="text-red-500 text-sm error-text first_name_error">
                    </span>
                        {{-- {{ $message }} --}}
                 {{-- @enderror --}}
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input   type="text" name="last_name" id="last_name" class="@error('last_name')  border-red-400 @enderror  block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                    <label for="last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
                    {{-- @error('last_name') --}}
                    <span class="text-red-500 text-sm error-text last_name_error">
                    </span>
                        {{-- {{ $message }} --}}
                    {{-- @enderror --}}

                </div>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input   type="email" name="email" id="email" class=" @error('email') border-red-400 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
                {{-- @error('email') --}}
                <span class="text-red-500 text-sm error-text email_error">
                </span>
                    {{-- {{ $message }} --}}
                {{-- @enderror --}}
            </div>

            <div class="relative z-0 mb-6 w-full group my-5">
                <input    type="tel" pattern="[0-9]{10}" name="tel_number" id="tel_number" class="@error('tel_number') border-red-400 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                <label for="tel_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone number </label>
                <span class="text-red-500 text-sm error-text tel_number_error">
                </span>
            </div>

            <div class="relative z-0 mb-6 w-full group my-5">
                <input    type="password"  name="password" id="password" class="@error('password') border-red-400 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                {{-- @error('password') --}}
                <span class="text-red-500 text-sm error-text password_error">
                </span>
                    {{-- {{ $message }} --}}
                {{-- @enderror --}}
            </div>
            <div class="relative z-0 mb-6 w-full group my-5">
                <input    type="password"  name="password_confirmation" id="password_confirmation" class="@error('password') border-red-400 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                <label for="password_confirmation" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-900 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm Password </label>
                {{-- @error('password_confirmation') --}}
                <span class="text-red-500 text-sm error-text password_confirmation_error">
                </span>
                    {{-- {{ $message }} --}}
                {{-- @enderror --}}
            </div>

            <div class="relative z-0 mb-6 w-full group  @error('role') border-red-700 @enderror">
                <h3 class="mb-4 font-semibold text-gray-900 ">choose role for the user</h3>
                <select id="role" name="role" class=" block py-4 px-2 w-full font-bold text-sm text-black-500 bg-transparent border-0 border-b-3 bg-slate-400 rounded-lg border-gray-200 appearance-none dark:text-gray-900 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                    @foreach ($roles as $role )
                    <option >{{ $role }}</option>
                    @endforeach
                </select>
                <span class="text-red-500 error-text role_error"></span>
            </div>

            <button id='create' type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
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
                                'role':$('#role').val(),
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
                        error: function( xhr,st,tr){alert('ERROR OCCURED WHILE DELETING THE RECORD !')}
                    }); //end ajax

    })
    //form validation


})

</script>

</x-admin-layout>

