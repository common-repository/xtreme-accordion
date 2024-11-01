=== Xtreme Accordion ===
Contributors: Flashtuning 
Tags: free accordion, free flash, autoplay, effects, horizontal, panning, scroll, scroller, transition, vertical, xml, zoom
Requires at least: 2.9.0
Tested up to: 3.0.1
Stable tag: trunk

The most advanced XML Accordion Gallery application. No Flash Knowledge required to insert the Accordion SWF inside the HTML page(s) of your site.

== Description ==

XML Accordion Image Gallery / XML Accordion Photo Gallery & XML Accordion Slideshow & XML Accordion Banner Rotator.

**Features**

* No Flash Knowledge required to insert the Accordion SWF inside the HTML page(s) of your site
* Fully customizable XML driven content
* Unlimited number of images / swf support
* Customizable width, height and item size
* Resize or crop your items on-the-fly from within the XML file
* Easy to use XML file for images / titles / descriptions and links
* View gallery images by using the thumb menu and left / right end arrows
* AutoPlay / Previous / Next with global or individual timer for each image
* Time period adjustable from the XML file (in seconds)
* Both horizontal and vertical menu orientation support
* Advanced effects for the description text, image zoom and panning effects
* Global or individual timer and transition definition for each text paragraph
* HTML / CSS driven description text paragraphs support
* Set URL links within the description text or when pressing on individual images
* Display the items in the order they appear in your XML file or in a random order
* Scroll Bar component support for browsing through the accordion items
* Optional highlighting feature for the active / inactive items
* Define image borders size/color from within the XML configuration file
* Image titles, padding, mouse roll over or click support
* Optionally set the XML settings file path in HTML using FlashVars
    



== Installation ==

1. Download the plugin and upload it to the **/wp-content/plugins/** directory. Activate through the 'Plugins' menu in WordPress.
2. Download the [Free XtremeAccordion](http://www.flashtuning.net/flash-samples/XtremeAccordionFree.zip "Xtreme Accordion") and copy the content of the archive in **wp-content** folder. (e.g: "http://www.yoursite.com/wp-content/flashtuning/xtreme-accordion")
3. Insert the swf into post or page using this tag: `[xtreme-accordion]`. The default values for width and height are 600 420. If you want other values write the width and height attributes into the tag like so: `[xtreme-accordion width="yourvalue" height="yourvalue"]`
4. To configure the accordion general parameters use the demo-settings.xml. For individual accordion items use the demo-contents.xml file (image path, image link and more). Enter [Flashtuning.net](http://www.flashtuning.net "Flashtuning") and play with the settings of the [Xtreme Accordion](http://www.flashtuning.net/flash-xml-image-viewers-galleries/x-treme-accordion-xml-as3.html "Sample Xtreme Accordion") online demo.
5. If you want to use multiple instances of Xtreme Accordion on different pages. Follow this steps:
   a. There are 2 xml files in **wp-content/flashtuning/xtreme-accordion** folder: **demo-settings.xml**, used for general settings, and **demo-content.xml**, used for individual items.
   b. Modify the 2 xml files according to your needs and rename them (eg.: **demo-settings2.xml**, **demo-content2.xml**)
   c. Open the **demo-settings2.xml**, search for this tag `< object param="contentXML"	value="demo-content.xml" />` and change the attribute **value** to **demo-content2.xml** .
   d. Copy the 2 modified xml files to **wp-content/flashtuning/xtreme-accordion** .
   e. Use the **xml** attribute `[xtreme-accordion xml="demo-settings2.xml"]` when you insert the accordion on a page.
6. Optionally for custom pages use this php function: `xtremeAccordionEcho(width,height,xmlFile)` (e.g: **xtremeAccordionEcho(595,420,'carousel-settings.xml')** )

= Remove the Flashtuning.net logo =

If you don’t want to have the Flashtuning.net logo on the top left corner, you'll have to purchase the [commercial package](http://www.flashtuning.net/flash-xml-image-viewers-galleries/x-treme-accordion-xml-as3.html "FT Xtreme Accordion"). You'll also have access to the fla file. After downloading the commercial archive, overwrite the swf file from the `/wp-content/flashtuning/xtreme-accordion` directory.

== Screenshots ==

1. Fully customizable XML driven content (see the online demo at [Flashtuning.net](http://www.flashtuning.net/flash-xml-image-viewers-galleries/x-treme-accordion-xml-as3.html "Sample Xtreme Accordion") ). No Flash Knowledge required to insert the Accordion SWF inside the HTML page(s) of your site.

