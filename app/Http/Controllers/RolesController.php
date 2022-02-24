<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index() {
        $roleList = $this->list();
        return view('admin.role',[
            'roleList' => $roleList,
        ]);
    }

    public function list() {
        $roleList = Roles::where('status',1)->get();

        return $roleList;
    }

    public function save(Request $request, $id = NULL) {
        if($id == NULL) {
            $roleName = $request->role_name;
            Roles::create([
                'name' => $roleName,
                'status' => 1
            ]);
            return redirect(route('role'));
        }else {
            $roleInfo = Roles::where('id', $id)->first();
            return view('admin.role-update',[
                'roleInfo' => $roleInfo,
            ]);
        }
    }

    public function delete($id) {

        Roles::where('id', $id)->update([
            'status' => 9,
        ]);

        return redirect(route('role'));
    }

    public function roleUpdatePost(Request $request){

        Roles::where('id',$request->role_id)->update([
            'name' => $request->role_name,
        ]);
        return redirect(route('role'));
    }
}
