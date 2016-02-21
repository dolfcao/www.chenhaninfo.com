<?php

namespace Common\Service;

class PartnerService {
	public function list_by_type($type, $cache = 3600, $options = array('limit'=>999)) {
		$flag = 'partner/list_by_type/' . $type . '/' . md5 ( $cache . serialize ( $options ) );
		$data = S ( $flag );
		if (false === $data) {
			$data = D ( 'CmsPartner' )->where ( array (
					'type' => $type 
			) )->limit ( $options ['limit'] )->select ();
			S ( $flag, $data, $cache );
		}
		return $data;
	}
}