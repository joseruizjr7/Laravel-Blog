<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function before($user) {
        if ($user->hasRole('Administrador')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        if ( auth()->user()->hasRole(['Administrador', 'Analista', 'Escritor']) || auth()->user()->hasPermissionTo('ver_posts') ) {
            return true;
        } else {
            return $user->id === $post->user_id;
        }
        
        
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ( auth()->user()->hasAnyRole(['Administrador', 'Analista', 'Escritor']) || auth()->user()->hasPermissionTo('crear_posts') ) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        if (auth()->user()->hasRole(['Administrador', 'Analista']) || auth()->user()->hasPermissionTo('editar_posts')) {
            return true;
        } else {
            return $user->id === $post->user_id;
        }
        
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        if (auth()->user()->hasRole(['Administrador', 'Analista']) || auth()->user()->hasPermissionTo('eliminar_posts')) {
            return true;
            /* return $user->id === $post->user_id; */
        }
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        //
    }
}
