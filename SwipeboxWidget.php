<?php
/**
 * SwipeboxWidget for yii
 *
 * This widget is a wrapper of the Swipebox gallery plugin 
 * http://brutaldesign.github.io/swipebox/
 *
 * @version 1.2.1 (same as swipebox version)
 * @author alekhin0w
 */
class SwipeboxWidget extends CWidget {

    /**
     * medias must be an array of arrays containing the url of the image or youtube video, and the caption of it.
     * array(
     *         array(
     *                 'url'   => 'http://theurl.com/medias/myimage.png',
     *                 'name'  => 'my caption',
     *         ),
     *         [...] // and so on...
     * );
     * 
     * @var array
     */
    public $medias = array();
    /**
     * False will force the use of jQuery for animations
     * @var boolean
     */
    public $useCss = true; 
    /**
     * 0 to always show caption and action bar
     * @var integer
     */
    public $hideBarsDelay = 3000;
    /**
     * Maximum width for displaying videos
     * @var integer
     */
    public $videoMaxWidth = 1140;
    /**
     * Javascript function called before opening swipebox
     * @var integer
     */
    public $beforeOpen = "function(){}";
    /**
     * Javascript function called after closing swipebox
     * @var integer
     */
    public $afterClose = "function(){}";

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

        // we'll forge the youtube links to display youtube thumbs
        foreach($this->medias as $i => $media)
        {
            if(strpos($media['url'], 'youtube') !== false)
            {
                $this->medias[$i]['thumb'] = $this->forgeYoutubeThumbFromUrl($media['url']);
            }
        }
    }
    
    public function run()
    {
        $this->render('swipebox', array('medias' => $this->medias));
    }
    
    private function publishScripts()
    {
        $script = 'jQuery(function($) {
            $(".swipebox").swipebox({
        		useCSS:'.$this->useCss.',
        		hideBarsDelay:'.$this->hideBarsDelay.',
                videoMaxWidth: '.$this->videoMaxWidth.',
                beforeOpen: '.$this->beforeOpen.',
                afterClose: '.$this->afterClose.'
            	})
            });';
        Yii::app()->clientScript->registerScript('registerswipebox', $script, CClientScript::POS_READY); 
    }

    /**
     * get youtube video ID from URL
     *
     * @param string $url
     * @return string Youtube video id or FALSE if none found. 
     */
    function forgeYoutubeThumbFromUrl($url) {
        $pattern = 
            '%^# Match any youtube URL
            (?:https?://)?  # Optional scheme. Either http or https
            (?:www\.)?      # Optional www subdomain
            (?:             # Group host alternatives
              youtu\.be/    # Either youtu.be,
            | youtube\.com  # or youtube.com
              (?:           # Group path alternatives
                /embed/     # Either /embed/
              | /v/         # or /v/
              | /watch\?v=  # or /watch\?v=
              )             # End path alternatives.
            )               # End host alternatives.
            ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
            $%x'
            ;
        $result = preg_match($pattern, $url, $matches);
        if ($result !== false && isset($matches[1])) {
            
            return "http://img.youtube.com/vi/{$matches[1]}/1.jpg";
        }
        throw new CHttpException(500, 'Cannot extract youtube url');
    }    
    
}
