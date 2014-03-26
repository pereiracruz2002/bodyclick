<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

      $banners_orange = array("armarios-de-aco",
                              "roupeiros-de-aco");
      $banners_red    = array("cadeiras-para-escritorio",
                              "arquivos-de-aco");
      shuffle($banners_red);
      shuffle($banners_orange);
      include_once("sidebar-origem.php");
?>