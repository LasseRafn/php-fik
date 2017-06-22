<?php

if (! function_exists('fik_invoice')) {
    function fik_invoice($invoiceNumber = 1)
    {
        $fik = new \LasseRafn\FIK\FIK();

        return $fik->generate($invoiceNumber);
    }
}

if (! function_exists('fik_reminder')) {
    function fik_reminder($reminderNumber = 1)
    {
        $fik = new \LasseRafn\FIK\FIK();

        return $fik->generate($reminderNumber, true);
    }
}
