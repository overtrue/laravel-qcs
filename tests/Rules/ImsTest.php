<?php

namespace Tests\Rules;

use Illuminate\Http\UploadedFile;
use Mockery\MockInterface;
use Overtrue\LaravelQcs\Rules\Ims;
use Tests\TestCase;

class ImsTest extends TestCase
{
    public function test_it_can_check_input_image_files()
    {
        $rule = new Ims();

        $this->instance(
            'ims',
            \Mockery::mock(
                'stdClass',
                function (MockInterface $tms) {
                    $tms->shouldReceive('validate')
                        ->andReturn(true);
                }
            )
        );

        $this->assertTrue($rule->passes('logo', UploadedFile::fake()->createWithContent('logo.png', \file_get_contents(__DIR__ . '/../images/500x500.png'))));
    }
}