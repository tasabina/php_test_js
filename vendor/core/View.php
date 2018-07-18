<?php

class View
{

    public function render($content_view, $template_view, $data = null)
    {
        include APP.'/views/'.$template_view;
    }

}