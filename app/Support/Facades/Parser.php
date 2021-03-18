<?php

namespace App\Support\Facades;

use App\Services\ParseService;
use Illuminate\Support\Facades\Facade;

/**
 * @see App\Services\HasuraService
 */
class Parser extends Facade
{
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor()
  {
    return ParseService::class;
  }
}
