<?php

namespace AtlantisPHP\Telemonlog;

use AtlantisPHP\Telemonlog\LogHandler;
use AtlantisPHP\Telemonlog\LogInterface;

class Output extends LogHandler implements LogInterface
{
  /**
   * emergency
   *
   * @param string $message
   * @param array $array
   * @return void
   */
  public static function emergency(string $message, ?array $array = []) : void
  {
    self::handle('emergency', $message, $array);
  }

  /**
   * alert
   *
   * @param string $message
   * @param array $array
   * @return void
   */
  public static function alert(string $message, ?array $array = []) : void
  {
    self::handle('alert', $message, $array);
  }

  /**
   * critical
   *
   * @param string $message
   * @param array $array
   * @return void
   */
  public static function critical(string $message, ?array $array = []) : void
  {
    self::handle('critical', $message, $array);
  }

  /**
   * error
   *
   * @param string $message
   * @param array $array
   * @return void
   */
  public static function error(string $message, ?array $array = []) : void
  {
    self::handle('error', $message, $array);
  }

  /**
   * notice
   *
   * @param string $message
   * @param array $array
   * @return void
   */
  public static function notice(string $message, ?array $array = []) : void
  {
    self::handle('notice', $message, $array);
  }

  /**
   * info
   *
   * @param string $message
   * @param array $array
   * @return void
   */
  public static function info(string $message, ?array $array = []) : void
  {
    self::handle('info', $message, $array);
  }

  /**
   * debug
   *
   * @param string $message
   * @param array $array
   * @return void
   */
  public static function debug(string $message, ?array $array = []) : void
  {
    self::handle('debug', $message, $array);
  }
}