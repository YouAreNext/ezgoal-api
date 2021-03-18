<?php

namespace App\Http\Controllers\Parser;

use App\Http\Controllers\Controller;
use App\Support\Facades\Parser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PHPHtmlParser\Dom;

class MaterialParserController extends Controller
{
  /**
   * Instantiate a new LoginController instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth:jwt');
  }

  /**
   * Parse external link html
   *
   * @param Request $request
   * @return void
   */
  public function parseMaterial(Request $request)
  {
    $data = Parser::parseLink($request->input['url']);

    return response()->json($data);
  }
}
