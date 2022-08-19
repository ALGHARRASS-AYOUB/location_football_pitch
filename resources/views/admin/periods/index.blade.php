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
                    Periods
                </div>
            </div>

            <div class="m-2 p-2 flex ">
                <button id="new_period_btn" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-800 rounded-lg">new Period ▼</button>
            </div>
                <div id="new_period" class="hidden flex relative z-0 mb-6 w-full group my-5">
                    <form action="{{ route('admin.periods.store') }}" method="post">
                        @csrf
                        <input class=" bg-blue-300 border-0 border-b-2 rounded"   type="text" name="period_time" autofocus id="period_time" class="@error('tel_number') border-red-400 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="ex: 9:00 - 10:00" >
                        <button id='create' type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        <span class="text-red-500 text-sm error-text tel_number_error">
                        </span>
                    </form>
                </div>




            </div>
    </div>

    <div class="m-2 p-2 bg-blue-600 text-yellow-200">TOTAL PERIODS  : <h6 class="text-white font-bold ">{{ $periods_number}}</h6></div>


      {{-- period information  --}}
      <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        ID
                    </th>
                    <th scope="col" class="py-3 px-6">
                        time period
                    </th>

                    <th scope="col" class="py-3 px-6">
                        options
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($periods as $period)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">


                    <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $period->id }}
                    </td>

                    <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $period->period_time }}
                    </td>

                    {{-- options --}}
                    <td scope="row" class="py-2 px-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex space-x-2">

                            <a href="{{ route('admin.periods.edit',$period->id) }} " id="edit_period_btn" class="px-4 py-1 bg-green-600 hover:bg-green-900 rounded-lg text-white" >Edit</a>

                            {{-- @yield('content') --}}
                            <form action="{{ route('admin.periods.destroy',$period->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete ?')" class="px-4 py-1 rounded-lg bg-red-600 hover:bg-red-900 text-white">
                                @csrf
                                @method('DELETE')
                            <button type="submit" >Delete</button>
                            </form>
                        </div>
                    </td>
                    {{-- endoption --}}

                </tr>
                @endforeach
                </tbody>
        </table>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {
            $( "#new_period_btn" ).click(function() {
                $( "#new_period" ).fadeToggle();
            });
        });

        $(function() {
            $( "#edit_period_btn" ).click(function() {
                $( "#edit_period" ).children(
                );
            });
        });
        </script>
</x-admin-layout>

