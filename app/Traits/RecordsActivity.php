<?php

namespace App\Traits;

trait RecordsActivity
{
    // protected static function bootRecordsActivity()
    // {
    //     foreach (static::getModelEventsToRecord() as $event) {
    //         static::$event(function ($model) use ($event) {
    //             $model->recordActivity(
    //                 $model->formatActivityDetails($event)
    //             );
    //         });
    //     }
    // }

    // protected static function getModelEventsToRecord()
    // {
    //     if (isset(static::$modelEventToRecord)) {
    //         return static::getModelEventsToRecord;
    //     }

    //     return [
    //         'created',
    //         'updated',
    //     ];
    // }

    // protected function formatActivityDetails($event)
    // {
    //     return [
    //         'method' => $event,
    //         'type' => class_basename($this),
    //     ];
    // }

    // public function recordActivity($attributes)
    // {
    //     dd($attributes);
    //     $this->activity()->create(compact($attributes));

    //     return $this;
    // }
}
