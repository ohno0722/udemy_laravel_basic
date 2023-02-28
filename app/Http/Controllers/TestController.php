<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        dd('test');
        //Eloquent
        $values = Test::all();
        
        $count = Test::count();

        $first = Test::FindOrFail(1);//FindOrFailid(method)を指定するとその一つのインスタンスを返す
          
        $whereBBB = Test::where('text', '=', 'bbb')->get(); //whereで条件指定、textでbbbのものだけ
        
        //クエリビルダ
        $queryBuilder = DB::table('tests')->where('text', '=', 'bbb')
        ->select('id','text')//idとtext列を表示
        ->get();

        dd($values, $count, $first, $whereBBB, $queryBuilder);

        return view('tests.test', compact('values'));
    }
}
