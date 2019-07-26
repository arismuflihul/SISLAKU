<?php 
/**
 * Helpher untuk mencetak tanggal dalam format bahasa indonesia
 *
 * @package CodeIgniter
 * @category Helpers
 * @author Aris Muflihul Aini 
 * @link 
 * @version 0.1
 */
/**
 * 
 * @return string nama bulan dalam bahasa indonesia
 */

if (!function_exists('bulan_helper')) {
        function bulan() {
            $bulan = array(
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
        }
    }
?>

