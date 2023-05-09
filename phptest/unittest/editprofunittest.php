<?php

use PHPUnit\Framework\TestCase;

class editprofile extends TestCase

{

    public function testprofilesearch()
    {
        $result=searchprofile(1,"james","Camron","jcamron@gmail.com","15 aug street","621546");
        $this->assertStringContainsString('User ID', $result);
    }

    public function testprofilenotdound()
    {
        $result = searchprofile(13,"Daniel","Garcia", 123456, "12 hope street corozal town");
        $this->assertEquals('No trips found.', $result);
    }

    public function testEmptyParameters()
    {
        $this->expectWarning();
        searchprofile("", "", "", "");
    }
}

echo editprofile();

?>