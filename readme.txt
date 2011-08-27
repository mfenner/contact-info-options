=== Contact Info Options ===
Plugin URI: http://wordpress.org/extend/plugins/contact-info-options/
Contributors: mfenner
Donate link: None
Tags: profile, field, username, user, aim, jabber, twitter, facebook, delicious, citeulike, mendeley, orcid, science, research, res-comms
Requires at least: 2.9
Tested up to: 3.0.5
Stable tag: 1.0.2

Add additional contact info fields to the user profile page and/or disable the instant messager fields.

== Description ==

Contact Info Options is a simple WordPress plugin that modifies the contact info fields in the user profile. The plugin gives you the option to disable unused instant messager fields (AIM, Yahoo IM and Jabber/Google Talk) and/or to add additional fields, currently social networking (Twitter and Facebook), social bookmarking (Delicious, CiteULike and Mendeley), author identifiers (ORCID) and other info (affiliation).


== Installation ==

Installation Instructions:

1. Download the plugin and unzip it.
2. Put the contact-info-options folder into the <code>wp-content/plugins/</code> directory.
3. Go to the Plugins page in your WordPress Administration area and click 'Activate' next to Contact Info Options.
4. Go to <code>Users/Contact Info Options/</code> to enable the contact info you want to use in the user profile. 
5. Go to your Profile page. At the bottom of the Contact Info section are the new input fields.
6. If you want to add the function to your theme file(s) then use <code>&lt;?php the_author_meta('delicious'); ?&gt;</code> if it's INSIDE the loop or use <code>&lt;?php the_author_meta('delicious', 1); ?&gt;</code> if it's OUTSIDE the loop. 1 is the user ID. Use one of <code>twitter</code>, <code>facebook</code>, <code>delicious</code>, <code>citeulike</code>, <code>mendeley</code>, <code>orcid</code> or <code>affiliation</code>.


== Frequently Asked Questions ==

= It don't work - What should I do? =

First of all, make sure that the plugin is activated.


== Screenshots ==

1. The Profile page
2. The Contact Info Options page

 
== Changelog ==

= 1.0.1 =
* Updated readme.txt

= 1.0 =
* Initial Release


== Upgrade Notice ==

= 1.0.1 =
* Updated readme.txt

= 1.0 =
* Initial Release