<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Input;
use App\Order;
use Carbon\Carbon;
use App\Account;
use App\Trades;
use App\User;
use Auth;


class LearningController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('elearning.index');
    }
}
