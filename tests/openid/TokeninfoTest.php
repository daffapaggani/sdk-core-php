<?php 
/**
 * Test class for Userinfo.
 *
 */
class TokeninfoTest extends PHPUnit_Framework_TestCase {
	
	public $token;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() {
		$this->token = new Tokeninfo();
		$this->token->setAccessToken("Access token")
					->setExpiresIn(900)
					->setRefreshToken("Refresh token")
					->setScope("openid address")
					->setTokenType("Bearer");
	}
	
	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
	}
	
	/**
	 * @test
	 */
	public function testSerializationDeserialization() {				
		$tokenCopy = new Tokeninfo();
		$tokenCopy->fromJson($this->token->toJson());
		
		$this->assertEquals($this->token, $tokenCopy);
	}
}