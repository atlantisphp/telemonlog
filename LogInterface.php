<?php

namespace AtlantisPHP\Telemonlog;

interface LogInterface
{
  /**
   * emergency
   *
   * @param string $message
   * @param array $array
   * @return void
   */
  public static function emergency(string $message, ?array $array);

  /**
   * alert
   *
   * @param string $message
   * @param array $array
   * @return void
   */
  public static function alert(string $message, ?array $array);

  /**
   * critical
   *
   * @param string $message
   * @param array $array
   * @return void
   */
  public static function critical(string $message, ?array $array);

  /**
   * error
   *
   * @param string $message
   * @param array $array
   * @return void
   */
  public static function error(string $message, ?array $array);

  /**
   * notice
   *
   * @param string $message
   * @param array $array
   * @return void
   */
  public static function notice(string $message, ?array $array);

  /**
   * info
   *
   * @param string $message
   * @param array $array
   * @return void
   */
  public static function info(string $message, ?array $array);

  /**
   * debug
   *
   * @param string $message
   * @param array $array
   * @return void
   */
  public static function debug(string $message, ?array $array);
}