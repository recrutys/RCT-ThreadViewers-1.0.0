<?php

namespace RCT\ThreadViewers\Widget;

use XF\Widget\AbstractWidget;

class Viewers extends AbstractWidget
{
    public function render()
    {
        if (!isset($this->contextParams['thread']))
        {
            return '';
        }

        $views = \XF::finder('XF:ThreadRead')->where('thread_id', $this->contextParams['thread']->thread_id)->fetch(30);

        $viewParams = [
            'views' => $views
        ];

        return $this->renderer('rct_widget_thread_viewers', $viewParams);
    }

}