<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\OrderCallMail;
use App\Models\Page;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ApiSendOrderCallMailController extends Controller
{
    private $pageRepository;

    public function __construct()
    {
        $this->pageRepository = new PageRepository();
    }

    public function __invoke(Request $request)
    {
        $homePage = $this->pageRepository
                         ->find('home');

        Log::info($request['user_name']);
        Log::info($request['user_phone']);
        Mail::to($homePage->email)
            ->send(new OrderCallMail($request['user_name'],$request['user_phone']));

        return response()->json();
    }
}
