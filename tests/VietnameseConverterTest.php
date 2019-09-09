<?php

namespace Kenny\VietnameseConverter\Tests;

use PHPUnit\Framework\TestCase;
use Pnlinh\VietnameseConverter\VietnameseConverter;
use Pnlinh\VietnameseConverter\VnCharsetConversion;

class VietnameseConverterTest extends TestCase
{
    /** @test */
    public function can_create_vn_charset_conversion_from_vietnamese_converter_class()
    {
        $vniConversion = VietnameseConverter::make();

        $this->assertNotNull($vniConversion);
        $this->assertInstanceOf(VnCharsetConversion::class, $vniConversion);
    }

    /** @test */
    public function it_can_created()
    {
        $vniConversion = new VnCharsetConversion();

        $this->assertNotNull($vniConversion);
    }

    /** @test */
    public function it_can_converted_from_unicode_to_ascii()
    {
        $vniConversion = new VnCharsetConversion();

        $output = $vniConversion->convert('Tôi tên là Ngô Chí Dũng. Người đã tạo ra cái phần mềm này.');

        $this->assertNotEmpty($output);
        $this->assertSame('Toi ten la Ngo Chi Dung. Nguoi da tao ra cai phan mem nay.', $output);
    }

    /** @test */
    public function it_can_converted_from_unicode_to_virq()
    {
        $vniConversion = new VnCharsetConversion();

        $output = $vniConversion->convert('Tôi tên là Ngô Chí Dũng. Người đã tạo ra cái phần mềm này.', 'unicode', 'virq');
        $this->assertNotEmpty($output);

        $this->assertEquals("To^i te^n la` Ngo^ Chi' Du~ng. Ngu+o+`i d-a~ ta.o ra ca'i pha^`n me^`m na`y.", $output);
    }
}
