<?php
/**
 * @Author: codegeek
 * @Date:   2016-06-23 03:38:43
 * @Last Modified by:   codegeek
 * @Last Modified time: 2016-09-14 15:11:07
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

function getAppName()
{
	$appName = 'Sistem Informasi Pencatatan Laporan Polisi & Penyidikan';
	return $appName;
}

function getAppNameShort()
{
	$appNameShort = 'SIPELAPAN';
	return $appNameShort;
}

function getVersion()
{
	$version = '1.0';
	return $version;
}

function getTitle()
{
	$CI =& get_instance();
	$fetchClass = str_replace('_', ' ', $CI->router->fetch_class());
	$title = ucwords($fetchClass)." &mdash; ".getAppName();
	
	return $title;
}

function getFooter()
{
	$footer = '&copy; 2016. <a href="">'.getAppName().'</a> | POLDA SUMSEL';
	return $footer;
}

function getBreadcrumb($total_segment)
{
	$CI =& get_instance();
	$breadcrumb = '<ul class="breadcrumb">';
	$breadcrumb .= "\n\t".'<li><a href="'.base_url('dashboard').'"><i class="icon-home2 position-left"></i> Home</a></li>';

	for ($i=1; $i < $total_segment+1; $i++) { 
		if ($i == $total_segment) {
			$curent = '<li class="active">'.ucwords(str_replace('_', ' ', $CI->uri->segment($i))).'</li>';
		} else {
			$curent = '<li><a href="'.base_url($CI->uri->segment($i)).'">'.ucwords(str_replace('_', ' ', $CI->uri->segment($i))).'</a></li>';
		}
		
		$breadcrumb .= "\n\t".$curent;
	}

	$breadcrumb .= '</ul>';

	return $breadcrumb;
}

function getPageHeaderTitle()
{
	$CI =& get_instance();
	$pageHeaderTitle = '<span class="text-semibold">';

	if ($CI->router->fetch_class() == 'dashboard') 
	{
		$pageHeaderTitle .= 'Home';
		$pageHeaderTitle .= '</span>';
		$pageHeaderTitle .= ' - ';
		$pageHeaderTitle .= 'Dashboard';
	}
	else
	{
		$pageHeaderTitle .= ucwords(str_replace('_', ' ', $CI->router->fetch_class()));
		$pageHeaderTitle .= '</span>';
		$pageHeaderTitle .= ' - ';
		$pageHeaderTitle .= ucwords(str_replace('_', ' ', $CI->router->fetch_method()));
	}

	return $pageHeaderTitle;
}

function seo_url($text)
{
	#convert jadi huruf kecil semua
	$text = strtolower($text);

	#ganti karakter simbol atau digit
	$text = preg_replace('~[^\pL\d]+~u', '-', $text);

	#charcode translate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	#hapus karakter yang tidak seo
	$text = preg_replace('~[^-\w]+~', '', $text);

	#join text yang sudah di replace satu persatu (trim)
	$text = trim($text, '-');

	#hapus duplikat -
	$text = preg_replace('~-+~', '-', $text);

	#return n-a jika $text kosong
	if (empty($text)) {
		return 'n-a';
	}

	return $text;
}

function tanggalIndo($date) {
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", 
    	"November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);

    $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
    return($result);
}

function bulanIndo($bulan) {
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", 
        "November", "Desember");

    echo strtoupper($BulanIndo[(int) $bulan - 1]);
}

function tglSql($tgl)
{
	$datePicker = explode('/', $tgl);

	return $datePicker[2].'-'.$datePicker[0].'-'.$datePicker[1];
}

function getStatus($status)
{
	if ($status == 'Y') 
	{
		$stat = '<span class="badge badge-success">Aktif</span>';
	} 
	else 
	{
		$stat = '<span class="badge badge-danger">Non Aktif</span>';
	}

	return $stat;
}

function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) : 'just now';
}

function selisih_waktu($waktu_1, $waktu_2)
{
	$waktu_1 = new DateTime($waktu_1);
	$waktu_2 = new DateTime($waktu_2);

	$selisih = $waktu_1->diff($waktu_2);
	$format_selisih = $selisih->format('%a');

	if ($format_selisih > 0)
	{
		return 'class = "danger"';
	}
	else
	{
		return '';
	}
}