<?php

if (! function_exists('fik_invoice')) {
    function fik_invoice($invoiceNumber = 1)
    {
        return \LasseRafn\FIK\FIK::generate($invoiceNumber);
    }
}

if (! function_exists('fik_reminder')) {
    function fik_reminder($reminderNumber = 1)
    {
        return \LasseRafn\FIK\FIK::generate($reminderNumber, true);
    }
}
