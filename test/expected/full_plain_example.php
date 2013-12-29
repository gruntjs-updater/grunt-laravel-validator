<?php namespace Validators;
// AUTOGENERATED BY grunt-laravel-validator FROM full_plain_example.js, PLEASE, DON'T MODIFY IT

use App;
use Input;
use Log;
use Str;
use MyNamespace\MyClass1;
use MyNamespace\MyClass2;
use Config;
use Carbon\Carbon;

class FullPlainExample {

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

    if (!isset($data['fstring'])) {
      $data['fstring'] = null;
    }

    $value = $data['fstring'];
    if (is_null($value)) {
      $value = '';
    }
    if (is_int($value) || is_float($value)) {
      $value = strval($value);
    }
    if (!is_string($value)) {
      self::error($data, 'key ' . 'fstring' . ' is not a string');
    }

    $valid['fstring'] = $value;

    if (!isset($data['finteger'])) {
      $data['finteger'] = null;
    }

    $value = $data['finteger'];
    if (is_null($value)) {
      $value = 0;
    }
    if (is_string($value)) {
      if (ctype_digit($value)) {
        $value = intval($value);
      }
    }
    if (!is_int($value)) {
      self::error($data, 'key ' . 'finteger' . ' is not an integer');
    }

    $valid['finteger'] = $value;

    if (!isset($data['fboolean'])) {
      $data['fboolean'] = null;
    }

    $value = $data['fboolean'];
    if (is_string($value)) {
      if ($value === 'true' || $value === '1' || $value === 'on') {
        $value = true;
      }
      if ($value === 'false' || $value === '0' || $value === 'off') {
        $value = false;
      }
    }
    if (is_int($value)) {
      if ($value === 1) {
        $value = true;
      }
      if ($value === 0) {
        $value = false;
      }
    }
    if (!is_bool($value)) {
      self::error($data, 'key ' . 'fboolean' . ' is not a boolean');
    }

    $valid['fboolean'] = $value;

    if (!isset($data['ffloat'])) {
      $data['ffloat'] = null;
    }

    $value = $data['ffloat'];
    if (is_null($value)) {
      $value = 0.0;
    }
    if (is_string($value)) {
      if (preg_match('/^-?[0-9]+(\.[0-9]+)?$/', $value)) {
        $value = floatval($value);
      }
    }
    if (is_int($value)) {
      $value = floatval($value);
    }
    if (!is_float($value)) {
      self::error($data, 'key ' . 'ffloat' . ' is not a float');
    }

    $valid['ffloat'] = $value;

    if (!isset($data['fother'])) {
      $data['fother'] = null;
    }

    $value = $data['fother'];
    if (is_null($value)) {
      $value = '';
    }
    if (is_int($value) || is_float($value)) {
      $value = strval($value);
    }
    if (!is_string($value)) {
      self::error($data, 'key ' . 'fother' . ' is not a string');
    }

    $store['other'] = $value;

    $valid['fother'] = $value;

    if (!isset($data['fstringv'])) {
      $data['fstringv'] = null;
    }

    $value = $data['fstringv'];
    if (is_null($value)) {
      $value = '';
    }
    if (is_int($value) || is_float($value)) {
      $value = strval($value);
    }
    if (!is_string($value)) {
      self::error($data, 'key ' . 'fstringv' . ' is not a string');
    }

