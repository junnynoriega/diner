<?php

/*
 * order class represents an order from my diner
 * @Junny Noriega
 */

class Order
{
    private $_food;
    private $_meal;
    private $_condiments;

    function  __construct()
    {
        $this->_food = "";
        $this->_meal = "";
        $this->_condiments = "";
    } // END of function __construct()


    /*
     * return getFood
     */
    public function getFood()
    {
        return $this->_food;
    }
    public function getMeal()
    {
        return $this->_meal;
    }
    public function getCondiments()
    {
        return $this->_condiments;
    }

    /*
     * setFood returns the food item ordered
     * @return string
     */
    public function setFood($food)
    {
        $this->_food = $food;
    }
    public function setMeal($meal)
    {
        $this->_meal = $meal;
    }
    public function setCondiments($condiments)
    {
        $this->_condiments = $condiments;
    }
}