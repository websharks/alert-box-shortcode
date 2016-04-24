=== Alert Box Shortcode ===

Stable tag: 160422
Requires at least: 4.2
Tested up to: 4.6-alpha

Contributors: WebSharks, JasWSInc, raamdev, renzms, KristineDS, sitegeek
Tags: alert, shortcode, warning, info, error

License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Provides an `[alert_box]` shortcode.

== Description ==
This plugin adds a new `[alert_box]` shortcode that allows you to easily display various alert boxes on your site.

The `[alert_box][/alert_box]` shortcode can be used without any options. By default, it will produce the red error style alert box. However, you can override the default style by including a `type=""` attribute to set the `warning` (yellow) or `info` (green) styles:

`[alert_box type="warning"]This is an example warning alert box. Set this style by adding the <code>type="warning"</code> attribute in the shortcode.[/alert_box]`

`[alert_box type="info"]This is an example info alert box. Set this style by adding the <code>type="info"</code> attribute in the shortcode.[/alert_box]`

== Installation ==

- Install the Alert Box Shortcode plugin
- Activate the "Alert Box Shortcode" plugin in **WordPress Dashboard → Plugins**

== Changelog ==

= v160422 =

- **Bug Fix**: Instead of echo the text on the function a variable is use to return the output, this is the correct way to do it, see more at the [`add_shortcode` documentation](https://codex.wordpress.org/Function_Reference/add_shortcode). Props @Reedyseth.
- **Enhancement**: Capture the style attribute to append it into the div tag, this will allow the addiong of more css properties if needed. On the demo you could see the two boxes that are separated by using this attribute. Props @Reedyseth.

= v160421 =

- **Bug Fix**: CSS `border-style` attribute did not exist, so the border was not visible around the alert box. Props @raamdev.
- **Bug Fix**: CSS `border-color` attribute was not being added to the CSS output, so the color was not being set. Props @raamdev.
- **Bug Fix**: Fixed a bug when using multiple alert boxes on the same page. Each subsequent box was using the styles from the first box instead of using their own styles (counter was not properly implemented). Props @raamdev.
- **Enhancement**: Added a new optional `type=\"\"` attribute that can be set to `error` (default), `warning`, or `info`, with preset styles for each (red, yellow, and green respectively). Props @raamdev.
- **Enhancement**: Refactored to use a class. Props @raamdev.
- **Enhancement**: Added documentation and usage examples. Props @raamdev.

= v160420 =

- Initial release. Props @jaswsinc.