    if (Str::length($value) > 0 && !preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,6}$/', $value)) {
      self::error($data, 'key ' . 'fstringv' . ' breaks the email validation');
    }

    if (Str::length($value) > 0 && !preg_match('/^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/', $value)) {
      self::error($data, 'key ' . 'fstringv' . ' breaks the url validation');
    }

    if (!preg_match('/^[a-b]$/', $value)) {
      self::error($data, 'key ' . 'fstringv' . ' breaks the regexp validation');
    }

    if (Str::length($value) != 3) {
      self::error($data, 'key ' . 'fstringv' . ' breaks the length validation');
    }

    if (Str::length($value) > 0 && Str::length($value) < 4) {
      self::error($data, 'key ' . 'fstringv' . ' breaks the minlength validation');
    }

    if (Str::length($value) > 5) {
      self::error($data, 'key ' . 'fstringv' . ' breaks the maxlength validation');
    }

    if (!in_array($value, array('value1', 'value2', 'value3'), TRUE)) {
      self::error($data, 'key ' . 'fstringv' . ' breaks the in validation');
    }

    if (!in_array($value, array('before,after', 'before2,after2'), TRUE)) {
      self::error($data, 'key ' . 'fstringv' . ' breaks the in validation');
    }

    if (!in_array($value, Config::get('example'), TRUE)) {
      self::error($data, 'key ' . 'fstringv' . ' breaks the inarray validation');
    }

    if ($value !== $store['other']) {
      self::error($data, 'key ' . 'fstringv' . ' breaks the match validation');
    }

    $store['fsv'] = $value;

    if ($store['fsv'] == 'foo') {
      self::error($data, 'key ' . 'fstringv' . ' breaks the custom validation');
    }

    $valid['fstringv'] = $value;

    if (!isset($data['fintegerv'])) {
      $data['fintegerv'] = null;
    }

    $value = $data['fintegerv'];
    if (is_null($value)) {
      $value = 0;
    }
    if (is_string($value)) {
      if (ctype_digit($value)) {
        $value = intval($value);
      }
    }
    if (!is_int($value)) {
      self::error($data, 'key ' . 'fintegerv' . ' is not an integer');
    }

    if ($value < 3) {
      self::error($data, 'key ' . 'fintegerv' . ' breaks the minvalue validation');
    }

    if ($value > 7) {
      self::error($data, 'key ' . 'fintegerv' . ' breaks the maxvalue validation');
    }

    if ($value < 0) {
      self::error($data, 'key ' . 'fintegerv' . ' breaks the positive validation');
    }

    $store['fiv'] = $value;

    if ($store['fiv'] > 3) {
      self::error($data, 'key ' . 'fintegerv' . ' breaks the custom validation');
    }

    $valid['fintegerv'] = $value;

    if (!isset($data['fdatev'])) {
      $data['fdatev'] = null;
    }

    $value = $data['fdatev'];
    if (is_null($value)) {
      $value = '';
    }
    if (is_int($value) || is_float($value)) {
      $value = strval($value);
    }
    if (!is_string($value)) {
      self::error($data, 'key ' . 'fdatev' . ' is not a string');
    }

    $str = explode('-', $value);
    if (count($str) !== 3 || !checkdate($str[1], $str[2], $str[0])) {
      self::error($data, 'key ' . 'fdatev' . ' breaks the date validation');
    }
    $value = Carbon::createFromFormat('!Y-m-d', $value);

    if ($value->lt(new Carbon('today'))) {
      self::error($data, 'key ' . 'fdatev' . ' breaks the mindate validation');
    }

    if ($value->gt(new Carbon('tomorrow'))) {
      self::error($data, 'key ' . 'fdatev' . ' breaks the maxdate validation');
    }

    $valid['fdatev'] = $value;

    if (!isset($data['ffloatv'])) {
      $data['ffloatv'] = null;
    }

    $value = $data['ffloatv'];
    if (is_null($value)) {
      $value = 0.0;
    }
    if (is_string($value)) {
      if (preg_match('/^-?[0-9]+(\.[0-9]+)?$/', $value)) {
        $value = floatval($value);
      }
    }
    if (is_int($value)) {
      $value = floatval($value);
    }
    if (!is_float($value)) {
      self::error($data, 'key ' . 'ffloatv' . ' is not a float');
    }

    if ($value < 3) {
      self::error($data, 'key ' . 'ffloatv' . ' breaks the minvalue validation');
    }

    if ($value > 7) {
      self::error($data, 'key ' . 'ffloatv' . ' breaks the maxvalue validation');
    }

    $valid['ffloatv'] = $value;

    return $valid;
  }

}
