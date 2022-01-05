<?php

namespace App\Http\Controllers;

use App\Models\Truyen;
use App\Models\DanhMucTruyen;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $truyen;
    public function __construct(Truyen $TruyenModel)
    {
        $this->truyen = $TruyenModel;
        //books tự đặt tên
    }
    public function index()
    {
        $truyen = Truyen::with('danhmuctruyen', 'theloai')->get();
        // $truyen = $this->truyen->first()->danhmuctruyen->danhmuc_id;
        return view('admincp.truyen.index', compact('truyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $truyen = Truyen::all();
        $danhmuc = DanhMucTruyen::all();
        $theloai = TheLoai::all();
        return view('admincp.truyen.create', compact('danhmuc', 'theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'tentruyen' => 'required|unique:truyen|max:255',
                'tomtat' => 'required',
                'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
                'slug_truyen' => 'required|unique:truyen',
                'kichhoat' => 'required',
                'tacgia' => 'required',
                'trangthai' => 'required',
                'danhmuc_id' => 'required',
                'theloai_id' => 'required'
            ],
            [
                'tentruyen.unique' => 'Tên truyện đã có, hãy nhập tên khác',
                'slug_truyen.unique' => 'Slug truyện đã có, hãy nhập slug khác',
                'tomtat.required' => 'Tóm tắt không được để trống',
                'tacgia.required' => 'Tóm tắt không được để trống',
                'trangthai.required' => 'Trạng thái không được để trống',
                'hinhanh.required' => 'Hình ảnh truyện phải có'
            ]
        );

        $truyen = new Truyen();
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->danhmuc_id = $data['danhmuc_id'];
        $truyen->theloai_id = $data['theloai_id'];
        $truyen->trangthai = $data['trangthai'];
        //Upload image
        $get_image = $request->hinhanh;
        $path = 'public/uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $truyen->hinhanh = $new_image;
        $truyen->save();
        //$this->truyen->create($validated_data);
        // return redirect()->route(('danhmuc.index'));
        return redirect()->back()->with('status', 'Thêm truyện thành công');
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
        $truyen = $this->truyen->findOrFail($id);
        $danhmuc = DanhMucTruyen::all();
        $theloai = TheLoai::all();
        return view('admincp.truyen.edit', compact('truyen', 'danhmuc', 'theloai'));
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
        $data = $request->validate(
            [
                'tentruyen' => 'required|max:255',
                'tomtat' => 'required',
                'tacgia' => 'required',
                'slug_truyen' => 'required',
                'kichhoat' => 'required',
                'trangthai' => 'required',
                'danhmuc_id' => 'required',
                'theloai_id' => 'required'
            ],
            [
                'tentruyen.unique' => 'Tên truyện đã có, hãy nhập tên khác',
                'slug_truyen.unique' => 'Slug truyện đã có, hãy nhập slug khác',
                'tomtat.required' => 'Tóm tắt không được để trống',
                'tacgia.required' => 'Tác giả không được để trống',
                'trangthai.required' => 'Trạng thái không được để trống'
            ]
        );
        $truyen = $this->truyen->findOrFail($id);
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->danhmuc_id = $data['danhmuc_id'];
        $truyen->theloai_id = $data['theloai_id'];
        $truyen->trangthai = $data['trangthai'];
        //Upload image
        $get_image = $request->hinhanh;
        if ($get_image) {
            $path = 'public/uploads/truyen/' . $truyen->hinhanh;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/uploads/truyen/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $truyen->hinhanh = $new_image;
        }
        $truyen->save();
        //$this->truyen->create($validated_data);
        // return redirect()->route(('danhmuc.index'));
        return redirect()->back()->with('status', 'Cập nhật truyện thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truyen = $this->truyen->findOrFail($id);
        $path = 'public/uploads/truyen/' . $truyen->hinhanh;
        if (file_exists($path)) {
            unlink($path);
        }
        $truyen->delete();
        return redirect()->back()->with('status', 'Xóa truyện thành công');
    }
}