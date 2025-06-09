<?php

namespace App\Traits;

trait Alertable
{

    private function format(
        $text, $title, $alertType
    ): array
    {
        return [
            'alert' => [
                'text' => $text,
                'title' => $title,
                'type' => $alertType
            ]
        ];
    }



    public function success($title = '', $text = '', $flash = true): array
    {
        $alert = $this->format($title, $text, __FUNCTION__);
        if ($flash) {
            session()->flash(key($alert), $alert[key($alert)]);
        }
        return $alert;
    }
    public function danger($title = '', $text = '', $flash = true): array
    {
        $alert = $this->format($title, $text, __FUNCTION__);
        if ($flash) {
            session()->flash(key($alert), $alert[key($alert)]);
        }
        return $alert;
    }


    public function info($title = '', $text = '' , $flash = true)
    {
        $alert = $this->format($title, $text, __FUNCTION__);
        if ($flash) {
            session()->flash(key($alert), $alert[key($alert)]);
        }
        return $alert;
    }

    public function warning($title = '', $text = '' , $flash = true)
    {
        $alert = $this->format($title, $text, __FUNCTION__);
        if ($flash) {
            session()->flash(key($alert), $alert[key($alert)]);
        }
        return $alert;
    }

}
