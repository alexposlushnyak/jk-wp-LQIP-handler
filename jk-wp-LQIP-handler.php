<?php defined('ABSPATH') || exit;

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

    public function get_image_sizes()
    {

        /**
         * Filter the sizes Gaussholder images will be generated for.
         *
         * This is a map of size name => blur radius.
         *
         * By default, Gaussholder won't generate any placeholders, and you need to
         * opt-in to using it. Simply filter here, and add the size names for what
         * you want generated.
         *
         * Be aware that for every size you add, a placeholder will be generated and
         * stored in the database. If you have a lot of sizes, this will be a _lot_
         * of data.
         *
         * The blur radius controls how much blur we use. The image is pre-scaled
         * down by this factor, and this is really the key to how the placeholders
         * work. Increasing radius decreases the required data quadratically: a
         * radius of 2 uses a quarter as much data as the full image; a radius of
         * 8 uses 1/64 the amount of data. (Due to compression, the final result
         * will _not_ follow this scaling.)
         *
         * Be careful tuning this, as decreasing the radius too much will cause a
         * huge amount of data in the body; increasing it will end up with not
         * enough data to be an effective placeholder.
         *
         * The radius needs to be tuned to each size individually. Ideally, you want
         * to keep it to about 200 bytes of data for the placeholder.
         *
         * (Also note: changing the radius requires regenerating the
         * placeholder data.)
         *
         * @param string[] $enabled Enabled sizes.
         */

        return apply_filters('gaussholder.image_sizes', array());

    }

}
