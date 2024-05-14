<?php

namespace Crm\ApplicationModule\Presenters;

class SnippetsPresenter extends FrontendPresenter
{
    public bool $autoCanonicalize = false;

    public function renderDefault($key = 'default')
    {
        $this->template->key = $key;
    }
}
