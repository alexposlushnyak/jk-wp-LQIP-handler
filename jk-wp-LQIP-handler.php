<?php defined('ABSPATH') || exit;

/* include gaussholder */
include_once(__DIR__ . '/vendor/gaussholder/gaussholder.php');

final class JK_WP_LQIP_HANDLER
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
