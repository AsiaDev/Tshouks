<?php

class LinkListBuilder extends Builder
{
    public function __construct()
    {
        $this->addProperty('links');
    }

    public function build()
    {
        $result  = 	'<ul class="form-group">';
         
        foreach ($this->links as $href) {
        	$result .= "<li><a href=\"Category/index/{$href[0]}\">{$href[0]}</a></li>";
        }
        $result .= '    </ul>';

        return $result;
    }
}
