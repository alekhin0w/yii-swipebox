Swipebox
================================

A touchable Yii Widget lightbox.

[Original project page](http://brutaldesign.github.com/swipebox)

##What is Yii-Swipebox ?

Yii-Swipebox is a jQuery "lightbox" widget for yii, supporting desktop, mobile and tablet.

##Features from original Swipebox

- Tested and working smoothly with Yii 1.1.13
- Swipe gestures for mobile
- Keyboard Navigation for desktop
- CSS transitions with jQuery fallback
- Retina support for UI icons
- Easy CSS customization

###Compatibility

Chrome, Safari, Firefox, Opera, IE8+, IOS4+, Android, windows phone.

##Usage

###Install

Copy Yii-Swipebox inside protected/widgets.

In your view, call your widget:
`
// this could be inside a yii view file
$this->widget('application.widgets.SwipeboxWidget.SwipeboxWidget', 
	array(
		'images' => $images, 
		'hideBarsDelay' => 0, 
		'useCss' => true
	)
); 
`
Where images must be an array of arrays containing the url of the image, and the caption of it.
`
array(
	array(
		'url' 	=> 'http://theurl.com/images/myimage.png',
		'name' 	=> 'my caption',
	),
	[...] // and so on...
);

###And the last step!

There is no last step.
You can go flawlessly from here!

