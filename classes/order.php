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

    function __construct($food="", $meal="", $condiments="")
    {
        $this->_food = $food;
        $this->_meal = $meal;
        $this->_condiments = $condiments;
    } // END of function __construct()


    /**
     * getFood returns the food item ordered
     * @return string
     */
    public function getFood()
    {
        return $this->_food;
    }
    /**
     * getMeal returns the meal item ordered
     * @return string
     */
    public function getMeal()
    {
        return $this->_meal;
    }
    /**
     * getCondiments returns the condiment
     * @return string
     */
    public function getCondiments()
    {
        return $this->_condiments;
    }

    /**
     * setFood sets a food item in the order
     * @param $food
     */
    public function setFood($food)
    {
        $this->_food = $food;
    }
    /**
     * getMeal returns the meal item ordered
     * @param $meal string
     */
    public function setMeal($meal)
    {
        $this->_meal = $meal;
    }
    /**
     * setCondiment the condiment item in the order
     * @param $condiments
     */
    public function setCondiments($condiments)
    {
        $this->_condiments = $condiments;
    }
}