<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LangController extends Controller
{
    public $languages = [
        'en' => 'English',
        'vi' => 'Tiếng Việt'
    ];
    public function selectLang($lang)
    {
        if (isset($this->languages[$lang])) {
            // tiến hành ghi lựa chọn ngôn ngữ vào session
            session(['lang' => $lang]);
            return  redirect()->back();
        }
        return  redirect()->route('home');
    }
}
