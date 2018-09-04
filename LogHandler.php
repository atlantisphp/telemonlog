<?php

namespace AtlantisPHP\Telemonlog;

use Closure;

class LogHandler
{
  /**
   * $DS
   *
   * @var string
   */
  private $DS = DIRECTORY_SEPARATOR;

  /**
   * $disk
   *
   * @var string
   */
  public static $disk;

  /**
   * $name
   *
   * @var string
   */
  public static $name;

  /**
   * $log
   *
   * @var string
   */
  public static $log;

  /**
   * $env
   *
   * @var string
   */
  public static $env;

  /**
   * $event
   *
   * @var callback
   */
  public static $event;

  /**
   * Assign event callback
   *
   * @param Closure $callback
   * @return void
   */
  public static function event(Closure $callback) : void
  {
    self::$event = $callback;
  }

  /**
   * handle log
   *
   * @param string $level
   * @param string $message
   * @param mixed array
   * @return void
   */
  public static function handle(string $level, string $message, array $array = []) : void
  {
    $log = LogHandler::$disk . (new LogHandler)
                                  ->log(LogHandler::$name, LogHandler::$log);

    $date = date("Y-m-d").' '.date("G:i:s");
    $env  = LogHandler::$env;

    $data = $message . ($array == [] ? '' : ' ' . json_encode($array, true));

    (new LogHandler)->isDisk();

    file_put_contents($log, '['.$date.'] ' . $env . '.' . strtoupper($level).' ' . $data . PHP_EOL, FILE_APPEND);

    if (is_callable(self::$event)) {
      call_user_func_array(self::$event, [$env, $level, $message, $array]);
    }
  }

  /**
   * Check if folder exists or not.
   *
   * @return void
   */
  public function isDisk() : void
  {
    $path = $this->cleanPath(LogHandler::$disk);
    if (!is_dir($path)) mkdir($path, 0777, true);
  }

  /**
   * Clean path
   *
   * @param  string $path
   * @return string $path
   */
  private function cleanPath($path) : string
  {
    $path = preg_replace('#' . $this->DS . '+#', $this->DS, $path);

    return $path;
  }

  /**
   * Return log name
   *
   * @param mixed $name
   * @param mixed $log
   * @return void
   */
  public function log($name, $log) : string
  {
    if ($log == 'daily') {
      $name = $name . '-' . date('Y-m-d');
    } else if ($log == 'monthly') {
      $name = $name . '-' . date('Y-m');
    }

    return $name . '.log';
  }
}