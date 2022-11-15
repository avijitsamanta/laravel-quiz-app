<?php

namespace App\Policies;

use App\User;
use App\Options;
use Illuminate\Auth\Access\HandlesAuthorization;

class OptionsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

     /**
   * Determine whether the user can create topic.
   *
   * @param  \App\User  $user
   * @return mixed
   */
    public function create(User $user,Options $option)
    {
        return $user->id >0;
    }
    
    /**
     * Determine whether the user can update the topic.
     *
     * @param  \App\User  $user
     * @param  \App\Topic  $topic
     * @return mixed
     */
    public function update(User $user, Options $option)
    {
        return $user->id == $option->user_id;
    }
    
    /**
     * Determine whether the user can delete the topic.
     *
     * @param  \App\User  $user
     * @param  \App\Topic  $topic
     * @return mixed
     */
    public function delete(User $user, Options $option)
    {
        return $user->id == $option->user_id;
    }
}
