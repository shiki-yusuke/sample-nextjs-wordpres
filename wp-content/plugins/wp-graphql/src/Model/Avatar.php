<?php

namespace WPGraphQL\Model;

/**
 * Class Avatar - Models data for avatars
 *
 * @property int    $size
 * @property int    $height
 * @property int    $width
 * @property string $default
 * @property bool   $forceDefault
 * @property string $rating
 * @property string $scheme
 * @property string $extraAttr
 * @property bool   $foundAvatar
 * @property string $url
 *
 * @package WPGraphQL\Model
 */
class Avatar extends Model {

	/**
	 * Stores the incoming avatar to be modeled
	 *
	 * @var array<string,mixed>
	 */
	protected $data;

	/**
	 * Avatar constructor.
	 *
	 * @param array<string,mixed> $avatar The incoming avatar to be modeled.
	 */
	public function __construct( array $avatar ) {
		$this->data = $avatar;
		parent::__construct();
	}

	/**
	 * @return bool
	 */
	protected function is_private() {
		$show_avatars = get_option( 'show_avatars' );
		return ! (bool) $show_avatars;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function init() {
		if ( empty( $this->fields ) ) {
			$this->fields = [
				'size'         => function () {
					return ! empty( $this->data['size'] ) ? absint( $this->data['size'] ) : null;
				},
				'height'       => function () {
					return ! empty( $this->data['height'] ) ? absint( $this->data['height'] ) : null;
				},
				'width'        => function () {
					return ! empty( $this->data['width'] ) ? absint( $this->data['width'] ) : null;
				},
				'default'      => function () {
					return ! empty( $this->data['default'] ) ? $this->data['default'] : null;
				},
				'forceDefault' => function () {
					return ! empty( $this->data['force_default'] );
				},
				'rating'       => function () {
					return ! empty( $this->data['rating'] ) ? $this->data['rating'] : null;
				},
				'scheme'       => function () {
					return ! empty( $this->data['scheme'] ) ? $this->data['scheme'] : null;
				},
				'extraAttr'    => function () {
					return ! empty( $this->data['extra_attr'] ) ? $this->data['extra_attr'] : null;
				},
				'foundAvatar'  => function () {
					return ! empty( $this->data['found_avatar'] );
				},
				'url'          => function () {
					return ! empty( $this->data['url'] ) ? $this->data['url'] : null;
				},
			];
		}
	}
}
