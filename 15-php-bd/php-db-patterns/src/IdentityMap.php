<?php
declare(strict_types=1);


/**
 * Created by PhpStorm at 13.11.2023
 *
 * @IdentityMap
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @package ${NAMESPACE}
 */
class IdentityMap
{
     private $identity = [];

     public function set(object $user)
     {
         $classname = get_class($user);
         $id        = $user->id;
         $key       = "$classname.$id";

         if (! isset($this->identity[$key])) {
             $this->identity[$key] = $user;
         }

         return $this->identity[$key];
     }
}