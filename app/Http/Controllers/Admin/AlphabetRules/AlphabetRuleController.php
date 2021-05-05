<?php

namespace App\Http\Controllers\Admin\AlphabetRules;

use App\Models\Alphabet;
use App\Models\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlphabetRuleController extends Controller
{
    public function allRules()
    {
            $rules = Rule::all();
            $alphabets = Alphabet::paginate(5);
            return view('admin.rule.alphabet',compact('rules','alphabets'));
    }

    public function alphabetRules(Request $request){

        $alphabet = Alphabet::findOrFail($request->alphabet_id);
        $alphabet->rules()->wherePivot('alphabet_id','=',$request->alphabet_id)->detach();
        foreach ($request->rules as $rule){
            $alphabet->rules()->attach($rule);
            $alphabet->save();
        }
        return response()->json([
            'message'=>'Alphabet Rules Defined Successfully!',
            'status'=> "success"
        ]);
    }

    public function index(){
        $rules = Rule::all();
        return view('admin.rule.add-rule',compact('rules'));
    }

    public function store(Request $request){
        try {
            $rule = new Rule();
            $rule->name = $request->name;
            $rule->description = $request->description;
            $rule->save();
            return redirect()->back()->with('success','Rules Successfully stored!');
        }catch (\Exception $e){
            return redirect()->back()->with('error','Something went wrong!'.$e->getMessage());
        }
    }

    public function edit(Request $request)
    {
            $rule = Rule::findOrFail($request->id);
            $rule->name = $request->name;
            $rule->description = $request->description;
            $rule->save();
            return response()->json([
                'message'=>'Rule Updated Successfully!',
                'status'=> "success"
            ]);
    }

    public function delete($id){
        try {
            $rule = Rule::findOrFail($id);
            $rule->delete();
            return redirect()->back()->with('success','Rule Deleted Successfully!');
        }catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong!'.$e->getMessage());
        }
    }
}
