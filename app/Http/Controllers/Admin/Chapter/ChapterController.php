<?php

namespace App\Http\Controllers\Admin\Chapter;

use App\Models\Alphabet;
use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChapterController extends Controller
{
    public function create()
    {
        $chapters = Chapter::orderBy('sr_no','asc')->get();
        $alphabets = [];
        if ($chapters->isNotEmpty()){
            $alphabets = $chapters->first()->alphabets;
        }

        return view('admin.chapter.create',compact('chapters','alphabets'));
    }

    public function store(Request $request)
    {
        $chapter = Chapter::find($request->chapter_id);

        foreach($request->files as $fileArr){
            foreach($fileArr as $key => $file) {
                $name = $key . time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/alphabets', $name);
                Alphabet::create([
                    'chapter_id' => $request->chapter_id,
                    'alphabet' => $name,
                ]);
            }
        }
        return response()->json([
            'status' => 'success',
            'chapter' => $chapter->alphabets,
        ]);
    }

    public function storeName(Request $request)
    {
        $no = 0 ;
        $findChapter = Chapter::orderBy('sr_no','desc')->first();

        if (!empty($findChapter)){
            $no = $findChapter->sr_no;
        }

        $chapter = Chapter::create([
            'name' => $request->name,
            'sr_no' => $no+1,
        ]);

        return response()->json([
            'status' => 'success',
            'chapter' => $chapter,
        ]);
    }

    public function index()
    {
        $chapters = Chapter::all();

        return view('admin.chapter.index',compact('chapters'));
    }

    public function edit($id)
    {
        $chapter = Chapter::findOrFail($id);

        return view('admin.chapter.edit',compact('chapter'));
    }

    public function update(Request $request)
    {

        $chapter = Chapter::findOrFail($request->edit_chapter_id);

        $oldNo = $chapter->sr_no;
        $newNo = $request->edit_chapter_no;

        $chapterExist = Chapter::where('sr_no',$newNo)->first();

        if (!empty($chapterExist)){
            $chapterExist->update([
                'sr_no' => $oldNo
            ]);
        }

       $chapter->update([
            'name' => $request->edit_chapter_name,
            'sr_no' => $newNo
        ]);

        return redirect(route('admin_create_chapter'))->with('success','Chapter updated successfully');
    }

    public function destroy(Request $request)
    {
        try{
            $chapter = Chapter::findOrFail($request->id);
            if ($chapter->alphabets){
                $alphabets = $chapter->alphabets;
                foreach ($alphabets as $alphabet){
                    $alphabet->recordings ? $alphabet->recordings()->delete() : '';
                    $alphabet->delete();
                }
            }
            $chapter->delete();
            return response()->json([
                'status' => 'success',
                'chapter' => $request->id,
                'message' => 'Chapter deleted successfully',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage(),
            ]);
        }
    }

    public function getAlphabets($id)
    {
        try{
            $chapter = Chapter::findOrFail($id);
            $alphabets = $chapter->alphabets;

            return response()->json([
                'status' => 'success',
                'chapterName' => $chapter->name,
                'alphabetCount' => $alphabets->count(),
                'alphabets' => $alphabets,
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
