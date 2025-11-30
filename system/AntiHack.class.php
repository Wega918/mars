<?php

class AntiHack {

    private $getarr = ''; // Ключ для распознавания массива
    private $input = array(); // Массив для фильтрации
    private $arraykey = 256; // Максимальное количество символов в ключе массива
    private $arrayvalue = 100000; // Максимальное количество символов в значении массива
    private $arrayserverkey = 'COMSPEC;SYSTEMROOT;PATHEXT;UNIQUE_ID;PATH;GATEWAY_INTERFACE;SERVER_SIGNATURE;SERVER_ADMIN;PERL5LIB';

    public function __construct()
    {
        $this->filter_($this->input, $this->getarr);
    }

    private function __cleaning($input, $keyss, $getarr)
    {
        if (!empty($input) && $keyss === 'value' && $getarr !== 'post') {
            $input = urldecode($input);
        }

        $charset = mb_detect_encoding($input, mb_detect_order(), true);
        $input = $charset !== 'UTF-8' ? iconv($charset ?: 'WINDOWS-1251', 'UTF-8//IGNORE', $input) : $input;

        if ($keyss === 'key') {
            $input = preg_replace('#[^a-z0-9-_]+#i', '', $input);
            $input = strip_tags($input);
        } elseif ($keyss === 'value') {
            switch ($getarr) {
                case 'get':
                    $input = preg_replace('#[^a-z0-9-_\(\)\&\=\?\;\:\.\/\[\]\s]+#is', '', $input);
                    $input = str_replace('../', '', $input);
                    break;

                case 'post':
                    $input = $this->sanitizePostValue($input);
                    break;

                case 'files':
                    $input = is_string($input) ? preg_replace('#[^a-zа-я0-9-_\(\)\&\=\?\;\:\.\/\s]+#is', '', $input) : intval($input);
                    break;

                case 'cookie':
                    $input = preg_replace('#[^a-z0-9-_]+#i', '', $input);
                    break;

                case 'server':
                    $input = str_replace('\\', '/', $input);
                    $input = preg_replace('#[^a-z0-9-_\/\.\s\:\;\,\?\=\@]+#i', '', $input);
                    break;

                case 'request':
                    $input = is_string($input) ? htmlentities($input, ENT_QUOTES, 'UTF-8') : intval($input);
                    break;

                default:
                    $input = htmlentities(strip_tags($input), ENT_QUOTES, 'UTF-8');
            }
        }

        return $input;
    }

    private function sanitizePostValue($input)
    {
        $input = str_replace("‮", '', $input); // Удаление специальных символов Unicode (обратное направление текста)
        $input = str_ireplace(['javascript', 'data', 'base64'], ['jаvаsсriрt', 'dаtа', 'bаsе64'], $input);
        $input = htmlentities($input, ENT_QUOTES, 'UTF-8'); // Экранирование HTML-символов
        $input = addslashes($input); // Добавление экранирования для специальных символов
        return $input;
    }

    private function __sorting($input, $getarr)
    {
        if (!is_array($input)) {
            return null;
        }

        $arr_delete = explode(';', $this->arrayserverkey);
        $result = [];

        foreach ($input as $key => $value) {
            if ($getarr === 'server') {
                $key = strtoupper($key);
                if (in_array($key, $arr_delete, true)) {
                    continue;
                }
            }

            if (!$key || $value === null || strlen($key) > $this->arraykey || ($getarr === 'files' && !is_uploaded_file($value['tmp_name']))) {
                continue;
            }

            if (!is_array($value)) {
                if (strlen($value) > $this->arrayvalue) {
                    continue;
                }
                $result[$this->__cleaning($key, 'key', $getarr)] = $this->__cleaning($value, 'value', $getarr);
            } else {
                foreach ($value as $item => $field) {
                    if ($field === '' || strlen($item) > $this->arraykey || strlen($field) > $this->arrayvalue) {
                        continue;
                    }
                    $value[$this->__cleaning($item, 'key', $getarr)] = $this->__cleaning($field, 'value', $getarr);
                }
                $result[$this->__cleaning($key, 'key', $getarr)] = $value;
            }
        }

        return $result ?: null;
    }

    public function filter_($input, $getarr)
    {
        if (empty($input)) {
            return null;
        }

        $getarr = strtolower(trim($getarr));
        return $this->__sorting($input, $getarr);
    }
}
?>
