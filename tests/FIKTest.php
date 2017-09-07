<?php

namespace LasseRafn\FIK\Test;

use LasseRafn\FIK\FIK;
use PHPUnit\Framework\TestCase;

class FIKTest extends TestCase
{
    public function test_can_generate_invoice_fik()
    {
        $this->assertEquals('000000000100305', FIK::generate(1003));
        $this->assertEquals('000000999912306', FIK::generate(9999123));
        $this->assertEquals('000000000012302', FIK::generate(123));
        $this->assertEquals('000000001329200', FIK::generate(13292));
    }

    public function test_can_generate_reminder_fik()
    {
        $this->assertEquals('000000000100438', FIK::generate(1004, true));
        $this->assertEquals('000000000000133', FIK::generate(1, true));
        $this->assertEquals('000000010000032', FIK::generate(100000, true));
    }

    public function test_can_use_helper_methods()
    {
        $this->assertEquals('000000000100305', fik_invoice(1003));
        $this->assertEquals('000000000100438', fik_reminder(1004));
    }

    public function test_wont_create_helpers_if_already_exists()
    {
        function fik_invoice($invoiceId)
        {
            return $invoiceId;
        }

        function fik_reminder($invoiceId)
        {
            return $invoiceId;
        }

        $this->assertNotEquals('000000000100305', fik_invoice(1003));
        $this->assertNotEquals('000000000100438', fik_reminder(1004));
    }
}

include __DIR__.'/../src/helper.php';
