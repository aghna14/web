=== Cool Tag Cloud ===
Contributors: WPKube
Tags: tag cloud, cloud, tag, tags, widget, sidebar, tag-cloud, responsive, tagcloud, tagging, admin, image, images, seo, colored, plugin, media, color, links, picture, category, tag widget, cumulus
Requires at least: 3.3
Tested up to: 5.2
Stable tag: trunk

A simple, yet very beautiful tag cloud.

== Description ==

The plugin renders a tag cloud using a professionally designed tag image as a background.

The plugin's tag cloud is completely responsive and is correctly rendered in all browsers.

The main usage is with the "Cool Tag Cloud" widget but you can also use the shortcode [cool_tag_cloud].

Here's the list of all available parameters for the shortcode:

- style="default|silver|green|red|blue|brown|purple|cyan|lime|black"
- font_family="Arial, Helvetica, sans-serif"
- smallest="10"
- largest="10"
- align="left|right"
- font_weight="normal|bold"
- text_transform="none|uppercase|lowercase|capitalize"
- number="20"
- order_by="name|count"
- order="ASC|DESC|RAND"
- taxonomy="post_tag"
- tooltip="yes|no"
- nofollow="yes|no"
- animation="yes|no"
- on_single_display="global|local"
- exclude="1,2,3"
- include="1,2,3"

If you liked my plugin, please <strong>rate</strong> it.

Special thanks to [Orman Clark](http://www.premiumpixels.com/freebies/tagtastic-tag-cloud-psd/) for the tag image and to [Dimox](http://dimox.name/beautiful-tags-markup/) for the CSS code.

This plugin is maintained by [WPKube](https://www.wpkube.com), a WordPress resource site where you can find helpful guides like how to [choose the right list building plugin](https://www.wpkube.com/list-building-wordpress-plugins/), [how to install WordPress](https://www.wpkube.com/install-wordpress), [choose the best WordPress hosting](https://www.wpkube.com/best-wordpress-hosting/), and more. </p>

They also have a huge collection of [exclusive deals](https://www.wpkube.com/coupons/) on various plugins and hosting services such as [WPEngine](https://www.wpkube.com/coupons/wpengine-coupon/), [SiteGround](https://www.wpkube.com/coupons/siteground-coupon/), etc.

== Installation ==

1. Upload <strong>cool-tag-cloud</strong> folder to the <strong>/wp-content/plugins/</strong> directory.
2. Activate the plugin through the <strong>Plugins</strong> menu in WordPress.
3. Add the plugin's widget on the <strong>Appearance\Widgets</strong> page.
4. That's all.


== Frequently Asked Questions ==

= Why is the font size limited to 17px? =

Because when a larger font size is set, the tag text does not fit into the tag image.

= Does the plugin support localization? =

Yes, please use [translate.wordpress.org](https://translate.wordpress.org/projects/wp-plugins/cool-tag-cloud).

== Screenshots ==

1. Configuring the plugin's widget.
2. Font-family: Arial, Font weight: Bold, Font size: 11px to 16px, Image style: Default.
3. Font-family: Rockwell, Font weight: Bold, Font size: 12px (smallest and largest), Image align: Right, Image style: Black.
4. Font-family: "Open Sans", Font weight: Bold, Font size: 14px (smallest and largest), Image style: Blue.
5. Font-family: Arial, Font weight: Normal, Font size: 11px  (smallest and largest), Image style: Red, Dark Theme.
6. Font-family: Rockwell, Font weight: Bold, Font size: 10px (smallest and largest), Text transform: Uppercase, Image style: Brown.
7. Font-family: "Open Sans", Font weight: Bold, Font size: 11px to 17px, Image style: Green.

== Changelog ==
= 2.18 ( October 21st, 2019 ) =
* Fix "Warning: Illegal offset type in isset or empty..." when title not supplied 

= 2.17 ( October 4th, 2019 ) =
* Option to limit the amount of shown tags and have a "view more" button to expand for full list

= 2.16 ( September 2nd, 2019 ) =
* Option to show children terms of a specified parent term

= 2.15 ( August 9th, 2019 ) =
* Option to include multiple taxonomies

= 2.14 ( July 24th, 2019 ) =
* The class "ctc-active" will be added to the tags and categories that are connected to the currently shown post

= 2.13 ( April 12th, 2019 ) =
* The local "on single post display" option now works for custom post types

= 2.12 =
* Added options to include/exclude specific tags by ID

= 2.11 =
* Added option to show post count for tags

= 2.10 =
* Added [cool_tag_cloud] shortcode

= 2.09 =
* PHP7 compatibility fixes

= 2.08 =
* the option to show tags of the shown post now works for pages as well

= 2.07 = 
* option to set the widget to show the tags of the shown post ( on single post )

= 2.06 = 
* minor tweaks

= 2.05 =
* removed widget_tag_cloud_args filter 

= 2.04 =
* added compressed png images

= 2.03 =
* removed the bundled languages in favour of language packs from translate.wordpress.org

= 2.02 =
* added Chinese (Taiwan) translation (thanks to 陳泰澄)

= 2.01 =
* added French translation (thanks to [Wolforg](http://www.wptrads.com/))

= 2.00 =
* added 10 different color styles
* added "Animation on hover" option

= 1.01 =
* added "Image align" option
* css fixes

= 1.00 =
* first version
