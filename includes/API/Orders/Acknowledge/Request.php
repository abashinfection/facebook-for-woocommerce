<?php
/**
 * Copyright (c) Facebook, Inc. and its affiliates. All Rights Reserved
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory of this source tree.
 *
 * @package FacebookCommerce
 */

namespace SkyVerge\WooCommerce\Facebook\API\Orders\Acknowledge;

defined( 'ABSPATH' ) or exit;

use SkyVerge\WooCommerce\Facebook\API;

/**
 * Orders API acknowledge request object.
 *
 * @since 2.1.0-dev.1
 */
class Request extends API\Request  {


	use API\Traits\Idempotent_Request;


	/**
	 * API request constructor.
	 *
	 * @since 2.1.0-dev.1
	 *
	 * @param string $remote_id remote order ID
	 * @param string $merchant_order_reference WC order ID
	 */
	public function __construct( $remote_id, $merchant_order_reference ) {

		parent::__construct( "/{$remote_id}", 'POST' );

		$this->set_data( [
			'merchant_order_reference' => $merchant_order_reference,
			'idempotency_key'          => $this->get_idempotency_key(),
		] );
	}


}
