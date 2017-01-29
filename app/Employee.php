<?php

/**
 * @author : Harisankar.M.R <mrsank@live.in>
 * @date : 29.01.2016
 * @file: Employee.php
 * @path: app/Employee.php
 * @description: Model
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * @package App
 */
class Employee extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'employee';

    /**
     * @var array $fillable
     */
    protected $fillable = ['id', 'name', 'employee_id', 'email', 'branch'];

    /**
     * @var array $hidden
     */
    protected $hidden = ['remember_token'];

    /**
     * @return null
     */
    public function getRememberToken()
    {
        return null;
    }

    /**
     * @param $value
     * @return null
     */
    public function setRememberToken($value)
    {
        return null;
    }

    /**
     * @return null
     */
    public function getRememberTokenName()
    {
        return null;
    }

    /**
     * Overrides the method to ignore the remember token.
     */
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute) {
            parent::setAttribute($key, $value);
        }
    }
}
