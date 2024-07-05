CREATE DATABASE IF NOT EXISTS `iskarmac_store`; USE `iskarmac_store`;


CREATE TABLE IF NOT EXISTS `carts` (

    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "Cart ID",
    /* buyer information */
    `b_uid` varchar(16) DEFAULT NULL COMMENT "uid of the buyer",
    /* product point of sale information (seller/reseller/marketplace) */
    `s_uid` varchar(16) DEFAULT NULL COMMENT "uid of the point of sale",
    `s_store_id` int(11) DEFAULT NULL COMMENT "store id of point of sale",
    /* cart status */
    `status` int(1)  DEFAULT NULL COMMENT "1=active,2=ordered,3=abandoned",
    `created` datetime DEFAULT NULL COMMENT "cart created date",
    `updated` datetime DEFAULT NULL COMMENT "cart updated date",
    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";


CREATE TABLE IF NOT EXISTS `cart_items` (

    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "id of the cart item",
    `cart` int(11) NOT NULL COMMENT "Cart ID",

    /* buyer information */
    `b_uid` varchar(16) DEFAULT NULL COMMENT "uid of the buyer",

    /* product point of sale information (seller/reseller/marketplace) */
    `s_uid` varchar(16) DEFAULT NULL COMMENT "uid of the point of sale",
    `s_store_id` int(11) DEFAULT NULL COMMENT "store id of point of sale",

    /* product information */
    `p_id` int(11) DEFAULT NULL COMMENT "product id",
	`p_status` int(1) DEFAULT NULL COMMENT "1=active,2=inactive",
    `p_type` int(1) DEFAULT NULL COMMENT "1=physical-goods,2=digital-downloadable,3=one-time-subscription,4=recurring-subscription,5=donation,6=service-payment,7=other",
    `p_attr` varchar(256) DEFAULT NULL COMMENT "selected product attributes eg{color:natural,size:xl,material:hemp}",
    `p_units` int(11) DEFAULT NULL COMMENT "number of units ordered of the item",


    /* product source information */
    `src_uid` varchar(16) DEFAULT NULL COMMENT "uid of the product creator/author",
    `src_zip` varchar(16) DEFAULT NULL COMMENT "zip code of source delivery origin",
    `src_store_id` int(11) DEFAULT NULL COMMENT "store id of original product source",

    `created` datetime DEFAULT NULL COMMENT "cart created date",
    `updated` datetime DEFAULT NULL COMMENT "cart updated date",
    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";


CREATE TABLE IF NOT EXISTS `orders` (

    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "ORDER ID",

    /* buyer information */
    `b_uid` varchar(16) DEFAULT NULL COMMENT "uid of the buyer",

    /* product point of sale information (seller/reseller/marketplace) */
    `s_uid` varchar(16) DEFAULT NULL COMMENT "uid of the point of sale",
    `s_store_id` int(11) DEFAULT NULL COMMENT "store id of point of sale",

    /* order status */
	`status` int(1) DEFAULT NULL COMMENT "1=completed,2=pending,3=returned,4=cancelled,5=abandoned",

    /* payment information */
    `payment_provider` varchar(256) DEFAULT NULL COMMENT "name of payment gateway provider",
    `payment_id` varchar(256) DEFAULT NULL COMMENT "payment transaction id sent by the provider",
    `payment_method` int(1) DEFAULT NULL COMMENT "1=credit-card,2=debit-card,3=net-banking,4=digital-wallet",
    `payment_status` int(1) DEFAULT NULL COMMENT "1=completed,2=pending,3=failed,4=cancelled,5=refunded",
    `payment_charges` varchar(256) DEFAULT NULL COMMENT "payment processing charges by the gateway",

    `created` datetime DEFAULT NULL COMMENT "order created date",
    `updated` datetime DEFAULT NULL COMMENT "order updated date",
    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";


CREATE TABLE IF NOT EXISTS `ordered_items` (

    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "id of ordered item",

    /* order information */
    `o_id` int(11) DEFAULT NULL COMMENT "order id",
    `o_type` int(1) DEFAULT NULL COMMENT "1=direct,2=resell,3=marketplace",

    /* product information */
    `p_id` int(11) DEFAULT NULL COMMENT "product id",
    `p_type` int(1) DEFAULT NULL COMMENT "1=physical-goods,2=digital-downloadable,3=one-time-subscription,4=recurring-subscription,5=donation,6=service-payment,7=other",
    `p_attr` varchar(4096) DEFAULT NULL COMMENT "json-array {attr-1-id:value,attr-2-id:value}",
    `p_units` int(11) DEFAULT NULL COMMENT "number of units ordered of the item",

    /* product source information */
    `src_uid` varchar(16) DEFAULT NULL COMMENT "uid of the product creator/author",
    `src_zip` varchar(16) DEFAULT NULL COMMENT "zip code of source delivery origin",
    `src_store_id` int(11) DEFAULT NULL COMMENT "store id of original product source",

    /* buyer information */
    `b_uid` varchar(16) DEFAULT NULL COMMENT "uid of the product buyer",
    `b_add` int(11) DEFAULT NULL COMMENT "id of the buyers delivery address",
    `b_zip` varchar(16) DEFAULT NULL COMMENT "zip code of buyers delivery destination",

    /* product point of sale information (seller/reseller/marketplace) */
    `s_uid` varchar(16) DEFAULT NULL COMMENT "uid of the point of sale",
    `s_store_id` int(11) DEFAULT NULL COMMENT "store id of point of sale",

    /* discount offered if any by the source store */
    `d_type` int(1) DEFAULT NULL COMMENT "1=percentage,2=flat",
    `d_value` int(11) DEFAULT NULL COMMENT "discount value percent or flat",
    `d_amount` varchar(32) DEFAULT NULL COMMENT "total discount amount",
    /* enable / disable discount for indirect sales */
    `d_resale` int(1) DEFAULT NULL COMMENT "1=enabled,2=disabled",

    /* cost price of the product (original) */
    `p_original` varchar(64) DEFAULT NULL COMMENT "cost price per unit",
    /* cost price of the product (after discount) */
    `p_discounted` varchar(64) DEFAULT NULL COMMENT "discounted cost price per unit",
    /* price profit added by pos (seller/reseller/marketplace) */
    `p_profit` varchar(64) DEFAULT NULL COMMENT "profit amount added by pos",
    /* cost (resale) price of the product set by pos (seller/reseller/marketplace) */
    `p_pos` varchar(64) DEFAULT NULL COMMENT "cost price per unit (price_discounted + price_profit)",
    /* final price */
    `p_final` varchar(64) DEFAULT NULL COMMENT "final price (price_pos * quantity)",

    /* commission offered to reseller by the source store */
    `c_type` int(1) DEFAULT NULL COMMENT "1=percentage,2=flat",
    `c_value` int(11) DEFAULT NULL COMMENT "commission value percent or flat",
    `c_amount` varchar(32) DEFAULT NULL COMMENT "total commission amount per unit sold",

    `weight_unit` int(1) DEFAULT NULL COMMENT "selected weight unit",
    `weight` varchar(256) DEFAULT NULL COMMENT "total calculated weight (weight unit * quantity)",

    `created` datetime DEFAULT NULL COMMENT "order created date",
    `updated` datetime DEFAULT NULL COMMENT "order updated date",

	`status` int(1) DEFAULT NULL COMMENT "1=enabled,2=disabled,3=cancelled,4=returned,5=abandoned",

    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";


CREATE TABLE IF NOT EXISTS `order_shipments` (

    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "shipment id",
    `order_id` int(11) DEFAULT NULL COMMENT "order id of the shipment",

    `shipping_carrier` int(1) DEFAULT NULL COMMENT "selected shipping service provider",
    `shipping_method` int(1) DEFAULT NULL COMMENT "1=COD,2=surface-dom,3=air-dom,4=surface-int,5=air-int",
    `shipping_price` int(11) DEFAULT NULL COMMENT "cost of shipping for the order",
    `shipping_status` int(1) DEFAULT NULL COMMENT "1=delivered,2=shipped,3=preparing,4=processing",
    `shipping_id` varchar(256) DEFAULT NULL COMMENT "shipping tracking id",
    `shipping_tracking` varchar(256) DEFAULT NULL COMMENT "delivery tracking url",

    `created` datetime DEFAULT NULL COMMENT "order created date",
    `updated` datetime DEFAULT NULL COMMENT "order updated date",
    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";


CREATE TABLE IF NOT EXISTS `returns` (

    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "",
    `uid` varchar(16) NOT NULL COMMENT "",

    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";


CREATE TABLE IF NOT EXISTS `reviews` (

    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "",
    `uid` varchar(16) NOT NULL COMMENT "uid of the store owner",
    `product_id` varchar(11) NOT NULL COMMENT "id of product to review",
    `customer_uid` varchar(16) NOT NULL COMMENT "uid of customer who wrote the review",
    `review_mode` int(1) DEFAULT NULL COMMENT "1=show-real-name,2=anonymous",
    `review` varchar(1024) DEFAULT NULL COMMENT "review description",
    `rating` int(1) DEFAULT NULL COMMENT "product rating from 1 to 5",
	`response` varchar(1024) DEFAULT NULL COMMENT "store response to review",
	`status` int(1) DEFAULT NULL COMMENT "review published status",
    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";


CREATE TABLE IF NOT EXISTS `products` (

    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "",
    `uid` varchar(16) NOT NULL COMMENT "",
    `category` int(11) DEFAULT NULL COMMENT "product category",
    `name` varchar(256) DEFAULT NULL COMMENT "product title",
    `description` varchar(4096) DEFAULT NULL COMMENT "detailed product description",
    `meta_keywords` varchar(256) DEFAULT NULL COMMENT "meta keywords for seo",
    `meta_description` varchar(512) DEFAULT NULL COMMENT "meta description for seo",

    /* product information */
	`p_type` int(1) DEFAULT NULL COMMENT "1=physical-goods,2=digital-downloadable,3=one-time-subscription,4=recurring-subscription,5=donation,6=service-payment,7=other",
	`p_status` int(1) DEFAULT NULL COMMENT "1=active,2=inactive",
	`p_group` int(11) DEFAULT NULL COMMENT "product group that can contain variations",
    `p_attr` varchar(4096) DEFAULT NULL COMMENT "json-array {attr-1-id:value,attr-2-id:value}",
    `p_stock` int(11) DEFAULT NULL COMMENT "total units in stock",

    /* price information */
    `price` int(11) DEFAULT NULL COMMENT "product price",
    `discount_type` int(1) DEFAULT NULL COMMENT "1=percentage,2=flat",
    `discount_value` int(11) DEFAULT NULL COMMENT "discount value percent or flat",
    `discount_amount` varchar(32) DEFAULT NULL COMMENT "total discount amount",

    /* resell information */
    `resell` int(1) DEFAULT NULL COMMENT "1=enabled, 2=disabled",
    `resell_max_price` int(11) DEFAULT NULL COMMENT "max selling price for resellers",
    `c_type` int(1) DEFAULT NULL COMMENT "1=percentage,2=flat",
    `c_value` int(11) DEFAULT NULL COMMENT "commission value percent or flat",
    `c_amount` varchar(32) DEFAULT NULL COMMENT "total commission amount",

    /* shipping information */
    `weight_unit` int(1) DEFAULT NULL COMMENT "weight unit gram/kg/tonnes",
    `weight` int(11) DEFAULT NULL COMMENT "weight of product",
    `size` varchar(256) DEFAULT NULL COMMENT "dimensions of package height x weight x length",

    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";


CREATE TABLE IF NOT EXISTS `images` (

    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "",
    `uid` varchar(16) NOT NULL COMMENT "",
    `product_id` int(11) DEFAULT NULL COMMENT "product id",
    `image` mediumblob DEFAULT NULL COMMENT "product image",
    `status` int(1) DEFAULT NULL COMMENT "1=enabled,2=disabled",
    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";


CREATE TABLE IF NOT EXISTS `categories` (

    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "id of the category",
    `uid` varchar(16) NOT NULL COMMENT "uid of the creator",
    `store_id` int(11) NOT NULL COMMENT "store id",
    `parent` int(11) DEFAULT NULL COMMENT "id of parent product category",
    `name` varchar(256) DEFAULT NULL COMMENT "name of product category",
    `keywords` varchar(256) DEFAULT NULL COMMENT "meta keywords for category seo",
    `description` varchar(512) DEFAULT NULL COMMENT "meta description for category seo",
    `image` mediumblob DEFAULT NULL COMMENT "display image for product category",
	`status` int(1) DEFAULT NULL COMMENT "1=active,2=inactive",

    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";


CREATE TABLE IF NOT EXISTS `attributes` (

    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "",
    `uid` varchar(16) NOT NULL COMMENT "",
    `name` varchar(256) DEFAULT NULL COMMENT "attribute name",
    `value` varchar(256) DEFAULT NULL COMMENT "attribute value",
    `type` varchar(256) DEFAULT NULL COMMENT "attribute type",

    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";


/* shipping settings */
CREATE TABLE IF NOT EXISTS `shipping` (

    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "id of shipping partner",

    /* name of api integrated shipping partner */
	`shipper` varchar(256) DEFAULT NULL COMMENT "name of api integrated shipping partners",

    /* country code of shipping partners base */
	`ship_origin` varchar(256) DEFAULT NULL COMMENT "country code of shipping partners base location eg{np}",
    /* country codes of shipping partners deliverable locations */
	`ship_dest` varchar(256) DEFAULT NULL COMMENT "deliverable locations json array eg{in,us,np,cn...etc}",

    /* shipping domestic (available / not-available) */
    `ship_dom` int(1) DEFAULT 2 COMMENT "1=available,2=not-available",
    /* shipping international (enable / disable) */
    `ship_int` int(1) DEFAULT 2 COMMENT "1=available,2=not-available",
    /* shipping method Surface */
    `ship_surface` int(1) DEFAULT 2 COMMENT "1=available,2=not-available",
    /* shipping method Air */
    `ship_air` int(1) DEFAULT 2 COMMENT "1=available,2=not-available",
    /* shipping additional services COD */
    `ship_cod` int(1) DEFAULT 2 COMMENT "1=available,2=not-available",

    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";


/* selected list of shippers */
CREATE TABLE IF NOT EXISTS `shippers` (

    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "id of shipper",
    `s_id` varchar(16) NOT NULL COMMENT "store id of seller (source)",
    `s_uid` varchar(16) NOT NULL COMMENT "uid of seller (source)",

    /* store origin country code */
    `seller_origin_cc` varchar(32) DEFAULT NULL COMMENT "country code of sellers/store's origin location",
    /* store origin zip code */
    `seller_origin_zip` varchar(32) DEFAULT NULL COMMENT "zip code of sellers/store's origin location",

    /* api integrated shippers */
	`ship_partner` varchar(256) DEFAULT NULL COMMENT "name of selected api integrated shipping partner",
    `ship_api` varchar(512) DEFAULT NULL COMMENT "api key of shipper",

    /* country code of shippers base */
	`ship_origin_cc` varchar(256) DEFAULT NULL COMMENT "country code of shipping partners base location eg{np}",
    /* country codes of shippers deliverable locations */
	`ship_dest_cc` varchar(256) DEFAULT NULL COMMENT "deliverable locations json array eg{in,us,np,cn...etc}",

    /* custom shippers */
    `ship_partner_other` varchar(256) DEFAULT NULL COMMENT "custom shipper used by seller",
    `ship_track` varchar(256) DEFAULT NULL COMMENT "tracking url (suffix tracking id)",

    /* shipping domestic (enable / disable) */
    `ship_dom` int(1) DEFAULT 2 COMMENT "1=enabled,2=disabled",
    /* shipping international (enable / disable) */
    `ship_int` int(1) DEFAULT 2 COMMENT "1=enabled,2=disabled",
    /* shipping method Surface */
    `ship_surface` int(1) DEFAULT 2 COMMENT "1=enabled,2=disabled",
    /* shipping method Air */
    `ship_air` int(1) DEFAULT 2 COMMENT "1=enabled,2=disabled",
    /* shipping additional services COD */
    `ship_cod` int(1) DEFAULT 2 COMMENT "1=enabled,2=disabled",

    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";

/* api integrated list of available payment gateway service providers based on users country code */
CREATE TABLE IF NOT EXISTS `payment_options` (
    
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "",
    `name` varchar(256) DEFAULT NULL COMMENT "name of payment gateway service",
    `base` varchar(32) DEFAULT NULL COMMENT "country code of base of operations",
    `countries` varchar(4096) DEFAULT NULL COMMENT "list of supported country codes eg{in,us,cn,au,uk,np...}",
    `currencies` varchar(512) DEFAULT NULL COMMENT "list of supported currencies eg{inr,usd,cny,aud,gbp,npr,...}",
    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";


/* selected payments gateway service provider options */
CREATE TABLE IF NOT EXISTS `payment_gateways` (

    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "",
    `s_id` int(11) DEFAULT NULL COMMENT "store id of the seller",
    `s_uid` varchar(16) DEFAULT NULL COMMENT "uid of the store owner",

    `name` varchar(256) DEFAULT NULL COMMENT "name f payment gateway service",
    `base` varchar(256) DEFAULT NULL COMMENT "country code of base of operations",
    `countries` varchar(4096) DEFAULT NULL COMMENT "list of supported countries eg{in,us,cn,au,uk,np}",
    `currencies` varchar(4096) DEFAULT NULL COMMENT "list of supported currencies eg{inr,usd,cny,aud,gbp,npr}",
    
    `api` varchar(4096) DEFAULT NULL COMMENT "api key provided by the payment gateway service",
    
    `status` int(1) DEFAULT NULL COMMENT "1=enabled, 2=disabled",

    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";


/* order payment details */
CREATE TABLE IF NOT EXISTS `payments` (

    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "payment id",
    /* seller information */
    `s_id` int(11) DEFAULT NULL COMMENT "store id of the seller",
    `s_uid` varchar(16) DEFAULT NULL COMMENT "uid of the seller",
    /* buyer information */
    `b_uid` varchar(16) DEFAULT NULL COMMENT "uid of the buyer",
    /* payment information */
    `p_id` varchar(1024) DEFAULT NULL COMMENT "unique transaction id generated by the gateway",
    `p_type` int(2) DEFAULT NULL COMMENT "1=order-payment,2=wallet-recharge,3=direct-transfer,4=other",
    `p_method` varchar(1024) DEFAULT NULL COMMENT "payment method used to make the payment",
    `p_amount` varchar(32) DEFAULT NULL COMMENT "total amount paid in the transaction",
    `p_date` datetime DEFAULT NULL COMMENT "date and time of payment transaction",
    `p_status` int(1) DEFAULT NULL COMMENT "1=completed,2=pending,3=cancelled,4=refunded,5=onhold",
    /* payment domain information */
    `p_domain` varchar(256) DEFAULT NULL COMMENT "domain name of the original seller store",
    `p_domain_pos` varchar(256) DEFAULT NULL COMMENT "domain name of point of sale store",
    /* order information */
    `o_id` int(11) DEFAULT NULL COMMENT "order id of the transaction",

    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";


CREATE TABLE IF NOT EXISTS `statistics` (

    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "",

    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";


CREATE TABLE IF NOT EXISTS `settings` (

    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "",
    `s_id` int(11) DEFAULT NULL COMMENT "store id",
    `s_uid` varchar(16) DEFAULT NULL COMMENT "uid of store owner",
    `domain` varchar(256) DEFAULT NULL COMMENT "custom domain name",
    `domain_key` varchar(256) DEFAULT NULL COMMENT "domain ownership verification code",
    `domain_status` int(1) DEFAULT NULL COMMENT "1=verified,2=unverified",
    `name` varchar(256) DEFAULT NULL COMMENT "store name",
    `logo` mediumblob DEFAULT NULL COMMENT "a transparent png image of the company logo",
    `email` varchar(256) DEFAULT NULL COMMENT "store primary contact email",
    `phone` varchar(256) DEFAULT NULL COMMENT "store primary contant number",
    `contact` varchar(256) DEFAULT NULL COMMENT "store primary contact person name",
    `status` int(1) DEFAULT NULL COMMENT "1=active,2=inactive,3=suspended",

    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";
