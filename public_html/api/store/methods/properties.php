<?php

trait Properties {

	// common properties
	protected $sessionUID;
	protected $sessionID;
	protected $action;


	// store overview related properties
	protected $store = array(); // array to store overview related properties


	// orders related properties
	protected $orders = array(); // array to store orders related properties


	// returns related properties
	protected $returns = array(); // array to returns related properties


	// products related properties
	protected $products = array(); // array to store products related properties


	// product categories related properties
	protected $categories = array(); // array to store product categories related properties


	// product attributes related properties
	protected $attributes = array(); // array to store product attributes related properties


	// shipping related properties
	protected $shipping = array(); // array to store shipping related properties


	// payments related properties
	protected $payments = array(); // array to store payments related properties


	// payments related properties
	protected $reviews = array(); // array to store reviews related properties


	// statistics related properties
	protected $statistics = array(); // array to store statistics related properties


	// store settings related properties
	protected $settings = array(); // array to store settings related properties

}

?>