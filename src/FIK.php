<?php

namespace LasseRafn\FIK;

class FIK
{
	const REQUIRED_LENGTH = 15;
	const INVOICE_ID      = 0;
	const REMINDER_ID     = 3;

	/**
	 * Generate a FIK
	 *
	 * @param int  $invoiceNumber
	 * @param bool $isReminder
	 *
	 * @return string
	 */
	public function generate( $invoiceNumber = 1, $isReminder = false ): string
	{
		$fik = str_pad( $invoiceNumber, 13, 0, STR_PAD_LEFT );

		$fik .= ( $isReminder ? static::REMINDER_ID : static::INVOICE_ID );

		$fik .= $this->generateCheckDigit( $fik );

		$fik = str_pad( $fik, 15, 0, STR_PAD_LEFT );

		return $fik;
	}

	/**
	 * @param int $invoiceNumberPlusIdentifierDigit
	 *
	 * @return string
	 */
	private function generateCheckDigit( $invoiceNumberPlusIdentifierDigit = 10 ): string
	{
		$curMultiplier = 1;
		$maxMultiplier = 2;

		$itemArray = str_split( $invoiceNumberPlusIdentifierDigit );

		for ( $i = 0, $iMax = count( $itemArray ); $i < $iMax; $i ++ )
		{
			$itemArray[ $i ] *= $curMultiplier;

			$itemArray[ $i ] = $itemArray[ $i ] >= 10 ? ( 1 + ( $itemArray[ $i ] % 10 ) ) : $itemArray[ $i ];

			$curMultiplier = $curMultiplier === $maxMultiplier ? 1 : $maxMultiplier;
		}

		$checkDigit = 0;

		array_map( function ( $item ) use ( &$checkDigit )
		{
			$checkDigit += $item;
		}, $itemArray );


		$checkDigit %= 10;
		$checkDigit = $checkDigit !== 0 ? 10 - $checkDigit : 0;

		return $checkDigit;
	}
}
