<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\DanhMucTruyen;
use App\Models\TheLoai;
use App\Models\Truyen;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $truyen;
    private $danhmuc;
    private $chapter;
    private $theloai;
    public function __construct(Truyen $truyenModel, DanhMucTruyen $danhmucModel, Chapter $chapterModel, TheLoai $theloaiModel)
    {
        $this->truyen = $truyenModel;
        $this->danhmuc = $danhmucModel;
        $this->chapter = $chapterModel;
        $this->theloai = $theloaiModel;
    }
    public function home()
    {
        $truyen = $this->truyen
            ->where('kichhoat', 0)->get();
        $danhmuc = $this->danhmuc->all();
        $chapter = $this->chapter->all();
        $theloai = $this->theloai->all();
        $slide_truyen = $this->truyen->where('kichhoat', 0)->take(8)->get();
        return view('welcome', compact('truyen', 'danhmuc', 'chapter', 'theloai'));
    }
    public function danhmuc($slug)
    {
        $danhmuc = $this->danhmuc->all();
        $chapter = $this->chapter->all();
        $theloai = $this->theloai->all();
        $danhmuc_id = $this->danhmuc
            ->where('slug_danhmuc', $slug)
            ->first();
        $tendanhmuc = $this->danhmuc
            ->where('slug_danhmuc', $slug)
            ->first();
        $motadanhmuc = $this->danhmuc
            ->where('slug_danhmuc', $slug)
            ->first();
        $truyen = $this->truyen
            ->where('kichhoat', 0)
            ->where('danhmuc_id', $danhmuc_id->id)
            ->get();
        $countTruyen = count($truyen);
        // $tenChapter = $this->chapter->where('kichhoat', 0)->where('truyen_id', $truyen->id)->get();
        // $countChapter = count($tenChapter);

        return view('danh-muc', compact('truyen', 'danhmuc', 'tendanhmuc', 'countTruyen', 'motadanhmuc', 'theloai'));
    }

    public function xemtruyen($slug)
    {
        $danhmuc = $this->danhmuc->all();
        $theloai = $this->theloai->all();
        $truyen = Truyen::with('danhmuctruyen', 'theloai')
            ->where('slug_truyen', $slug)
            ->where('kichhoat', 0)
            ->first();
        $chapter = Chapter::with('truyen')
            ->where('truyen_id', $truyen->id)
            ->get();
        $cungdanhmuc = Truyen::with('danhmuctruyen', 'theloai')
            ->where('danhmuc_id', $truyen->danhmuctruyen->id)
            ->where('theloai_id', $truyen->theloai->id)
            ->whereNotIn('id', [$truyen->id])
            ->get();
        $chapter_dau = Chapter::with('truyen')
            ->orderBy('id', 'ASC')
            ->where('truyen_id', $truyen->id)
            ->first();
        return view('truyen-chu', compact('chapter', 'truyen', 'cungdanhmuc', 'chapter_dau', 'theloai'));
    }
    public function xemchapter($slug)
    {
        $danhmuc = $this->danhmuc->all();
        $theloai = $this->theloai->all();
        $truyen = Chapter::where('slug_chapter', $slug)
            ->first();
        $chapter = Chapter::with('truyen')
            ->where('slug_chapter', $slug)
            ->where('truyen_id', $truyen->truyen_id)
            ->first();
        $truyen_breadcrumb = Truyen::with('danhmuctruyen', 'theloai')
            ->where('id', $truyen->truyen_id)
            ->where('kichhoat', 0)
            ->first();
        $all_chapter = Chapter::with('truyen')
            ->orderBy('id', 'ASC')
            ->where('truyen_id', $truyen->truyen_id)
            ->get();
        $next_chapter = Chapter::where('truyen_id', $truyen->truyen_id)
            ->where('id', '>', $chapter->id)
            ->min('slug_chapter');
        $max_id = Chapter::where('truyen_id', $truyen->truyen_id)
            ->orderBy('id', 'DESC')
            ->first();
        $min_id = Chapter::where('truyen_id', $truyen->truyen_id)
            ->orderBy('id', 'ASC')
            ->first();;
        $previous_chapter = Chapter::where('truyen_id', $truyen->truyen_id)
            ->where('id', '<', $chapter->id)
            ->max('slug_chapter');
        return view('xem-truyen', compact('danhmuc', 'truyen', 'chapter', 'all_chapter', 'next_chapter', 'previous_chapter', 'max_id', 'min_id', 'theloai', 'truyen_breadcrumb'));
    }
    public function theloai($slug)
    {
        $theloai = $this->theloai->all();
        $chapter = $this->chapter->all();
        $theloai_id = $this->theloai
            ->where('slug_theloai', $slug)
            ->first();
        $tentheloai = $this->theloai
            ->where('slug_theloai', $slug)
            ->first();
        $motatheloai = $this->theloai
            ->where('slug_theloai', $slug)
            ->first();
        $truyen = $this->truyen
            ->where('kichhoat', 0)
            ->where('theloai_id', $theloai_id->id)
            ->get();
        $countTruyen = count($truyen);
        // $tenChapter = $this->chapter->where('kichhoat', 0)->where('truyen_id', $truyen->id)->get();
        // $countChapter = count($tenChapter);

        return view('the-loai', compact('truyen', 'theloai', 'tentheloai', 'countTruyen', 'motatheloai'));
    }
    public function timkiem(Request $request)
    {
        $data = $request->all();
        $danhmuc = $this->danhmuc->all();
        $theloai = $this->theloai->all();
        $tukhoa = $data['tukhoa'];
        $truyen = Truyen::with('danhmuctruyen', 'theloai')
            ->where('tentruyen', 'LIKE', "%$tukhoa%")
            ->orWhere('tacgia', 'LIKE', "%$tukhoa%")
            ->get();

        return view('tim-kiem', compact('truyen', 'theloai', 'danhmuc', 'tukhoa'));
    }
    public function timkiem_ajax(Request $request)
    {
        $data = $request->all();
        if ($data['query']) {
            $truyen = Truyen::with('danhmuctruyen', 'theloai')
                ->where('tentruyen', 'LIKE', '%' . $data['query'] . '%')
                ->orWhere('tacgia', 'LIKE', '%' . $data['query'] . '%')
                ->get();
            $output = '
                <ul class="dropdown-menu" style="display:inline-block;">';
            foreach ($truyen as $key => $str) {
                $output .= '<li class="li_search_ajax" style="padding: 4px 15px;"><a href="#" style="text-transform: uppercase; color: #000; text-decoration:none; font-size:15px;">' . $str->tentruyen . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}