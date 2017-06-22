<?php

namespace LasseRafn\FIK\Test;

use LasseRafn\FIK\FIK;
use PHPUnit\Framework\TestCase;

class FIKTest extends TestCase
{
    public function test_can_generate_invoice_fik()
    {
        $fik = new FIK();

        $this->assertEquals($fik->generate(1003), '000000000100305');
        $this->assertEquals($fik->generate(9999123), '000000999912306');
        $this->assertEquals($fik->generate(123), '000000000012302');
        $this->assertEquals($fik->generate(13292), '000000001329200');
    }

    public function test_can_generate_reminder_fik()
    {
        $fik = new FIK();

        $this->assertEquals($fik->generate(1004, true), '000000000100438');
        $this->assertEquals($fik->generate(1, true), '000000000000133');
        $this->assertEquals($fik->generate(100000, true), '000000010000032');
    }

    public function test_can_use_helper_methods()
    {
        $this->assertEquals(fik_invoice(1003), '000000000100305');
        $this->assertEquals(fik_reminder(1004), '000000000100438');
    }
}
