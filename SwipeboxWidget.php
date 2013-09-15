<?php
/**
 * SwipeboxWidget for yii
 *
 * This widget is a wrapper of the Swipebox gallery plugin 
 * http://brutaldesign.github.io/swipebox/
 *
 * @version 1.0
 * @author alekhin0w
 */
class SwipeboxWidget extends CWidget {

    /**
     * Images must be an array of arrays containing the url of the image, and the caption of it.
     * array(
     *         array(
     *                 'url'   => 'http://theurl.com/images/myimage.png',
     *                 'name'  => 'my caption',
     *         ),
     *         [...] // and so on...
     * );
     * 
     * @var array
     */
    public $images = array();
    /**
     * False will force the use of jQuery for animations
     * @var boolean
     */
    public $useCss = true; 
    /**
     * 0 to always show caption and action bar` 
     * @var integer
     */
    public $hideBarsDelay = 3000;
    
    protected $assetsUrl = null;
    
    public function init()
    {
        if($this->useCss === true || $this->useCss !== 'false')
        {
            $this->useCss = 'true';
        } else {
            $this->useCss = 'false';
        }
        $assetsPath = Yii::getPathOfAlias('application.widgets.SwipeboxWidget.assets');
        $this->assetsUrl = Yii::app()->assetManager->publish($assetsPath, true, -1, true);
        
        $this->publishScripts();        
    }
    
    public function run()
    {
        $this->render('swipebox', array('images' => $this->images));
    }
    
    private function publishScripts()
    {
        $script = 'jQuery(function($) {
            $(".swipebox").swipebox({
		useCSS:'.$this->useCss.',
		hideBarsDelay:'.$this->hideBarsDelay.'
	})});';
        Yii::app()->clientScript->registerScript('registerswipebox', $script, CClientScript::POS_READY); 
    }
    
}
