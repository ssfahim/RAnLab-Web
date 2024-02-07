<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Auth;

class AuditObserver
{
    /**
     * Handle the Model "created" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function created(Model $model)
    {
        $user = Auth::user();
        $user_id = $user ? $user->id : 1;

        $model->created_by_id = $user_id;
        $model->updated_by_id = $user_id;
    }

    /**
     * Handle the Model "creating" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function creating(Model $model)
    {
        $user = Auth::user();
        $user_id = $user ? $user->id : 1;

        $model->created_by_id = $user_id;
        $model->updated_by_id = $user_id;
    }

    /**
     * Handle the Model "updated" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function updated(Model $model)
    {
        $user = Auth::user();
        $model->updated_by_id = $user->id;
    }

    /**
     * Handle the Model "updating" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function updating(Model $model)
    {
        $user = Auth::user();
        $model->updated_by_id = $user->id;
    }

    /**
     * Handle the Model "deleted" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function deleted(Model $model)
    {
        //
    }

    /**
     * Handle the Model "restored" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function restored(Model $model)
    {
        //
    }

    /**
     * Handle the Model "force deleted" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function forceDeleted(Model $model)
    {
        //
    }
}
