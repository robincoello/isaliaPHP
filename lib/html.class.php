<?php
  class Html
  {
    public static function link($text, $to, $attributes) {
      return "<a href='" . PUBLIC_PATH . "$to' $attributes>$text</a>";
    }
  }
