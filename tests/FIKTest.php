<?php

namespace LasseRafn\FIK\Test;

use LasseRafn\FIK\FIK;
use PHPUnit\Framework\TestCase;

class FIKTest extends TestCase
{
    public function test_can_generate_invoice_fik()
    {
        $fik = new FIK();

        $this->assertEquals('000000000100305', $fik->generate(1003));
        $this->assertEquals('000000999912306', $fik->generate(9999123));
        $this->assertEquals('000000000012302', $fik->generate(123));
        $this->assertEquals('000000001329200', $fik->generate(13292));
    }

    public function test_can_generate_reminder_fik()
    {
        $fik = new FIK();

        $this->assertEquals('000000000100438', $fik->generate(1004, true) );
        $this->assertEquals('000000000000133', $fik->generate(1, true) );
        $this->assertEquals('000000010000032', $fik->generate(100000, true) );
    }

    public function test_can_use_helper_methods()
    {
        $this->assertEquals('000000000100305', fik_invoice(1003));
        $this->assertEquals('000000000100438', fik_reminder(1004));
    }
}
