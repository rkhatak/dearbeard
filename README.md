# Stripe_gateway_integration_demo_with_PHP

ALTER TABLE `product` ADD `product_tag` VARCHAR(100) NOT NULL AFTER `product_desc`;

date 29/10/2017

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tag` ADD UNIQUE(`name`);