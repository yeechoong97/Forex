<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElearningController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function intro(){
        return view('elearning.introduction.intro');
    }

    public function player(){
        return view('elearning.introduction.player');
    }

    public function benefit(){
        return view('elearning.introduction.benefit');
    }

    public function forexnstock(){
        return view('elearning.introduction.forexnstock');
    }

    //Knowlege part
    public function currency(){
        return view('elearning.knowledge.currency');
    }

    public function leverage(){
        return view('elearning.knowledge.leverage');
    }

    //Fundamental Analysis

    public function fundamental(){
        return view('elearning.f_analysis.fundamental');
    }

    public function watch(){
        return view('elearning.f_analysis.watch');
    }

    //Technical Analysis

    public function technical(){
        return view('elearning.t_analysis.technical');
    }

}
