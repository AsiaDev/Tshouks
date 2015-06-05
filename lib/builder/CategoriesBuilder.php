<?php

class CategoriesBuilder extends Builder
{
    public function __construct()
    {
        $this->addProperty('links');
    }

    public function build()
    {
    	$result = '<div id="categoryColumn">';
    	$result .= '<h3>Kategorien</h3>';
        $result .= 	'<div class="categories contentBox">';
        $linkBuilder = new LinkListBuilder();
        
        require_once('./model/CategoryModel.php');
        $catModel = new CategoryModel();
        $links = $catModel->getAllCategory();
        $linkBuilder->links($links);
        $result .= $linkBuilder->build();
        $result .= '</div></div>';

        return $result;
    }
}
