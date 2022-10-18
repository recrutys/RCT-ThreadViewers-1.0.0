<?php

namespace RCT\ThreadViewers\XF\Pub\Controller;

use XF\App;
use XF\Http\Request;

class Thread extends XFCP_Thread
{
    public function actionRctViewers(\XF\Mvc\ParameterBag $params)
    {
        $thread = $this->assertViewableThread($params->thread_id);
        $views = \XF::finder('XF:ThreadRead')->where('thread_id', $thread->thread_id)->fetch();

        $viewParams = [
            'views' => $views
        ];

        return $this->view('RCT\ThreadViewers:Thread\Viewers', 'rct_thread_viewers_list', $viewParams);
    }

}