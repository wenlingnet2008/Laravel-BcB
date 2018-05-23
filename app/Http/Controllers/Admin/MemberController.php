<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MemberRequest;
use App\Models\Company;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use App\Models\Member;
use Illuminate\Validation\Rule;

class MemberController extends Controller
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
    public function index()
    {

        $data['show_fields'] = [
            1 => '公司名',
            2 => '会员名',
            3 => '姓名',
            4 => 'Email',
        ];

        $limit = 10;
        $members = Member::with('company')->paginate($limit);
        $data['members'] = $members;

        return view('admin.member.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        $this->validate($request, [
            'post.company' => ['required', 'max:150', 'unique:companies,name'],
            'post.business' => ['required', 'max:255'],
            'post.mode' => ['nullable', 'max:100'],
            'post.capital' => ['nullable', 'numeric'],
            'post.regunit' => ['nullable', 'max:15'],
            'post.regyear' => ['required', 'integer', 'max:9999'],
            'post.address' => ['required', 'max:255'],
            'post.telephone' => ['required', 'max:50'],
            'post.fax' => ['nullable', 'max:50'],
            'post.mail' => ['nullable', 'max:50'],
            'post.homepage' => ['nullable', 'max:255'],
            'post.content' => ['required'],
        ]);


        $member = new Member();
        $member->email = $request->input('email');
        $member->name = $request->input('username');
        $member->password = $request->input('password');
        $member->regip = $request->ip();
        $member->gender = $request->input('gender');
        $member->true_name = $request->input('true_name');
        $member->department = $request->input('department');
        $member->career = $request->input('career');
        $member->mobile = $request->input('mobile');
        $member->saveMember();


        $company = $request->input('post');
        $company['name'] = $company['company'];
        unset($company['company']);
        if(isset($company['mode'])) $company['mode'] = implode('|', $company['mode']);
        $company['userid'] = $member->userid;
        Company::create($company);

        return back()->with(['status'=>'添加成功']);

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {

        $data['member'] = $member;

        return view('admin.member.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, Member $member)
    {
        $this->validate($request, [
            'post.company' => ['required', 'max:150', Rule::unique('companies', 'name')->ignore($member->userid, 'userid')],
            'post.business' => ['required', 'max:255'],
            'post.mode' => ['nullable', 'max:100'],
            'post.capital' => ['nullable', 'numeric'],
            'post.regunit' => ['nullable', 'max:15'],
            'post.regyear' => ['required', 'integer', 'max:9999'],
            'post.address' => ['required', 'max:255'],
            'post.telephone' => ['required', 'max:50'],
            'post.fax' => ['nullable', 'max:50'],
            'post.mail' => ['nullable', 'max:50'],
            'post.homepage' => ['nullable', 'max:255'],
            'post.content' => ['required'],
        ]);

        $member->email = $request->input('email');
        if($request->filled('password')){
            $member->password = $request->input('password');
        }
        $member->regip = $request->ip();
        $member->gender = $request->input('gender');
        $member->true_name = $request->input('true_name');
        $member->department = $request->input('department');
        $member->career = $request->input('career');
        $member->mobile = $request->input('mobile');
        $member->saveMember();

        $company = $member->company;
        $company->userid = $member->userid;
        $company->name = $request->input('post.company');
        $company->business = $request->input(('post.business'));
        if($request->filled('post.mode')) $company->mode = implode('|', $request->input('post.mode'));
        $company->capital = $request->input('post.capital');
        $company->regyear = $request->input('post.regyear');
        $company->address = $request->input('post.address');
        $company->telephone = $request->input('post.telephone');
        $company->fax = $request->input('post.fax');
        $company->mail = $request->input('post.mail');
        $company->homepage = $request->input('post.homepage');
        $company->content = $request->input('post.content');
        $company->save();

        return back()->with(['status'=>'更新成功']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function search(Request $request){
        $default_fields = [
            1 => 'companies.name',
            2 => 'members.name',
            3 => 'true_name',
            4 => 'email',
        ];
        $this->validate($request, [
            'fields' => ['required', 'integer', Rule::in(array_keys($default_fields))],
            'kw' => ['required'],
            'psize' => ['required', 'integer'],
        ]);

        $field = $default_fields[$request->input('fields')];
        $kw = $request->input('kw');
        $psize = $request->input('psize');


        $members = Member::join('companies', function ($join) use($kw, $field) {
            $join->on('members.userid', '=', 'companies.userid')
                ->where($field, 'like', '%'.$kw.'%');
        })->select('members.*', 'companies.name as company_name')->paginate($psize);

        $data['show_fields'] = [
            1 => '公司名',
            2 => '会员名',
            3 => '姓名',
            4 => 'Email',
        ];

        $data['members'] = $members;
        return view('admin.member.list', $data);


    }
}
