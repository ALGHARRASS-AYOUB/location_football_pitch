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
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.periods.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-800 rounded-lg">⤶  Periods table</a>
            </div>
        </div>
    </div>



    <div id="new_period" class=" flex relative z-0 mb-6 w-full group my-5">
        <form action="{{ route('admin.periods.store') }}" method="post">
            <input class=" bg-blue-300 border-0 border-b-2 rounded"   type="text" name="period_time"  id="period_time" class="@error('tel_number') border-red-400 @enderror block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="ex: 9:00 - 10:00" >
            <button id='create' type="submit"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            <span class="text-red-500 text-sm error-text tel_number_error">
            </span>
        </form>
    </div>




    </div>

</x-admin-layout>

