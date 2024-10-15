<?php
if(!$input)
    return;
$out = explode('.', date('d.m.Y', strtotime($input)));
$monthses = array(
    'января','февраля','марта','апреля','мая','июня','июля','августа','сентября','октября','ноября','декабря'
);
return $out[0] . ' ' . $monthses[intval($out[1]) - 1] . ' ' . $out[2] . 'г.';
return;
