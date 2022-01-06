<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//--import untuk mengenalkan file validator dan member
use Illuminate\Support\Facades\Validator;
use App\Models\member;

class MemberController extends Controller
{
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
			'nama' => 'required|string',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
		]);

		if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' =>$validator->errors(),
            ]);
		}

		$member = new member();
        $member->id_member = $request->id_member;
		$member->nama = $request->nama;
        $member->alamat = $request->alamat;
        $member->jenis_kelamin = $request->jenis_kelamin;
		$member->save();

        $data = member::where('id_member','=', $member->id_member)->first();
        return response()->json([
            'success' => true,
            'message' => 'Berhasil menambahkan member baru!',
            'data' => $data
        ]); 
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_member' => 'required|string',
			'nama' => 'required|string',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
		]);

		if($validator->fails()){    
            return response()->json([
                'success' => false,
                'message' =>$validator->errors(),
            ]);
		}

		$member = Member::where('id_member', $id)->first();
        $member->id_member = $request->id_member;
		$member->nama = $request->nama;
        $member->alamat = $request->alamat;
        $member->jenis_kelamin = $request->janis_kelamin;
		$member->save();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menambahkan outlet baru!'
        ]); 
    }

    public function delete($id)
    {
        $delete = member::where('id_member', $id)->delete();

        if($delete){
            return response()->json([
                'success' => true,
                'message' => 'Data outlet berhasil didapus!'
            ]); 
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data outlet gagal dihapus!'
            ]); 
        }
    }

    public function getAll($limit = NULL, $offset = NULL)
    {
        $data["count"] = member::count();
        
        if($limit == NULL && $offset == NULL){
            $data["member"] = member::get();
        } else {
            $data["member"] = member::take($limit)->skip($offset)->get();
        }

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menambahkan member baru!',
            'data' => $data
        ]); 
    }

    public function getById($id)
    {   
        $data["member"] = member::where('id_member', $id)->get();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menambahkan member baru!',
            'data' => $data
        ]); 
    }
}
