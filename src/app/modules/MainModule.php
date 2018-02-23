<?php
namespace app\modules;

use std, gui, framework, app;


class MainModule extends AbstractModule
{

    /**
     * @event timer.action 
     */
    function doTimerAction(ScriptEvent $e = null)
    {    
        $hours = $this->hours->text;
        $minute = $this->minute->text;
        $second = $this->second->text;
        $msh = $this->msh->text = $hours * 3600000;
        $msm = $this->msm->text = $minute * 60000;
        $mss = $this->mss->text = $second * 1000;
        $this->ms->text = $msh + $msm + $mss;
    }




}
