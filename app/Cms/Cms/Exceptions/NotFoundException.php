<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Cms\Cms\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class NotFoundException extends NotFoundHttpException
{
    /**
     * OrderStatusNotFoundException constructor.
     */
    public function __construct()
    {
        parent::__construct('Item not found.');
    }
}
