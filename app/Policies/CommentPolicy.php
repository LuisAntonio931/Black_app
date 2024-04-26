<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false; // Opcional: Agrega tu lógica aquí
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return bool
     */
    public function view(User $user, Comment $comment)
    {
        return false; // Opcional: Agrega tu lógica aquí
    }

    /**
     * Determine whether the user can create models.
     *
     * @return bool
     */
    public function create(User $user)
    {
        return false; // Opcional: Agrega tu lógica aquí
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return bool
     */
    public function update(User $user, Comment $comment)
    {
        return $user->is($comment->author) && $user->tokenCan('comment:update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return bool
     */
    public function delete(User $user, Comment $comment)
    {
        return $user->is($comment->author) && $user->tokenCan('comment:delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return bool
     */
    public function restore(User $user, Comment $comment)
    {
        return false; // Opcional: Agrega tu lógica aquí
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return bool
     */
    public function forceDelete(User $user, Comment $comment)
    {
        return false; // Opcional: Agrega tu lógica aquí
    }
}
