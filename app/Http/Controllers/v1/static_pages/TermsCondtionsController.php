<?php

namespace App\Http\Controllers\v1\static_pages;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiTrait;
use App\Models\StaticPage;
use Illuminate\Support\Facades\Lang;

class TermsCondtionsController extends Controller
{
	use ApiTrait;
    public function TermsConditions()
    {
        $page = StaticPage::where('id','3   ')->first();
        $lang = Lang::locale();

        return $this->ApiResponse(200, $page->title[$lang],null , $page->description[$lang]);

    }
}
