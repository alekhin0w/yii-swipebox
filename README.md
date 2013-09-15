Yii-Swipebox 1.1.2
================================

A touchable Yii Widget lightbox.

[Original project page](http://brutaldesign.github.com/swipebox)

##What is Yii-Swipebox ?

Yii-Swipebox is a jQuery "lightbox" widget for yii, supporting desktop, mobile and tablet.

##Backwards compatibility with 1.0

- The backwards compatibility is broken for the older version of Yii-Swipebox. You can grab the old version in 1.0 branch.
- The versions will be held within the original project version numbers. This version supports swipebox 1.1.2.
- If you want to upgrade, you only need to call the widget changing the array key 'images' to 'medias'. All new settings have defaults, so doesn't matter if you not add them.

##Features supported from original Swipebox

- Tested and working smoothly with Yii 1.1.14
- Swipe gestures for mobile
- Keyboard Navigation for desktop
- CSS transitions with jQuery fallback
- Retina support for UI icons
- Easy CSS customization
- Youtube support
- beforeOpen and afterClose callbacks for fancy javascript forgery <3

###Compatibility

Chrome, Safari, Firefox, Opera, IE8+, IOS4+, Android, windows phone.

##Usage

###Install

Copy Yii-Swipebox inside protected/widgets.

In your view, call your widget:

```php
// this could be inside a yii view file
$this->widget('application.widgets.SwipeboxWidget.SwipeboxWidget', 
	array(
		'medias' => $medias, 
		'hideBarsDelay' => 0, 
		'useCss' => true,
		'videoMaxWidth' => 1024,
		'beforeOpen' => 'function(){ alert("This is a javascript function called before opening Yii-Swipebox!"); }',
		'afterClose' => 'function(){ alert("This is a javascript function called after closing Yii-Swipebox!");  }'
	)
); 
```
Medias must be an array of arrays containing the url of the image or youtube video, and the caption of it.
```php
array(
	array(
		'url' 	=> 'http://theurl.com/medias/myimage.png',
		'name' 	=> 'My Image Caption',
	),
	array(
		'url' 	=> 'http://www.youtube.com/watch?v=drMgRxhfSrA',
		'name' 	=> 'My Awesome Youtube Video',
	),
	[...] // and so on...
);
```
###And the last step!

There is no last step.
You can go flawlessly from here!

