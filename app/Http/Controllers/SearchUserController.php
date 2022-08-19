<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchUserController extends Controller
{
    public function searchUser(Request $request){
        $users_searched=User::where('first_name','like','%'.$request->search.'%')->orWhere('last_name','like','%'.$request->search.'%')->get();
        // $users_searched=User::where('first_name','like','%'.$request->search.'%')->get();

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
            '</tr>';
        }


    // return compact('users_searched');
    return response($data);

    }
}
