<?php

namespace RCT\ThreadViewers\Widget;

use XF\Widget\AbstractWidget;

class CurrentViewers extends AbstractWidget
{
    public function render()
    {
        if (!isset($this->contextParams['thread']))
        {
            return '';
        }

        $activities = \XF::finder('XF:SessionActivity')->fetch()->toArray();
        $users = [];
        foreach($activities as $activity)
        {
            if (isset($activity['params']))
            {
                if (isset($activity['params']['thread_id']) && $activity['params']['thread_id'] == $this->contextParams['thread']->thread_id)
                {
                    if ($activity['user_id'])
                    {
                        $users[] = $activity->User;
                    }
                }
            }
        }

        if (empty($users))
        {
            return '';
        }

        $viewParams = [
            'users' => $users
        ];

        return $this->renderer('rct_widget_thread_current_viewers', $viewParams);
    }
}