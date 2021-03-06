<?php

namespace App\Policies;

use App\User;
use App\ShoppingList;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShoppingListPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any shopping lists.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the shopping list.
     *
     * @param  \App\User  $user
     * @param  \App\ShoppingList  $shoppingList
     * @return mixed
     */
    public function view(User $user, ShoppingList $shoppingList)
    {
        return $user->id === (int) $shoppingList->user_id;
    }

    /**
     * Determine whether the user can create shopping lists.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the shopping list.
     *
     * @param  \App\User  $user
     * @param  \App\ShoppingList  $shoppingList
     * @return mixed
     */
    public function update(User $user, ShoppingList $shoppingList)
    {
        return $user->id === (int) $shoppingList->user_id;
    }

    /**
     * Determine whether the user can delete the shopping list.
     *
     * @param  \App\User  $user
     * @param  \App\ShoppingList  $shoppingList
     * @return mixed
     */
    public function delete(User $user, ShoppingList $shoppingList)
    {
        return $user->id === (int) $shoppingList->user_id;
    }

    /**
     * Determine whether the user can restore the shopping list.
     *
     * @param  \App\User  $user
     * @param  \App\ShoppingList  $shoppingList
     * @return mixed
     */
    public function restore(User $user, ShoppingList $shoppingList)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the shopping list.
     *
     * @param  \App\User  $user
     * @param  \App\ShoppingList  $shoppingList
     * @return mixed
     */
    public function forceDelete(User $user, ShoppingList $shoppingList)
    {
        //
    }
}
