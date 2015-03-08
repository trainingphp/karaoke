<?php

	class ToolComponent extends Component{

		// Tính tổng tiền dịch vụ thanh toán
		public function array_sum($service, $quantity_col = 'quantity', $price_col = 'price'){
			$total = 0;
			foreach ($service as $item) {
				$total += $item[$quantity_col] * $item[$price_col];
			}
			return $total;
		}
	}
?>