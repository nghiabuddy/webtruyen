<?php

namespace App\Http\Controllers;

use App\Models\DanhMucTruyen;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $danhmuctruyen;
    public function __construct(DanhMucTruyen $danhMucTruyenModel)
    {
        $this->danhmuctruyen = $danhMucTruyenModel;
        //books tự đặt tên
    }
    public function index()
    {

        return view('admincp.danhmuctruyen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuctruyen = DanhMucTruyen::all();
        return view('admincp.danhmuctruyen.create', compact('danhmuctruyen'));
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
                'tendanhmuc' => 'required|unique:danhmuc|max:255',
                'mota' => 'required',
                'kichhoat' => 'required',
                'slug_danhmuc' => 'required|unique:danhmuc',
            ],
            [
                'tendanhmuc.unique' => 'Tên danh mục đã có, hãy nhập tên khác',
                'slug_danhmuc.unique' => 'Slug danh mục đã có, hãy nhập slug khác',
                'mota.required' => 'Mô tả không được để trống'
            ]
        );
        $this->danhmuctruyen->create($validated_data);
        // return redirect()->route(('danhmuc.index'));
        return redirect()->back()->with('status', 'Thêm danh mục truyện thành công');
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
        $danhmuctruyen = $this->danhmuctruyen->findOrFail($id);
        return view('admincp.danhmuctruyen.edit', compact('danhmuctruyen'));
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
                'tendanhmuc' => 'required|max:255',
                'mota' => 'required',
                'kichhoat' => 'required',
                'slug_danhmuc' => 'required|unique:danhmuc',
            ],
            [
                'tendanhmuc.unique' => 'Tên danh mục đã có, hãy nhập tên khác',
                'slug_danhmuc.unique' => 'Slug danh mục đã có, hãy nhập slug khác',
                'mota.required' => 'Mô tả không được để trống'
            ]
        );
        $danhmuctruyen = $this->danhmuctruyen->findOrFail($id);
        $danhmuctruyen->update($validated_data);
        return redirect()->back()->with('status', 'Cập nhật danh mục truyện thành công');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $danhmuctruyen = $this->danhmuctruyen->findOrFail($id);
        $danhmuctruyen->delete();
        return redirect()->back()->with('status', 'Xóa danh mục truyện thành công');
    }
    /*  public function delete($id)
    {

        $danhmuctruyen = $this->danhmuctruyen->findOrFail($id);
        $danhmuctruyen->delete();
        return redirect()->route(('admincp.danhmuctruyen.index'));
    } */
}