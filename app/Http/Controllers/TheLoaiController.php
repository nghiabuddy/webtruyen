<?php

namespace App\Http\Controllers;

use App\Models\TheLoai;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $theloai;
    public function __construct(TheLoai $theLoaiModel)
    {
        $this->theloai = $theLoaiModel;
        //books tự đặt tên
    }
    public function index()
    {
        $theloai = TheLoai::all();
        return view('admincp.theloai.index', compact('theloai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = TheLoai::all();
        return view('admincp.theloai.create', compact('theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate(
            [
                'tentheloai' => 'required|unique:theloai|max:255',
                'mota' => 'required',
                'kichhoat' => 'required',
                'slug_theloai' => 'required|unique:theloai',
            ],
            [
                'tentheloai.unique' => 'Tên theloai đã có, hãy nhập tên khác',
                'slug_theloai.unique' => 'Slug thể loại đã có, hãy nhập slug khác',
                'mota.required' => 'Mô tả không được để trống'
            ]
        );
        $this->theloai->create($validated_data);
        // return redirect()->route(('danhmuc.index'));
        return redirect()->back()->with('status', 'Thêm thể loại thành công');
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
    public function edit($id)
    {
        $theloai = $this->theloai->findOrFail($id);
        return view('admincp.theloai.edit', compact('theloai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated_data = $request->validate(
            [
                'tentheloai' => 'required|max:255',
                'mota' => 'required',
                'kichhoat' => 'required',
                'slug_theloai' => 'required',
            ],
            [
                'tentheloai.unique' => 'Tên thể loại đã có, hãy nhập tên khác',
                'slug_theloai.unique' => 'Slug thể loại đã có, hãy nhập slug khác',
                'mota.required' => 'Mô tả không được để trống'
            ]
        );
        $theloai = $this->theloai->findOrFail($id);
        $theloai->update($validated_data);
        return redirect()->back()->with('status', 'Cập nhật thể loại thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theloai = $this->theloai->findOrFail($id);
        $theloai->delete();
        return redirect()->back()->with('status', 'Xóa thể loại thành công');
    }
}