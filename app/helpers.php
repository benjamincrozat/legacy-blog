<?php

if (! function_exists('money')) {
    function money($amount, $locale = 'en_US', $currency = 'USD')
    {
        $formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
        $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);

        return $formatter->formatCurrency($amount, $currency);
    }
}
