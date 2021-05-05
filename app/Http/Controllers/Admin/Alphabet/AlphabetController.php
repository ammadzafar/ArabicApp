<?php

namespace App\Http\Controllers\Admin\Alphabet;

use App\Models\Alphabet;
use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlphabetController extends Controller
{
    public function create()
    {
        $chapters = Chapter::all();

        return view('admin.alphabet.create',compact('chapters'));
    }

    public function store(Request $request)
    {
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $key => $file){
                $name= $key.time().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/alphabets',$name);
                Alphabet::create([
                    'chapter_id' => $request->chapter_id,
                    'alphabet' => $name,
                ]);
            }
            return back()->with('success','Alphabet created successfully');
        }else{
            return back()->with('error','Please select image');
        }



    }

    public function index(Request $request)
    {
//        dd($request->all());
        $query = Alphabet::query();
        if ($request->chapter_filter){
            $query->where('chapter_id',$request->chapter_filter);
        }

        $alphabets = $query->get();
        $chapters = Chapter::all();

        return view('admin.alphabet.index',compact('alphabets','chapters'));
    }

    public function edit($id)
    {
        $alphabet = Alphabet::findOrFail($id);
        $chapters = Chapter::all();


        return view('admin.alphabet.edit',compact('alphabet','chapters'));
    }

    public function update(Request $request,$id)
    {
        $alphabet = Alphabet::findOrFail($id);
        $name = $alphabet->alphabet;

        if($request->hasFile('file')){
            unlink(public_path('uploads/alphabets/'.$name));

            $file = $request->file('file');
            $name = time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/alphabets/',$name);
        }


        $alphabet->update([
            'chapter_id' => $request->chapter_id,
            'alphabet' => $name
        ]);

        return redirect(route('admin_alphabet_list'))->with('success','Alphabet updated successfully');
    }

    public function destroy(Request $request)
    {
        try{
            foreach ($request->alphabets as $aplha){
                $alphabet = Alphabet::findOrFail($aplha);
                $alphabet->recordings ? $alphabet->recordings()->delete() : '';

                $alphabet->delete();
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Alphabet deleted successfully',
                'alphabets' => $request->alphabets
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
