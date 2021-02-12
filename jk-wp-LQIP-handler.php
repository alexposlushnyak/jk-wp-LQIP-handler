<?php defined('ABSPATH') || exit;

$path = __DIR__;

/* include gaussholder */
include_once(__DIR__ . '/vendor/gaussholder/gaussholder.php');

class jk_wp_lqip_handler
{

    public $lqip_sizes;

    public function set_sizes($sizes)
    {

        $this->lqip_sizes = $sizes;

    }

    public function init()
    {

        add_filter('gaussholder.image_sizes', function ($sizes) {

            $sizes = $this->lqip_sizes;

            return $sizes;

        });

    }

}
