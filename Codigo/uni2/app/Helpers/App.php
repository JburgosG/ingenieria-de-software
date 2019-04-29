<?php

/*
 * @author      Jairo Burgos Guarin
 * @package 	Laravel 5.4
 * @subpackage 	Functions App General
 * @date 	    28/04/2018
 */

function _notification($state, $msg, $item) {
    \Session::flash($state, __('messages.' . $msg, ['item' => $item]));
}

function _user() {
    return \Auth::user();
}

function _age($birthdate) {
    $birthdate = new DateTime($birthdate);
    $today = new DateTime();
    $age = $today->diff($birthdate);
    return $age->y;
}

function _important() {
    $events = new \App\Events();
    $important = $events->where('important', 'on')
                    ->orderBy('date', 'desc')->first();

    return $important;
}

function slug($string) {
    $characters = array(
        "Á" => "A", "Ç" => "c", "É" => "e", "Í" => "i", "Ñ" => "n", "Ó" => "o", "Ú" => "u",
        "á" => "a", "ç" => "c", "é" => "e", "í" => "i", "ñ" => "n", "ó" => "o", "ú" => "u",
        "à" => "a", "è" => "e", "ì" => "i", "ò" => "o", "ù" => "u"
    );

    $string = strtr($string, $characters);
    $string = strtolower(trim($string));
    $string = preg_replace("/[^a-z0-9-]/", "-", $string);
    $string = preg_replace("/-+/", "-", $string);

    if (substr($string, strlen($string) - 1, strlen($string)) === "-") {
        $string = substr($string, 0, strlen($string) - 1);
    }

    return $string;
}

function _iconFile($type) {
    switch ($type) {
        default: return 'file';
        case 'pdf': return 'file-pdf-o';
        case 'txt': return 'file-text-o';
        case 'doc': return 'file-word-o';
        case 'mp4': return 'file-movie-o';
        case 'xls': return 'file-excel-o';
        case 'mp3': return 'file-sound-o';
        case 'docx': return 'file-word-o';
        case 'xlsx': return 'file-excel-o';
        case 'png': return 'file-picture-o';
        case 'jpg': return 'file-picture-o';
        case 'zip': return 'file-archive-o';
        case 'rar': return 'file-archive-o';
        case 'gif': return 'file-picture-o';
        case 'jpeg': return 'file-picture-o';
        case 'ppt': return 'file-powerpoint-o';
        case 'pptx': return 'file-powerpoint-o';
    }
}

function _hourSubject($id) {
    $days = [];
    $where = ['subject_id' => $id];
    $sche = \App\Schedule_Subject::where($where)->orderBy('day_id')->get();    
    if (!empty($sche)) {
        foreach ($sche as $row) {
            $end = date_create($row->end_time);
            $start = date_create($row->start_time);
            $days[] = [
                'day' => $row->day->name,
                'end' => date_format($end, 'h:i A'),
                'start' => date_format($start, 'h:i A')
            ];
        }
    }
    return $days;
}

function getGroupS() {
    $group = \Auth::user()->group->id;
    switch ($group) {
        case 2:
            return _user()->subjects;
        case 3:
            return _user()->subjects_teacher;
    }
}

function _getRow($row) {
    if (!empty($row->subject)) {
        return $row->subject;
    }
    return $row;
}
