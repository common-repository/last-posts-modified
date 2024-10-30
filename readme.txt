=== Last Modified Posts ===
Contributors: Free Tools
Donate link: 
Tags: post, modified, updated
Requires at least: 4.0
Tested up to: 5.7
Stable tag: 3.6
Requires PHP: 5.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Add a widget to display the list of the last modified/updated posts.

== Description ==

LMP allows you to add in your sidebar a widget that will display the last modified articles in descending order of modification date.

Settings to customize:

* Allow you to set title widget
* Display Number of items
* Display modified date
* Display thumbnails

If no thumbnail was found for the article, LMP will add a generic image.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the plugin files to the '/wp-content/plugins/Last-Modified-Posts' directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the Apparence->Widget to configure the plugin


== Frequently Asked Questions ==

= No image/thumbnail options? =
Your theme needs to support Post Thumbnail, please go to https://codex.wordpress.org/Post_Thumbnails to read more info and how to activate it in your theme.
By default,  LMP display generic thumbnail.

= Thumbnail Size =
By default LMP have 100×100 size. 

= How to change default Thumbnail =
Upload your default image in /wp-content/plugins/Last-Modified-Posts/assets/image. Only PNG file. Size : 100*100.

= How to add custom style? =
The plugin comes with a very basic style, if you want to add custom style please do wp_dequeue_style to remove the default stylesheet. Place the code below in your theme functions.php.

Then you can add your custom style using Custom CSS plugin or in your theme style.css. Here’s the plugin selector
.LPM_Widget 
.LPM_Widget .LPM_post-modified 
.flotte 
.textleft
.lightinfo 

= How to widget white backgound color? =
In your backend wordpress, clic on "Apparence". Click on "Additional CSS". Add
.LPM_Widget {background-color:#fff;} 
Click on publish.

== Screenshots ==

1. Widget setup option
2. LMP in action

== Changelog ==

= 3.5 =
* Code rewrite
* Add add internationalization file
* readme.txt update

= 3.1 =
* readme.txt update

= 3.0 =
* Code rewrite
* Add the option "see thumbnail"

= 2.0 =
* Add the option "see modification date"
* Minor bug fix

== Upgrade Notice ==

Uninstall old versions and install version 3
