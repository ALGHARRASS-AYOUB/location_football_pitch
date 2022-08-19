<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchUserController extends Controller
{
    public function searchUser(Request $request){
        // $users_searched=User::where('first_name','like','%'.$request->search.'%')->orWhere('last_name','like','%'.$request->search.'%')->get();
        $users_searched=User::where('first_name','like','%'.$request->search.'%')->get();

        $data='';
        foreach ($users_searched as $user){

          $data.= ' <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">'
                .'<td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">'
                    .$user->id.
                '</td>'.
                '<td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">'.
                 $user->first_name.
                '</td>'.
                '<td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">'.
                     $user->last_name.
                '</td>'.
                '<td class="py-4 px-6">'.
                    $user->email.
                '</td>'.
                '<td class="py-4 px-6">'.
                    $user->tel_number.
                '</td>'.
                '<td class="py-4 px-6">'.
                     $user->role.
                '</td>'.
                '<td class="py-4 px-6">'.
              '  <div class="flex space-x-2">'.
                        '<a href="{{ route(\'admin.users.show\','.$user.') }}" class="px-4 py-1 bg-green-600 hover:bg-green-900 rounded-lg text-white"  data-modal-toggle="update-modal" >Show reservation</a>'.
                        '@can(\'update\','.$user.')'.
                        '<a href="{{ route(\'admin.users.edit\','.$user->id.') }}" class="px-4 py-1 bg-yellow-600 hover:bg-yellow-900 rounded-lg text-white"  data-modal-toggle="update-modal" >Edit</a>'.
                        '@endcan'.
                        '@cannot(\'update\','.$user.')'.
                            '<span class="px-2">read only</span>'.
                       ' @endcannot'.
                       ' @can(\'delete\','.$user.')'.
                        '<form action="{{ route(\'admin.users.destroy\','.$user->id.') }}" method="POST" onsubmit="return confirm(\'Are you sure you want to delete ?\')" class="px-4 py-1 rounded-lg bg-red-600 hover:bg-red-900 text-white">'.
                        '@csrf'.
                        '@method(\'DELETE\')'.
                        '<button type="submit" >Delete</button>'.
                        '</form>'.
                        '@endcan'.
                    '</div>'.
                '</td>'.
            '</tr>';
        }

    return compact('users_searched');
    // return response($data);
    }
}
