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
                {{-- <a href="{{ route('admin.reservations.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-800 rounded-lg">new Reservation</a> --}}
            </div>
        </div>
    </div>

    <form id="date_form" action="{{ route('admin.searchDate') }}" method="get">

        <label for="date" class="bg-slate-200 font-bold p-2" >choose a date: </label>
        <input type="date" id="date" name="date" class="border-0 border-b-2 ">
    </form>

    {{-- table information  --}}
    <div class="overflow-x-auto relative">
        @if (isset($date))
        <div class="p-3 m-2 bg-yellow-600 text-white">Date : {{ $date }}</div>
        @endif
        <div class="m-2 p-2 bg-green-600 text-white">Reservation Number: {{ $reservaion_number }}</div>
        <div class="flex flex-wrap">
            @foreach ($periods as $pr)
                    <div class="m-2 p-2 bg-blue-600 text-yellow-200">number of reservations at {{ $pr->period_time }}: <h6 class="text-white font-bold ">@if (isset($date))
                        {{ count($pr->reservations->where('res_date',$date))  }}

                        @else
                        {{ count($pr->reservations)  }}

                    @endif</h6></div>
            @endforeach

        </div>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-4">
                    ID
                </th>
                <th scope="col" class="py-3 px-6">
                    First Name
                </th>
                <th scope="col" class="py-3 px-6">
                   Last Name
                </th>

                <th scope="col" class="py-3 px-6">
                    Email
                </th>

                <th scope="col" class="py-3 px-6">
                    Telephone Number
                </th>
                <th scope="col" class="py-3 px-6">
                    Date of Reservation
                </th>
                <th scope="col" class="py-3 px-6">
                    Pitch
                </th>
                <th scope="col" class="py-3 px-6">
                    Period Time
                </th>
                  <th scope="col" class="py-3 px-6">
                    Options
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td scope="row" class="py-4 px-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                    {{ $reservation->id }}
                </td>
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                    {{ $reservation->user->first_name }}
                </td>

                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $reservation->user->last_name }}
                </td>

                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $reservation->user->email }}
                </td>

                <td scope="row" class="py-4 px-6 max-w-xs font-medium text-gray-900 whitespace-wrap dark:text-white">
                    {{ $reservation->user->tel_number }}
                </td>

                <td scope="row" class="py-4 px-6 max-w-xs font-medium text-gray-900 whitespace-wrap dark:text-white">
                    {{ $reservation->res_date}}
                </td>

                <td scope="row" class="py-4 px-6 max-w-xs font-medium text-gray-900 whitespace-wrap dark:text-white">
                    {{ $reservation->pitch->name  }}
                </td>


                <td scope="row" class="py-4 px-6 max-w-xs font-medium text-gray-900 whitespace-wrap dark:text-white">
                    {{ $reservation->period->period_time  }}
                </td>



                {{-- options --}}
                <td scope="row" class="py-2 px-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.reservations.edit',$reservation->id) }}" class="px-4 py-1 bg-green-600 hover:bg-green-900 rounded-lg text-white"  data-modal-toggle="update-modal" >Edit</a>
                        <form action="{{ route('admin.reservations.destroy',$reservation->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete ?')" class="px-4 py-1 rounded-lg bg-red-600 hover:bg-red-900 text-white">
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
    $(document).ready(function () {
        $.ajaxSetup({
              headers: { 'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content') }
        });

        $('#date').on('change',function(){
            $.ajax({
                method: $('#date_form').attr('method'),
                url: $('#date_form').attr('action'),

                data: {
                    'date': $('#date').val(),
                },

                beforeSend: function(){

                },
                success: function(){
                    console.log('date send');
                    $('#date_form').submit();
                },
                error: function(){

                },

            });
        });


    });
</script>

</x-admin-layout>

