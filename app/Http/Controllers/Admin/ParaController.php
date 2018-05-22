<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ParaRequest;
use App\Models\Category;
use App\Models\DefaultPara;
use App\Models\DefaultParaValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ParaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.admin');
        App::setLocale('zh_cn');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->method() == 'POST'){
            $this->validate($request, [
                'dpid' => ['required', 'array'],
                'dpid.*' => ['required', 'integer'],
                'list_order' => ['required', 'array'],
                'list_order.*' => ['required', 'integer'],
            ]);

            $dpids = $request->input('dpid');
            $list_order = $request->input('list_order');
            foreach($dpids as $dpid){
                DefaultPara::where('dpid', $dpid)->update(['list_order'=>$list_order[$dpid]]);
            }
            return back()->with(['status' => '更新成功']);

        }

        $data['category'] = Category::findOrFail(intval($request->input('catid')));
        $data['paras'] = DefaultPara::with(['values'])->where('catid', $request->input('catid'))->orderBy('list_order', 'ASC')->get();
        return view('admin.para.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['category'] = Category::findOrFail(intval($request->input('catid')));
        return view('admin.para.add', $data);
    }

    /**
     * @param ParaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ParaRequest $request)
    {
        $category = Category::findOrFail(intval($request->input('catid')));

        $para = new DefaultPara();
        $para->name = $request->input('name');
        $para->category()->associate($category);
        $para->save();



        $values = $request->input('value');
        if(is_array($values)){
            foreach($values as $value){
                $default_value = new DefaultParaValue();
                $default_value->value = $value;
                $default_value->para()->associate($para);
                $default_value->save();
            }
        }else{
            $default_value = new DefaultParaValue();
            $default_value->value = $values;
            $default_value->para()->associate($para);
            $default_value->save();
        }

        return back()->with('status', '添加成功');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param DefaultPara $para
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, DefaultPara $para)
    {
        $this->validate($request, [
            'catid' => [Rule::in($para->catid)],
        ]);

        $data['category'] = Category::findOrFail(intval($request->input('catid')));
        $data['para'] = $para;
        $data['values'] = $para->values()->orderBy('dvid', 'ASC')->pluck('value', 'dvid')->toArray();
        return view('admin.para.edit', $data);
    }

    /**
     * @param ParaRequest $request
     * @param DefaultPara $para
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ParaRequest $request, DefaultPara $para)
    {

        $para->name = $request->input('name');
        $para->save();

        $oldvalue = $request->input('oldvalue');
        foreach($oldvalue as $dvid => $ov){
            $para_value = DefaultParaValue::findOrFail($dvid);
            if(empty($ov)){
                $para_value->delete();
            }else{
                $para_value->value = $ov;
                $para_value->save();
            }
        }


        if($request->filled('value')){
            $values = $request->input('value');
            if(is_array($values)){
                foreach ($values as $value){
                    $para_value = new DefaultParaValue();
                    $para_value->value = $value;
                    $para_value->para()->associate($para);
                    $para_value->save();
                }
            }else{
                $para_value = new DefaultParaValue();
                $para_value->value = $values;
                $para_value->para()->associate($para);
                $para_value->save();
            }
        }


        return back()->with(['status'=>'更新成功']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DefaultPara $para)
    {
        DefaultParaValue::where('dpid', $para->dpid)->delete();
        $para->delete();
        return \response()->json(['message'=> '删除成功']);
    }


    public function copy(Request $request){


        $catid = $request->input('catid');
        $category = Category::findOrFail($catid);
        $data['category'] = $category;


        if($request->method() == 'POST'){

            $validator = Validator::make($request->all(), [
                'type' => ['required', 'integer'],
                'catid' => ['required', 'integer'],
                'fromid' => ['required_if:type,1', ],
                'dpid' => ['required_if:type,0'],
            ],[
                'fromid.exists' => '选定的分类没有任何属性',
                'dpid.exists' => '所填写的属性ID不存在',
            ]);

            $validator->sometimes('fromid', [
                'integer', 'min:1',
                Rule::notIn($category->catid),
                Rule::exists('default_paras', 'catid'),
            ], function($input){
                    return intval($input->type) === 1;
            });


            $validator->sometimes('dpid', [
                'integer',
                Rule::exists('default_paras', 'dpid'),
            ], function($input){
                return intval($input->type) === 0;
            });

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }


            if(intval($request->input('type')) === 1){
                $fromid = $request->input('fromid');
                $paras = DefaultPara::with('values')->where('catid', $fromid)->get();

            }else{
                $dpid  = $request->input('dpid');
                $paras = DefaultPara::with('values')->where('dpid', $dpid)->get();
            }

            foreach($paras as $p){
                if(! DefaultPara::where(['catid'=>$category->catid, 'name'=> $p->name])->first()){
                    $para = new DefaultPara();
                    $para->name = $p->name;
                    $para->list_order = $p->list_order;
                    $para->category()->associate($category);
                    $para->save();

                    foreach($p->values  as $v){
                        $para_value = new DefaultParaValue();
                        $para_value->value = $v->value;
                        $para_value->para()->associate($para);
                        $para_value->save();
                    }
                }
            }

            return back()->with(['status'=>'复制成功']);
        }


        $top_categories =  Category::where('parent_id', null)->get();
        $data['top_categories'] = [];
        foreach($top_categories as $category){
            $data['top_categories'][$category->catid] = ['name'=> $category->name];
        }

        return view('admin.para.copy', $data);
    }
}
