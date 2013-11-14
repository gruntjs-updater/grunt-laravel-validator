<?php namespace Validators<%= namespace %>;
// AUTOGENERATED BY grunt-laravel-validator FROM <%= filepath %>, PLEASE, DON'T MODIFY IT

use App;
use Input;
use Log;
use Str;
<%= use %>

class <%= classname %> {

  public static function validate() {
    return self::validateData(Input::all());
  }

  public static function error($data, $msg) {
    $bt = debug_backtrace();
    $caller = array_shift($bt);
    Log::error($msg);
    Log::debug($caller['file'] . '::' . $caller['line']);
    Log::debug(var_export($data, TRUE));
    App::abort(403, 'validator error');
  }

  public static function validateData($data) {
    $valid = array();
    $store = array();

    if (!is_array($data)) {
      self::error($data, 'root is not an array');
    }

<%= validations %>
    return $valid;
  }

}
