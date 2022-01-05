<?php

namespace App\Http\Controllers;

use App\Models\Truyen;
use App\Models\Chapter;

use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $chapter;
    public function __construct(Chapter $chapterModel)
    {
        $this->chapter = $chapterModel;
        //books tự đặt tên
    }
    public function index()
    {
        $chapter = Chapter::with('truyen')->get();
        return view('admincp.chapter.index', compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $truyen = Truyen::all();
        return view('admincp.chapter.create', compact('truyen'));
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
                'tieude' => 'required|unique:chapter|max:255',
                'kichhoat' => 'required',
                'slug_chapter' => 'required|unique:chapter',
                'noidung' => 'required',
                'truyen_id' => 'required',
            ],
            [
                'tieude.unique' => 'Tiêu đề đã có, hãy nhập tên khác',
                'slug_chapter.unique' => 'Slug chapter đã có, hãy nhập slug khác',

            ]
        );
        $this->chapter->create($validated_data);
        // return redirect()->route(('danhmuc.index'));
        return redirect()->back()->with('status', 'Thêm chapter thành công');
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
        $chapter = $this->chapter->findOrFail($id);
        $truyen = Truyen::all();
        return view('admincp.chapter.edit', compact('chapter', 'truyen'));
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
                'tieude' => 'required|max:255',
                'kichhoat' => 'required',
                'slug_chapter' => 'required',
                'noidung' => 'required',
                'truyen_id' => 'required',
            ],
            [
                'tieude.unique' => 'Tiêu đề đã có, hãy nhập tên khác',
                'slug_chapter.unique' => 'Slug chapter đã có, hãy nhập slug khác',

            ]
        );
        $chapter = $this->chapter->findOrFail($id);
        $chapter->update($validated_data);
        // return redirect()->route(('danhmuc.index'));
        return redirect()->back()->with('status', 'Cập nhật chapter thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chapter = $this->chapter->findOrFail($id);
        $chapter->delete();
        return redirect()->back()->with('status', 'Xóa chapter thành công');
    }
}