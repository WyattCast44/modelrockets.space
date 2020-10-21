<?php

namespace App\Interfaces;

interface ActivityFeedable
{
    public function getActivityTitleAttribute();

    public function getActivityExcerptAttribute();

    public function path($method = 'index', $absolute = true);
}
