<x-guest-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="m-4 flex   justify-start border-b-2 border-slate-600  " ><span class="font-semibold text-lg text-white">{{ $user->first_name }} {{ $user->last_name }}</span></div>
            <div class="flex flex-wrap justify-end space-x-4 m-2 p-2">

                <div class="my-2 flex justify-end border-b-2 border-slate-600  " ><a href="{{ url('/') }}" class=" font-extrabold border-2 text-black rounded-lg border-orange-600 bg-orange-300 bg-opacity-20 mt-6 mb-2 px-3 py-1 " data-aos="fade-up" data-aos-delay="800">⥻ BACK HOME</a></div>
                <div class="my-2 flex justify-end border-b-2 border-slate-600  " ><a href="{{  route('user.reservations.create') }}" class=" font-extrabold border-2 text-black rounded-lg border-orange-600 bg-orange-300 bg-opacity-20 mt-6 mb-2 px-3 py-1 " data-aos="fade-up" data-aos-delay="800">MAKE RESERVATION</a></div>

            </div>
        </div>
    </div>

   {{-- table information  --}}
   <div class="min-h-screen  container overflow-x-auto relative">
    <div class="bg-red-600 bg-opacity-60 rounded-lg flex-wrap ">
         <span class="text-white px-5 font-bold">! you may change reservations having delay less than 48 hours in the two next hours only.</span><hr>
        <span class="text-white px-5 font-bold">! reservations of far delay can lasted .</span><hr>
    </div>

    <table class="w-full text-sm text-left mb-16  text-gray-500 dark:text-gray-400">
        <thead class="text-sm text-gray-900 rounded-lg uppercase bg-gray-50 bg-opacity-90 dark:bg-gray-700 dark:text-gray-400">
            <tr >

                <th scope="col" class="border-2 text-center py-3 px-6">
                    Date of Reservation
                </th>
                <th scope="col" class="border-2 text-center py-3 px-6">
                    Pitch
                </th>
                <th scope="col" class="border-2 text-center py-3 px-6">
                    Period Time
                </th>
                <th scope="col" class="border-2 text-center py-3 px-6">
                    created at
                </th>
                <th scope="col" class="border-2 text-center py-3 px-6">
                    updated at
                </th>
                  <th scope="col" class="border-2 text-center py-3 px-6">
                    Options
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            <tr class="bg-opacity-70 bg-slate-900 border-b dark:bg-gray-800 dark:border-gray-700">


                <td scope="row" class="py-3 px-auto text-center font-medium font-bold border-2 text-white whitespace-wrap dark:text-white">
                    {{ $reservation->res_date}}
                </td>

                <td scope="row" class="py-3 px-auto text-center font-medium font-bold border-2 text-white whitespace-wrap dark:text-white">
                    {{ $reservation->pitch->name  }}
                </td>


                <td scope="row" class="py-3 px-auto text-center font-medium font-bold border-2 text-white whitespace-wrap dark:text-white">
                    {{ $reservation->period->period_time }}
                </td>

                <td scope="row" class="py-3 px-auto text-center font-medium font-bold border-2 text-white whitespace-wrap dark:text-white">
                    {{ $reservation->created_at }}

                </td>

                <td scope="row" class="py-3 px-auto text-center font-medium font-bold border-2 text-white whitespace-wrap dark:text-white">
                    {{ $reservation->updated_at }}
                </td>



                {{-- options --}}
                <td scope="row"  class="py-auto px-auto  font-medium border-2 text-gray-900 whitespace-wrap dark:text-white">


                    @if ($reservation->updated_at->floatDiffInHours($now) <= 2 || ($reservation->res_date > $now &&  $reservation->res_date->floatDiffInHours($now) >= 48    ))
                    <div class="flex justify-center flex-wrap space-x-2 space-y-2">
                        <div class="my-1"><a href="{{ route('user.reservations.edit',$reservation->id) }}" class="rounded-lg px-4 bg-green-600 bg-opacity-80 hover:bg-green-900 text-white"  data-modal-toggle="update-modal" >Edit</a></div>
                       <div class=" p-auto my-1"><form action="{{ route('user.reservations.destroy',$reservation->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete ?')" >
                        @csrf
                        @method('DELETE')
                        <button class=" rounded-lg bg-red-600 bg-opacity-80 hover:bg-red-900 text-white px-3" type="submit" >Delete</button>
                        </form></div>
                    </div>
                    @else
                    <div class="flex justify-center items-center flex-wrap">
                        <span class="text-white p-2">you may not change this reservation</span>
                    </div>
                    @endif
                </td>
                {{-- endoption --}}
            </tr>
            @endforeach
            </tbody>
    </table>
</div>

</x-guest-layout>

