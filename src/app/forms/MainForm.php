<?php
namespace app\forms;

use bundle\updater\UpdateMe;
use std, gui, framework, app;


class MainForm extends AbstractForm
{
    const VERSION = '1.0.0.0';
    /**
     * @event button.action 
     */
    function doButtonAction(UXEvent $e = null)
    {    
        $this->hours->text = '0';
        $this->minute->text = '1';
        $this->second->text = '0';
    }

    /**
     * @event buttonAlt.action 
     */
    function doButtonAltAction(UXEvent $e = null)
    {    
        $this->hours->text = '0';
        $this->minute->text = '5';
        $this->second->text = '0';
    }

    /**
     * @event button3.action 
     */
    function doButton3Action(UXEvent $e = null)
    {    
        $this->hours->text = '0';
        $this->minute->text = '10';
        $this->second->text = '0';
    }

    /**
     * @event button4.action 
     */
    function doButton4Action(UXEvent $e = null)
    {    
        $this->hours->text = '0';
        $this->minute->text = '15';
        $this->second->text = '0';
    }

    /**
     * @event button5.action 
     */
    function doButton5Action(UXEvent $e = null)
    {    
        $this->hours->text = '0';
        $this->minute->text = '30';
        $this->second->text = '0';
    }

    /**
     * @event button6.action 
     */
    function doButton6Action(UXEvent $e = null)
    {    
        $this->hours->text = '1';
        $this->minute->text = '0';
        $this->second->text = '0';
    }
    
    
    
    /**
     * @event button7.action 
     */
    function doButton7Action(UXEvent $e = null)
    {    
        $msh = $this->msh->text;
        $msm = $this->msm->text;
        $mss = $this->mss->text;
        $ms = $this->ms->text;
        waitAsync($ms, function (){
            $selected = $this->checkbox->selected;
            if ($selected == true){
                $this->player->open('sound.mp3');
                $this->player->play();
                $this->button8->visible = true;
            }
            $title = $this->title_notify->text;
            $message = $this->text_notify->text;
            $notify = new UXTrayNotification;
            $notify->title = "$title";
            $notify->animationType = 'POPUP';
            $notify->location = 'TOP_RIGHT';
            $notify->notificationType = 'WARNING';
            $notify->message = "$message";
            $notify->show();
        });
        
    }

    /**
     * @event close 
     */
    function doClose(UXWindowEvent $e = null)
    {    
        app()->shutdown();
    }

    /**
     * @event button8.action 
     */
    function doButton8Action(UXEvent $e = null)
    {    
        $this->player->stop();
        $this->button8->visible = false;
    }

    /**
     * @event show 
     */
    function doShow(UXWindowEvent $e = null)
    {    
        UpdateMe::start(self::VERSION);
    }

}
