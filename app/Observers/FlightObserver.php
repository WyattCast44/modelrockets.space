<?php

namespace App\Observers;

use App\Flight;

class FlightObserver
{
    /**
     * Handle the flight "created" event.
     *
     * @param  \App\Flight  $flight
     * @return void
     */
    public function created(Flight $flight)
    {
        $flight->user->recordActivity('recorded a new flight!', $flight);
    }

    /**
     * Handle the flight "updated" event.
     *
     * @param  \App\Flight  $flight
     * @return void
     */
    public function updated(Flight $flight)
    {
        //
    }

    /**
     * Handle the flight "deleted" event.
     *
     * @param  \App\Flight  $flight
     * @return void
     */
    public function deleted(Flight $flight)
    {
        //
    }
}
